<?php

declare(strict_types=1);

namespace ChurakovMike\DbDocumentor;

use ChurakovMike\DbDocumentor\Commands\GeneratorCommand;
use ChurakovMike\DbDocumentor\Utils\FileManager;
use ChurakovMike\DbDocumentor\Utils\ModelScanner;
use ChurakovMike\DbDocumentor\Utils\RenderTemplate;
use ChurakovMike\DbDocumentor\Utils\ViewPresenter;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

/**
 * Class DbDocumentorServiceProvider.
 * @package ChurakovMike\DbDocumentor
 * @mixin ServiceProvider
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
            $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'churakovmike_dbdoc');
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
