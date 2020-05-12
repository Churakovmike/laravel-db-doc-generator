<?php

declare(strict_types=1);

namespace ChurakovMike\DbDocumentor\Utils;

use ChurakovMike\DbDocumentor\Interfaces\FileAccesorsInterface;
use Illuminate\Support\Facades\File;

/**
 * Class FileManager.
 * @package ChurakovMike\DbDocumentor\Utils
 *
 * @property string|null $outputPath
 */
class FileManager implements FileAccesorsInterface
{
    /**
     * @var string|null $outputPath
     */
    protected $outputPath;

    /**
     * FileManager constructor.
     */
    public function __construct()
    {
        //$this->init();
    }

    /**
     * Create default output directory.
     *
     * @return void
     */
    public function createDefaultDirectory()
    {
        File::makeDirectory($this->outputPath . DIRECTORY_SEPARATOR . 'db-doc', $mode = 0777, true, true);
    }

    /**
     * TODO;.
     */
    public function copyTemplate()
    {
    }

    /**
     * @return void
     */
    public function init()
    {
        $this->createDefaultDirectory();
    }

    /**
     * Save raw html string as file.
     *
     * @param $filename
     * @param $content
     * @return mixed|void
     */
    public function saveAsFile($filename, $content)
    {
        File::put($this->outputPath . DIRECTORY_SEPARATOR . 'db-doc' . DIRECTORY_SEPARATOR . $filename, $content);
    }

    /**
     * @param string|null $outputPath
     * @return mixed|void
     */
    public function setOutputDirectory(string $outputPath = null)
    {
        $this->outputPath = $outputPath ?? public_path();
    }
}
