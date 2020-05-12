<?php

namespace ChurakovMike\DbDocumentor\Interfaces;

/**
 * Interface ForeignKeyInterface
 * @package ChurakovMike\DbDocumentor\Interfaces
 */
interface ForeignKeyInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getForeignTableName(): string;

    /**
     * @return string
     */
    public function getColumnNames(): string;

    /**
     * @return string
     */
    public function getForeignColumns(): string;
}
