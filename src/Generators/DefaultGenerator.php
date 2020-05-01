<?php

namespace ChurakovMike\DbDocumentor\Generators;

use ChurakovMike\DbDocumentor\Interfaces\FileAccesorsInterface;
use ChurakovMike\DbDocumentor\Interfaces\ModelScannerInterface;
use ChurakovMike\DbDocumentor\Interfaces\RenderTemplateInterface;
use ChurakovMike\DbDocumentor\Traits\Configurable;
use ChurakovMike\DbDocumentor\Utils\ClassFinder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

/**
 * Class DefaultGenerator
 * @package ChurakovMike\DbDocumentor\Generators
 *
 * @property string $output
 * @property string $modelPath
 * @property string|array $excludedDirectories
 * @property FileAccesorsInterface $fileManager
 * @property RenderTemplateInterface $renderer
 * @property ModelScannerInterface $modelScanner
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
     * @var ModelScannerInterface $modelScanner
     */
    protected $modelScanner;

    /**
     * DefaultGenerator constructor.
     *
     * @param FileAccesorsInterface $fileManager
     * @param ModelScannerInterface $modelScanner
     * @param RenderTemplateInterface $renderer
     */
    public function __construct(
        FileAccesorsInterface $fileManager,
        ModelScannerInterface $modelScanner,
        RenderTemplateInterface $renderer
    ) {
        $this->fileManager = $fileManager;
        $this->modelScanner = $modelScanner;
        $this->renderer = $renderer;
        $this->prepare();
    }

    /**
     * @return void
     */
    public function run()
    {
        $this->modelScanner->getTables();
        $this->fileManager->saveAsFile('index.html',
            view('churakovmike_dbdoc::index', ['tables' => $this->modelScanner->getTables()])->render());

        foreach (scandir($this->modelPath) as $path) {
            if (File::isDirectory($path) || File::isDirectory(app_path() . DIRECTORY_SEPARATOR . $path)) {
                continue;
            }

            $finder = new ClassFinder();

            try {
                $object = $finder->getClassObjectFromFile(app_path() . DIRECTORY_SEPARATOR . $path);
                if (!is_a($object, Model::class)) {
                    continue;
                }

            $presenter = $this->modelScanner->getDataFromModel($object);

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
