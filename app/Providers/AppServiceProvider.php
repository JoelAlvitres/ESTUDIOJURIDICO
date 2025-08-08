<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    Str::macro('initials', function ($name) {
    $words = explode(' ', $name);
    $firstInitial = $words[0] ? mb_substr($words[0], 0, 1) : '';
    $secondInitial = isset($words[1]) ? mb_substr($words[1], 0, 1) : '';
    return mb_strtoupper($firstInitial . $secondInitial);
    });
    }
}