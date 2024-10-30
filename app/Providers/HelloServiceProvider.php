<?php

namespace App\Providers;

use Illuminate\support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Validator;
use App\Http\Validators\HelloValidator;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        validator::extend('hello',function($attribute,$value,$parameters,$validator) {
            return $value % 2 == 0;
        });
    }
}