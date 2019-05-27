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
        $this->loadRoutesFrom(__DIR__.'/../routes/backend.php');

        $config = include(__DIR__.'/../config/yasha/backend.php');

        $array = collect(config('backpack.base'))
            ->merge($config)
            ->merge(config('yasha.backend'))
            ->toArray();

        config(['backpack.base' => $array]);

    }

    public function register()
    {
        $this->commands($this->commands);
    }

}
