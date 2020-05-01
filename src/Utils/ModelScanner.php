<?php

namespace ChurakovMike\DbDocumentor\Utils;

use ChurakovMike\DbDocumentor\Interfaces\ColumnInterface;
use ChurakovMike\DbDocumentor\Interfaces\ModelScannerInterface;
use ChurakovMike\DbDocumentor\Interfaces\ViewPresenterInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class ModelScanner
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
        return $this->presenter;
    }

    /**
     * Set table name in presenter from Eloquent model.
     */
    private function setTableName()
    {
        $this->presenter->setTableName($this->model->getTable());
    }

    private function setTableColumns()
    {
        $columns = $this->model->getConnection()
            ->getSchemaBuilder()
            ->getColumnListing($this->model->getTable());

        foreach ($columns as $column) {
            $this->presenter->addColumn($this->buildColumn($column));
        }
    }

    /**
     * @param $columnName
     * @return ColumnInterface
     */
    private function buildColumn($columnName)
    {
        $databaseColumn = $this->model->getConnection()
            ->getDoctrineColumn($this->model->getTable(), $columnName);

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
     * Collect table names
     *
     * @return array
     */
    public function getTables()
    {
        $schema = DB::connection()->getDoctrineSchemaManager();
        $tables = $schema->listTables();
        foreach ($tables as &$table) {
            $this->tables[] = $table->getName();
        }

        return $this->tables;
    }
}
