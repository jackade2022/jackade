<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this ->map() ;
    }

    public function map()
    {
        $this->routes(function () {
            $this->mapApiUserRoutes();
            $this->mapApiAdminRoutes();
            $this->mapApiRoutes();
            $this->mapWebRoutes();
        }) ;
    }



    protected function mapApiUserRoutes(){
        Route::prefix('api/user')
            ->name("api.user")
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/user.php'));


    }

    protected function mapApiAdminRoutes()
    {
            Route::prefix('api/admin')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api/admin.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }



    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
