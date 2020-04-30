<?php

namespace ChurakovMike\DbDocumentor;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use ChurakovMike\DbDocumentor\Utils\FileManager;
use ChurakovMike\DbDocumentor\Utils\RenderTemplate;
use ChurakovMike\DbDocumentor\Commands\GeneratorCommand;

/**
 * Class DbDocumentorServiceProvider
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
        }
    }

    /**
     * Register console command
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
     * Register utils classes
     *
     * @return void
     */
    protected function registerClasses()
    {
        $this->app->bind('ChurakovMike\DbDocumentor\Interfaces\FileAccesorsInterface', function ($app) {
            return new FileManager();
        });

        $this->app->bind('ChurakovMike\DbDocumentor\Interfaces\RenderTemplateInterface', function ($app) {
            return new RenderTemplate();
        });
    }

    public function register()
    {
        //
    }
}
