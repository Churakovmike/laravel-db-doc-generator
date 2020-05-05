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

    /**
     * @param string|null $outputPath
     * @return mixed
     */
    public function setOutputDirectory(string $outputPath = null);

    /**
     * @return mixed
     */
    public function createDefaultDirectory();
}
