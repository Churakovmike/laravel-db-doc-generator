<?php

namespace ChurakovMike\DbDocumentor\Generators;

use ChurakovMike\DbDocumentor\Interfaces\FileAccesors;
use ChurakovMike\DbDocumentor\Interfaces\FileAccesorsInterface;
use ChurakovMike\DbDocumentor\Interfaces\RenderTemplateInterface;
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
 * @property FileAccesorsInterface $fileManager
 * @property RenderTemplateInterface $renderer
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
     * @var FileAccesorsInterface $fileManager
     */
    protected $fileManager;

    /**
     * @var RenderTemplateInterface $renderer
     */
    protected $renderer;

    /**
     * DefaultGenerator constructor.
     *
     * @param FileAccesorsInterface $fileManager
     * @param RenderTemplateInterface $renderer
     */
    public function __construct(FileAccesorsInterface $fileManager, RenderTemplateInterface $renderer)
    {
        $this->prepare();
        $this->fileManager = $fileManager;
        $this->renderer = $renderer;
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

    /**
     *
     */
    private function prepare()
    {
        clearstatcache();
    }
}
