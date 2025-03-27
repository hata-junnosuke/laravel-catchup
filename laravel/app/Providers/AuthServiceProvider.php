<?php

namespace App\Providers;

use App\Models\RunningRecord;
use App\Policies\RunningRecordPolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }

    protected function registerPolicies()
    {
        $this->app->bind(RunningRecordPolicy::class, function ($app) {
            return new RunningRecordPolicy;
        });

        $this->app->bind(RunningRecord::class, function ($app) {
            return new RunningRecord;
        });
    }
}
