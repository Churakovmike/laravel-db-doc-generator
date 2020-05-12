<?php

declare(strict_types=1);

namespace ChurakovMike\DbDocumentor\Utils;

use ChurakovMike\DbDocumentor\Interfaces\ColumnInterface;
use ChurakovMike\DbDocumentor\Interfaces\ForeignKeyInterface;
use ChurakovMike\DbDocumentor\Interfaces\IndexInterface;
use ChurakovMike\DbDocumentor\Interfaces\ViewPresenterInterface;

/**
 * Class ViewPresenter.
 * @package ChurakovMike\DbDocumentor\Utils
 *
 * @property string $tableName
 * @property array|ColumnInterface[] $columns
 * @property array|IndexInterface[] $indexes
 * @property array|ForeignKeyInterface[] $foreignKeys
 */
class ViewPresenter implements ViewPresenterInterface
{
    /**
     * @var string $tableName
     */
    protected $tableName;

    /**
     * @var array|ColumnInterface[] $columns
     */
    protected $columns = [];

    /**
     * @var array|IndexInterface[] $indexes
     */
    protected $indexes = [];

    /**
     * @var array|ForeignKeyInterface[] $foreignKeys
     */
    protected $foreignKeys = [];

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
     * @return mixed
     */
    public function getIndexes()
    {
        return $this->indexes;
    }

    /**
     * @param IndexInterface $index
     */
    public function addIndex(IndexInterface $index)
    {
        $this->indexes[] = $index;
    }

    /**
     * @return array|ForeignKeyInterface[]
     */
    public function getForeignKeys()
    {
        return $this->foreignKeys;
    }

    /**
     * @param ForeignKeyInterface $foreignKey
     */
    public function addForeignKey(ForeignKeyInterface $foreignKey)
    {
        $this->foreignKeys[] = $foreignKey;
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
