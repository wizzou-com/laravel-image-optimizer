<?php

namespace Wizzou\ImageOptimizer;

use Carbon\Laravel\ServiceProvider;
use Wizzou\ImageOptimizer\Facades\ImageOptimizerFacade;

class ImageOptimizerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/image-optimizer.php', 'image-optimizer');

        $this->app->singleton('imageoptimizer', function ($app) {
            return new ImageOptimizer(config('image-optimizer'));
        });

        // Register the Facade
        $this->app->bind('ImageOptimizer', function ($app) {
            return new ImageOptimizerFacade();
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/image-optimizer.php' => config_path('image-optimizer.php'),
        ]);
    }
}
