<?php

namespace ChurakovMike\DbDocumentor\Utils;

use ChurakovMike\DbDocumentor\Interfaces\ModelScannerInterface;
use ChurakovMike\DbDocumentor\Interfaces\ViewPresenterInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelScanner
 * @package ChurakovMike\DbDocumentor\src\Utils
 *
 * @property ViewPresenterInterface $presenter
 * @property Model|null $model
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
     * ModelScanner constructor.
     * @param ViewPresenterInterface $presenter
     */
    public function __construct(ViewPresenterInterface $presenter)
    {
        $this->presenter = $presenter;
    }

    public function getDataFromModel(Model $model)
    {
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
        $schema = $this->model->getConnection()->getDoctrineSchemaManager();
        $tables = $schema->listTables();


        $columns = $this->model->getConnection()
            ->getSchemaBuilder()
            ->getColumnListing($this->model->getTable());

        foreach ($columns as $column) {
            $length = $this->model->getConnection()
                ->getDoctrineColumn($this->model->getTable(), $column)
                ->getLength();
        }
    }
}
