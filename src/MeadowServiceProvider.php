<?php

namespace Ajaycalicut17\Meadow;

use Illuminate\Support\ServiceProvider;
use Ajaycalicut17\Meadow\Console\InstallCommand;
use Ajaycalicut17\Meadow\Console\MakeUserCommand;

class MeadowServiceProvider extends ServiceProvider
{
    public function register()
    {
        # code...
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
                MakeUserCommand::class
            ]);
        }
    }
}