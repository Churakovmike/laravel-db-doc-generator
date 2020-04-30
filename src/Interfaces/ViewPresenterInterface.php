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
     * @return mixed
     */
    public function getColumns();
}
