<?php

namespace ChurakovMike\DbDocumentor\Utils;

use ChurakovMike\DbDocumentor\Interfaces\FileAccesorsInterface;
use Illuminate\Support\Facades\File;

/**
 * Class FileManager.
 * @package ChurakovMike\DbDocumentor\Utils
 */
class FileManager implements FileAccesorsInterface
{
    public function __construct()
    {
        $this->init();
    }

    public function createDefaultDirectory()
    {
        File::makeDirectory(public_path() . DIRECTORY_SEPARATOR . 'db-doc', $mode = 0777, true, true);
    }

    public function copyTemplate()
    {
    }

    public function init()
    {
        $this->createDefaultDirectory();
    }

    public function saveAsFile($filename, $content)
    {
        File::put(public_path() . DIRECTORY_SEPARATOR . 'db-doc' . DIRECTORY_SEPARATOR . $filename, $content);
    }
}
