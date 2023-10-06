<?php

namespace App\Providers;

use App\Services\AuthService; // Import the AuthService class
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Define the 'admin' gate using the AuthService
        Gate::define('admin', function ($user) {
            $authService = app(AuthService::class); // Resolve the AuthService from the service container
            return $authService->userIsAdmin($user);
        });
    }
}

