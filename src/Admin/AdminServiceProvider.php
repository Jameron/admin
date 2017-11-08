<?php
namespace Jameron\Admin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class AdminServiceProvider extends ServiceProvider
{
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
        ]);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');

        $this->app->bind('App\User', function ($app) {
            return new \App\User();
        });
    }
}
