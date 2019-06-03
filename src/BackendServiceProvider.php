<?php

namespace Yasha\Backend;

use App;
use Illuminate\Support\ServiceProvider;
use Route;

class BackendServiceProvider extends ServiceProvider
{

    protected $commands = [
        'Yasha\Backend\Console\Commands\CreateDatabaseCommand',
        'Yasha\Backend\Console\Commands\AuthIsAdminCommand',

    ];

    public function boot()
    {

        $customViewsFolder = resource_path('views/vendor/yasha/');

        if (file_exists(resource_path('views/vendor/yasha/backend'))) {
            $this->loadViewsFrom($customViewsFolder, 'yasha/backend');
        }

        $this->loadTranslationsFrom(dirname(__DIR__) . '/resources/lang', 'yasha/backend');

        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'yasha/backend');
        
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views/vendor/backpack/crud'), 'pagemanager');

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/backend.php');

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/pagemanager.php');

        $this->loadMigrationsFrom(dirname(__DIR__) . '/database/migrations');


    }

    public function register()
    {
        $this->commands($this->commands);
    }

}
