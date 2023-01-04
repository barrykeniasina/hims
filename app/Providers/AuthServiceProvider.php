<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       
        Gate::define('logged-in', function($user){
            return $user;
        });

        Gate::define('is-admin', function($user){
            return $user->hasAnyRole('Admin');
        });

        Gate::define('not-admin', function($user){
            return $user->hasAnyRole(NULL);
        });

        Gate::define('is-lab', function($user){
            return $user->hasAnyLab('Lab');
        });

        Gate::define('is-emergency', function($user){
            return $user->hasAnyEmergency('Emergency');
        });

        Gate::define('is-internalmedicine', function($user){
            return $user->hasAnyInternalMedicine('Internal Medicine');
        });

    }
}
