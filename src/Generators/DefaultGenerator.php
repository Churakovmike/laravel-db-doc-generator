<?php

namespace ChurakovMike\DbDocumentor\Generators;

use ChurakovMike\DbDocumentor\Interfaces\FileAccesors;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use ChurakovMike\DbDocumentor\Utils\ClassFinder;
use ChurakovMike\DbDocumentor\Traits\Configurable;

/**
 * Class DefaultGenerator
 * @package ChurakovMike\DbDocumentor\Generators
 *
 * @property string $output
 * @property string $modelPath
 * @property string|array $excludedDirectories
 * @property FileAccesors $fileManager
 *
 * @mixin Configurable
 */
class DefaultGenerator
{
    use Configurable;

    /**
     * @var string $output
     */
    protected $output;

    /**
     * @var string $modelPath
     */
    protected $modelPath;

    /**
     * @var array|string $excludedDirectories
     */
    protected $excludedDirectories;

    /**
     * @var
     */
    protected $fileManager;

    /**
     * DefaultGenerator constructor.
     *
     * @param FileAccesors $fileManager
     */
    public function __construct(FileAccesors $fileManager)
    {
        $this->prepare();
        $this->fileManager = $fileManager;
    }

    /**
     * @return void
     */
    public function run()
    {
        foreach(scandir($this->modelPath) as $path) {
            if (File::isDirectory($path) || File::isDirectory(app_path() . DIRECTORY_SEPARATOR . $path)) {
                continue;
            }

            $finder = new ClassFinder();

            try {
                $object = $finder->getClassObjectFromFile(app_path() . DIRECTORY_SEPARATOR . $path);
                if (!is_a($object, Model::class)) {
                    continue;
                }

            } catch (\Throwable $exception) {
                echo $exception->getMessage();
                continue;
            }
        }
    }

    private function prepare()
    {
        clearstatcache();
    }
}
