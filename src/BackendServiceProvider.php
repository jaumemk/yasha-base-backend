<?php

namespace Yasha\Backend;

use App;
use Illuminate\Support\ServiceProvider;
use Route;

class BackendServiceProvider extends ServiceProvider
{

    const VERSION = '1.0.0';

    protected $commands = [
        'Yasha\Backend\Console\Commands\CreateDatabaseCommand',
        'Yasha\Backend\Console\Commands\AuthIsAdminCommand',

    ];

    public function boot()
    {

        $_SERVER['YASHABASE_BACKEND_VERSION'] = $this::VERSION;

        define("YASHA", __DIR__);

        $this->app['view']->prependNamespace('backpack', dirname(__DIR__) . '/resources/views/vendor/backpack/base');

        $this->app['view']->prependNamespace('crud', dirname(__DIR__) . '/resources/views/vendor/backpack/crud');

        $this->app['view']->prependNamespace('elfinder', dirname(__DIR__) . '/resources/views/vendor/elfinder');

        $this->app['view']->prependNamespace('log-viewer', dirname(__DIR__) . '/resources/views/vendor/log-viewer');
        
        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'yasha-backend');

        $this->loadTranslationsFrom(dirname(__DIR__) . '/resources/lang', 'yasha/backend');

        $this->loadViewsFrom(realpath(__DIR__.'/resources/views/vendor/backpack/crud'), 'pagemanager');

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/backend.php');

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/settings.php');

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/pagemanager.php');

        $this->loadMigrationsFrom(dirname(__DIR__) . '/database/migrations');
        
    }
    
    public function register()
    {

        // Todo: coustom log viewer in package
        // $this->mergeConfigFrom(
        //     dirname(__DIR__) . '/config/log-viewer.php', 'log-viewer'
        // );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/backpack/base.php', 'backpack.base'
        );

        $this->mergeConfigFrom(
            dirname(__DIR__) . '/config/backpack/crud.php', 'backpack.crud'
        );

        $this->commands($this->commands);

    }

}
