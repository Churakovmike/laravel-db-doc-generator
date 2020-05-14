<?php

namespace ChurakovMike\DbDocumentor\Interfaces;

/**
 * Interface IndexInterface.
 * @package ChurakovMike\DbDocumentor\Interfaces
 */
interface IndexInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getColumns(): string;
}
