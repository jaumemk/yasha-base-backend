<?php

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/

Route::group(
    [
        'namespace'  => 'Yasha\Backend\Http\Controllers\Backend',
        'middleware' => [
            'web',
            'admin',
            'setLocaleFromSession'
        ],
        'prefix' =>  config('backpack.base.route_prefix'),
    ],
    function () {
        // if not otherwise configured, setup the dashboard routes
        if (config('backpack.base.setup_dashboard_routes')) {
            Route::get('dashboard', 'AdminController@dashboard')->name('backpack.dashboard');
        }

        Route::get('server', 'AdminController@server')->name('backpack.server');

        CRUD::resource('menu-item', 'MenuItemController');

        CRUD::resource('lang-line', 'LanguageLineController');

        Route::name('set-locale')->get('set-locale/{locale}', function($locale){
            //storing the locale in session to get it back in the middleware
            session()->put('locale', $locale);
            
            return redirect()->back();
        });

});

Route::group(
[
    'namespace'  => 'Backpack\Base\app\Http\Controllers',
    'middleware' => 'web',
    'prefix'     => config('backpack.base.route_prefix'),
],
function () {
    // if not otherwise configured, setup the dashboard routes
    if (config('backpack.base.setup_dashboard_routes')) {
        Route::get('/', 'AdminController@redirect')->name('backpack');
    }
});
