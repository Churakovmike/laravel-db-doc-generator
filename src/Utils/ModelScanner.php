<?php

namespace ChurakovMike\DbDocumentor\Utils;

use ChurakovMike\DbDocumentor\Interfaces\ColumnInterface;
use ChurakovMike\DbDocumentor\Interfaces\ModelScannerInterface;
use ChurakovMike\DbDocumentor\Interfaces\ViewPresenterInterface;
use ChurakovMike\DbDocumentor\Utils\Tables\ForeignKey;
use ChurakovMike\DbDocumentor\Utils\Tables\Index;
use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ModelScanner.
 * @package ChurakovMike\DbDocumentor\src\Utils
 *
 * @property ViewPresenterInterface $presenter
 * @property Model|null $model
 * @property array $tables
 * @property array $tablesWithoutModel
 */
class ModelScanner implements ModelScannerInterface
{
    /**
     * @var ViewPresenterInterface $presenter
     */
    protected $presenter;

    /**
     * @var Model|null $model
     */
    protected $model;

    /**
     * @var array $tables
     */
    protected $tables = [];

    /**
     * @var array $tablesWithoutModel
     */
    protected $tablesWithoutModel = [];

    /**
     * ModelScanner constructor.
     * @param ViewPresenterInterface $presenter
     */
    public function __construct(ViewPresenterInterface $presenter)
    {
        $this->presenter = $presenter;
        $this->loadTables();
    }

    /**
     * @param Model $model
     * @return ViewPresenterInterface
     */
    public function getDataFromModel(Model $model)
    {
        $this->presenter->reset();
        $this->model = $model;
        $this->setTableName();
        $this->setTableColumns();
        $position = array_search($this->presenter->getTableName(), $this->tablesWithoutModel);
        unset($this->tablesWithoutModel[$position]);

        return $this->presenter;
    }

    /**
     * @param string $table
     * @return ViewPresenterInterface
     */
    public function getDataFromTable(string $table)
    {
        $this->model = null;
        $this->presenter->reset();
        $this->setTableName($table);
        $this->setTableColumns($table);

        return $this->presenter;
    }

    /**
     * Set table name in presenter from Eloquent model or string.
     *
     * @param string $name
     * @return void
     */
    private function setTableName(string $name = null)
    {
        $this->presenter->setTableName($name ?? $this->model->getTable());
    }

    /**
     * @param string|null $tableName
     */
    private function setTableColumns(string $tableName = null)
    {
        $columns = DB::connection()
            ->getSchemaBuilder()
            ->getColumnListing($tableName ?? $this->model->getTable());

        foreach ($columns as $column) {
            $this->presenter->addColumn($this->buildColumn($column, $tableName));
        }

        $schemaManager = DB::connection()
            ->getDoctrineSchemaManager();

        foreach ($schemaManager->listTableIndexes($tableName ?? $this->model->getTable()) as $tableIndex) {
            $this->presenter->addIndex($this->buildIndex($tableIndex));
        }

        foreach ($schemaManager->listTableForeignKeys($tableName ?? $this->model->getTable()) as $tableForeignKey) {
            $this->presenter->addForeignKey($this->buildForeignKey($tableForeignKey));
        }
    }

    /**
     * @param $columnName
     * @param string|null $tableName
     * @return ColumnInterface
     */
    private function buildColumn($columnName, string $tableName = null)
    {
        if (is_null($tableName)) {
            $databaseColumn = $this->model
                ->getConnection()
                ->getDoctrineColumn($this->model->getTable(), $columnName);
        } else {
            $databaseColumn = DB::connection()
                ->getDoctrineColumn($tableName, $columnName);
        }

        return new Column([
            'name' => $columnName,
            'type' => $databaseColumn->getType()->getName(),
            'comment' => $databaseColumn->getComment(),
            'autoincrement' => $databaseColumn->getAutoincrement(),
            'unsigned' => $databaseColumn->getUnsigned(),
            'definition' => $databaseColumn->getColumnDefinition(),
            'defaultValue' => $databaseColumn->getDefault(),
            'fixed' => $databaseColumn->getFixed(),
            'isNotNull' => $databaseColumn->getNotnull(),
            'precision' => $databaseColumn->getPrecision(),
            'scale' => $databaseColumn->getScale(),
            'length' => $databaseColumn->getLength(),
        ]);
    }

    /**
     * Collect table names.
     *
     * @return array
     */
    public function getTables()
    {
        return $this->tables;
    }

    /**
     * Load tables from databases as string[].
     */
    public function loadTables()
    {
        $schema = DB::connection()->getDoctrineSchemaManager();
        $tables = $schema->listTables();
        foreach ($tables as &$table) {
            $this->tables[] = $table->getName();
        }

        $this->tablesWithoutModel = $this->tables;
    }

    /**
     * @return array
     */
    public function getTablesWithoutModel()
    {
        return $this->tablesWithoutModel;
    }


    /**
     * @param \Doctrine\DBAL\Schema\Index $tableIndex
     *
     * @return Index
     */
    private function buildIndex(\Doctrine\DBAL\Schema\Index $tableIndex)
    {
        return new Index([
            'name' => $tableIndex->getName(),
        ]);
    }

    /**
     * @param ForeignKeyConstraint $tableForeignKey
     *
     * @return ForeignKey
     */
    private function buildForeignKey(ForeignKeyConstraint $tableForeignKey)
    {
        return new ForeignKey([
            'name' => $tableForeignKey->getName(),
        ]);
    }
}
