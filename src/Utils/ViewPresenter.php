<?php

namespace ChurakovMike\DbDocumentor\Utils;

use ChurakovMike\DbDocumentor\Interfaces\ColumnInterface;
use ChurakovMike\DbDocumentor\Interfaces\ViewPresenterInterface;

/**
 * Class ViewPresenter.
 * @package ChurakovMike\DbDocumentor\Utils
 *
 * @property string $tableName
 * @property array|ColumnInterface[] $columns
 */
class ViewPresenter implements ViewPresenterInterface
{
    /**
     * @var string $tableName
     */
    protected $tableName;

    /**
     * @var array $columns
     */
    protected $columns = [];

    /**
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * @param string $name
     * @return mixed|void
     */
    public function setTableName(string $name)
    {
        $this->tableName = $name;
    }

    /**
     * @param ColumnInterface $column
     */
    public function addColumn(ColumnInterface $column)
    {
        $this->columns[] = $column;
    }

    /**
     * @return array|ColumnInterface[]
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Flush stored data.
     *
     * @return void
     */
    public function reset()
    {
        $this->tableName = '';
        $this->columns = [];
    }
}
