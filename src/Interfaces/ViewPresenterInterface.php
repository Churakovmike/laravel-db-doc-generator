<?php

namespace ChurakovMike\DbDocumentor\Interfaces;

/**
 * Interface ViewPresenterInterface.
 */
interface ViewPresenterInterface
{
    /**
     * @return string
     */
    public function getTableName(): string;

    /**
     * @param string
     *
     * @return mixed
     */
    public function setTableName(string $name);

    /**
     * @param ColumnInterface $column
     * @return mixed
     */
    public function addColumn(ColumnInterface $column);

    /**
     * @return array|ColumnInterface[]
     */
    public function getColumns();

    /**
     * @param IndexInterface $index
     * @return mixed
     */
    public function addIndex(IndexInterface $index);

    /**
     * @return array|IndexInterface[]
     */
    public function getIndexes();

    /**
     * @param ForeignKeyInterface $foreignKey
     * @return mixed
     */
    public function addForeignKey(ForeignKeyInterface $foreignKey);

    /**
     * @return array|ForeignKeyInterface[]
     */
    public function getForeignKeys();

    /**
     * @return mixed
     */
    public function reset();
}
