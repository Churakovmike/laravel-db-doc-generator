<?php

namespace ChurakovMike\DbDocumentor;

use ChurakovMike\DbDocumentor\Commands\GeneratorCommand;
use ChurakovMike\DbDocumentor\Utils\FileManager;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

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

    public function register()
    {
        //
    }

    protected function registerCommands()
    {
        $this->commands([
            GeneratorCommand::class,
        ]);
    }

    protected function registerClasses()
    {
        $this->app->bind('ChurakovMike\DbDocumentor\Interfaces\FileAccesors', function ($app) {
            return new FileManager();
        });
    }
}
