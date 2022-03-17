<?php

declare(strict_types=1);

namespace Joy\VoyagerBreadProjectTask;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Joy\VoyagerBreadProjectTask\Console\Commands\BreadProjectTask;
use Joy\VoyagerBreadProjectTask\Models\ProjectTask as ModelsProjectTask;
use TCG\Voyager\Facades\Voyager;

/**
 * Class VoyagerBreadProjectTaskServiceProvider
 *
 * @category  Package
 * @package   JoyVoyagerBreadProjectTask
 * @author    Ramakant Gangwar <gangwar.ramakant@gmail.com>
 * @copyright 2021 Copyright (c) Ramakant Gangwar (https://github.com/rxcod9)
 * @license   http://github.com/rxcod9/joy-voyager-bread-project-task/blob/main/LICENSE New BSD License
 * @link      https://github.com/rxcod9/joy-voyager-bread-project-task
 */
class VoyagerBreadProjectTaskServiceProvider extends ServiceProvider
{
    /**
     * Boot
     *
     * @return void
     */
    public function boot()
    {
        Voyager::useModel('ProjectTask', ModelsProjectTask::class);

        $this->registerPublishables();

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'joy-voyager-bread-project-task');

        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'joy-voyager-bread-project-task');
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->group(__DIR__ . '/../routes/web.php');
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix(config('joy-voyager-bread-project-task.route_prefix', 'api'))
            ->middleware('api')
            ->group(__DIR__ . '/../routes/api.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/voyager-bread-project-task.php', 'joy-voyager-bread-project-task');

        if ($this->app->runningInConsole()) {
            $this->registerCommands();
        }
    }

    /**
     * Register publishables.
     *
     * @return void
     */
    protected function registerPublishables(): void
    {
        $this->publishes([
            __DIR__ . '/../config/voyager-bread-project-task.php' => config_path('joy-voyager-bread-project-task.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/joy-voyager-bread-project-task'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/joy-voyager-bread-project-task'),
        ], 'translations');
    }

    protected function registerCommands(): void
    {
        $this->app->singleton('command.joy.voyager.bread-project-task', function () {
            return new BreadProjectTask();
        });

        $this->commands([
            'command.joy.voyager.bread-project-task',
        ]);
    }
}
