<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        setlocale(LC_TIME, 'id_ID.UTF-8');
        Carbon::setLocale('id');
    }
}
