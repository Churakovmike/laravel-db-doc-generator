<?php

namespace ChurakovMike\DbDocumentor;

use ChurakovMike\DbDocumentor\Commands\GeneratorCommand;
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
            $this->commands([
                GeneratorCommand::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
