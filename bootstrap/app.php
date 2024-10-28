<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnableDebugBarMiddlewre;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function(){
            Route::middleware('web')
            ->prefix('djemals')
            ->name('admin.')
            ->group(base_path('routes/admin.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            EnableDebugBarMiddlewre::class,
        ]);
        $middleware->statefulApi();
        $middleware->alias([
            'enable_debugbar' => \App\Http\Middleware\EnableDebugBarMiddlewre::class,
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
    })
    ->withCommands([ __DIR__.'/../app/Console/Commands', ])
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
