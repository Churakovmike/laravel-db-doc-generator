<?php

namespace ChurakovMike\DbDocumentor\Interfaces;

/**
 * Interface ViewPresenterInterface
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
     * @return mixed
     */
    public function getColumns();

    /**
     * @return mixed
     */
    public function reset();
}
