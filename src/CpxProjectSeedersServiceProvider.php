<?php

namespace CpxProject\Seeders;

use Illuminate\Support\ServiceProvider;
use CpxProject\Seeders\Commands\Migrate;
use CpxProject\Seeders\Commands\MigrateFresh;
use CpxProject\Seeders\Commands\MigrateStatus;
use CpxProject\Seeders\Commands\SeederCreate;
use CpxProject\Seeders\Commands\SeederInstall;
use CpxProject\Seeders\Commands\SeederSeed;
use CpxProject\Seeders\Commands\SeederSeedStatus;

class CpxProjectSeedersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Migrate::class,
                MigrateFresh::class,
                MigrateStatus::class,
                SeederCreate::class,
                SeederInstall::class,
                SeederSeed::class,
                SeederSeedStatus::class,
            ]);
        }
    }

    public function register()
    {
        //
    }
}
