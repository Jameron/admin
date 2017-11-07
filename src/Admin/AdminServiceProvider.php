<?php
namespace Jameron\Admin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class AdminServiceProvider extends ServiceProvider {

    protected $package = 'admin';
    protected $routes = '../routes/routes.php';
    protected $views = '../resources/views';
    protected $policies = [];


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->publishes([
            __DIR__.'/../config/admin.php' => config_path('admin.php'),
            __DIR__.'/../resources/assets' => resource_path('assets/admin'),
            __DIR__.'/../resources/assets/images' => storage_path('app/public'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->app->make(Factory::class)->load(__DIR__ . '/../database/factories');

        $this->app->bind('Admin', function()
        {
            return new Jameron\Admin\Admin;
        });

    }
}
