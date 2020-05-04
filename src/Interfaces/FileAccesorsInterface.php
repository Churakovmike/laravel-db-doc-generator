<?php

namespace ChurakovMike\DbDocumentor\Interfaces;

/**
 * Interface FileAccess.
 */
interface FileAccesorsInterface
{
    /**
     * @param $filename
     * @param $content
     * @return mixed
     */
    public function saveAsFile($filename, $content);
}
