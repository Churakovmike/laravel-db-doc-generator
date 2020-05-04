<?php

namespace ChurakovMike\DbDocumentor;

use Illuminate\Support\Facades\App;
use ChurakovMike\DbDocumentor\Utils\{
    FileManager, ModelScanner, RenderTemplate, ViewPresenter
};
use Illuminate\Support\ServiceProvider;
use ChurakovMike\DbDocumentor\Commands\GeneratorCommand;

/**
 * Class DbDocumentorServiceProvider.
 * @package ChurakovMike\DbDocumentor
 *
 * @property App $app
 */
class DbDocumentorServiceProvider extends ServiceProvider
{
    /**
     * Service provider for grid.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerCommands();
            $this->registerClasses();
            $this->loadViewsFrom(__DIR__ . '/../resources/views', 'churakovmike_dbdoc');
        }
    }

    /**
     * Register console command.
     *
     * @return void
     */
    protected function registerCommands()
    {
        $this->commands([
            GeneratorCommand::class,
        ]);
    }

    /**
     * Register utils classes.
     *
     * @return void
     */
    protected function registerClasses()
    {
        $this->app->bind('ChurakovMike\DbDocumentor\Interfaces\FileAccesorsInterface', function ($app) {
            return $app->make(FileManager::class);
        });

        $this->app->bind('ChurakovMike\DbDocumentor\Interfaces\RenderTemplateInterface', function ($app) {
            return $app->make(RenderTemplate::class);
        });

        $this->app->bind('ChurakovMike\DbDocumentor\Interfaces\ViewPresenterInterface', function ($app) {
            return $app->make(ViewPresenter::class);
        });

        $this->app->bind('ChurakovMike\DbDocumentor\Interfaces\ModelScannerInterface', function ($app) {
            return $app->make(ModelScanner::class);
        });

    }

    public function register()
    {
        //
    }
}
