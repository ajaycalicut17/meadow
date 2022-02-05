<?php

namespace Ajaycalicut17\Larastarter;

use Illuminate\Support\ServiceProvider;
use Ajaycalicut17\Larastarter\Console\InstallCommand;

class LarastarterServiceProvider extends ServiceProvider
{
    public function register()
    {
        # code...
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class
            ]);
        }
    }
}