<?php

namespace GeProj\Providers;

use Illuminate\Support\ServiceProvider;

class GeProjRepositoyProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \GeProj\Repositories\ClientRepository::class,
            \GeProj\Repositories\ClientRepositoryEloquent::class
        );
        $this->app->bind(
            \GeProj\Repositories\ProjectRepository::class,
            \GeProj\Repositories\ProjectRepositoryEloquent::class
        );
        $this->app->bind(
            \GeProj\Repositories\ProjectNoteRepository::class,
            \GeProj\Repositories\ProjectNoteRepositoryEloquent::class
        );
        $this->app->bind(
            \GeProj\Repositories\ProjectTaskRepository::class,
            \GeProj\Repositories\ProjectTaskRepositoryEloquent::class
        );
        $this->app->bind(
            \GeProj\Repositories\ProjectMemberRepository::class,
            \GeProj\Repositories\ProjectMemberRepositoryEloquent::class
        );
    }
}
