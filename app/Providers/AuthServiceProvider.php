<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
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

        Gate::define('admin-access', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('doctor-access', function ($user) {
            return $user->role === 'doctor';
        });

        Gate::define('admin-or-doctor-access', function (User $user) {
            return $user->role === 'admin' || $user->role === 'doctor';
        });
    }
}