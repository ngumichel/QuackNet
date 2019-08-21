<?php

namespace App\Providers;

use App\Policies\QuackPolicy;
use App\Quack;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Quack::class => QuackPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-quack', 'App\Policies\QuackPolicy@update');
        Gate::define('delete-quack', 'App\Policies\QuackPolicy@delete');
        Gate::define('author-delete-quack', 'App\Policies\QuackPolicy@author_delete');

    }
}
