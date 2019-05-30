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

        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'yasha/backend');

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/backend.php');

    }

    public function register()
    {
        $this->commands($this->commands);
    }

}
