<?php

namespace Yasha\Backend;

use App;
use Illuminate\Support\ServiceProvider;
use Route;

class BackendServiceProvider extends ServiceProvider
{

    protected $commands = [
        'Yasha\Backend\Console\Commands\CreateDatabaseCommand',
    ];

    public function boot()
    {

        $customViewsFolder = resource_path('views/vendor/yasha/');

        if (file_exists(resource_path('views/vendor/yasha/backend'))) {
            $this->loadViewsFrom($customViewsFolder, 'yasha/backend');
        }

        $this->loadViewsFrom(dirname(__DIR__) . '/resources/views', 'yasha/backend');

        $this->loadRoutesFrom(dirname(__DIR__) . '/routes/backend.php');

        $config = include(dirname(__DIR__) . '/config/yasha/backend.php');

        $array = collect(config('backpack.base'))
            ->merge($config)
            ->merge(config('yasha.backend'))
            ->toArray();

        config(['backpack.base' => $array]);

        $overlays = array_merge(config('backpack.base.overlays'), ['vendor/yasha/backend/yasha-custom.css']);

        config(['backpack.base.overlays' => $overlays]);

    }

    public function register()
    {
        $this->commands($this->commands);
    }

}
