<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    protected $policies = [
    Job::class => JobPolicy::class,
    User::class => UserPolicy::class,
    Company::class => CompanyPolicy::class,
    Category::class => CategoryPolicy::class,
    Image::class => ImagePolicy::class,
];
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
        Paginator::useBootstrapFive();
    }
}
