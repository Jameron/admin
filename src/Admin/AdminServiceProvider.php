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
            __DIR__.'/../resources/views' => resource_path('views/vendor'),
            __DIR__.'/../resources/assets/sass' => resource_path('assets/admin/sass'),
        ]);

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(resource_path('views/vendor'), 'admin');

        $this->app->bind('App\User', function ($app) {
            return new \App\User();
        });
    }
}
