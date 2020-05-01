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
 * @property array|string $modelPath
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
        $this->startWalk();
    }

    /**
     * @return void
     */
    public function startWalk()
    {
        foreach ($this->getNeededDirectories() as $directory) {
            foreach (scandir($directory) as $path) {
                if (File::isDirectory($path) || File::isDirectory(app_path() . DIRECTORY_SEPARATOR . $path)) {
                    continue;
                }

                $finder = new ClassFinder();

                try {
                    $object = $finder->getClassObjectFromFile($directory . DIRECTORY_SEPARATOR . $path);
                    if (!is_a($object, Model::class)) {
                        continue;
                    }

                    $presenter = $this->modelScanner->getDataFromModel($object);
                    $this->fileManager->saveAsFile(
                        $presenter->getTableName() . '.html',
                        $this->renderer->renderView(
                            'churakovmike_dbdoc::model-template',
                            [
                                'tables' => $this->modelScanner->getTables(),
                                'presenter' => $presenter,
                            ]
                        ));

                } catch (\Throwable $exception) {
                    echo $exception->getMessage();
                    continue;
                }
            }
        }
    }

    /**
     * Create main directory and index file.
     * Clearing the file cache before directory traversal.
     *
     * @return void
     */
    private function prepare()
    {
        clearstatcache();
        $this->modelScanner->getTables();
        $this->fileManager->saveAsFile(
            'index.html',
            $this->renderer->renderView(
                'churakovmike_dbdoc::index',
                [
                    'tables' => $this->modelScanner->getTables()
                ]
            )
        );
    }

    /**
     * Directory for scanning.
     * 
     * @return array
     */
    private function getNeededDirectories()
    {
        return [
            $this->modelPath,
            app_path() . DIRECTORY_SEPARATOR . 'Models',
        ];
    }
}
