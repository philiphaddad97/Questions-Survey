<?php

namespace App\Providers;

use App\Services\SubmitService;
use App\Services\SurveyService;
use Illuminate\Support\ServiceProvider;

class SurveyProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->bind(SurveyService::class, function($app) {
            return new SurveyService();
        });

        $this->bind(SubmitService::class, function($app) {
            return new SubmitService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
