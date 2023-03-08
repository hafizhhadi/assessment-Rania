<?php

namespace App\Providers;

use App\Models\Task;
use App\Policies\TaskPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models' => 'App\Policies\ModelPolicy',
        Task::class => TaskPolicy::class
    ];

    public function boot(): void
    {
        //
    }
}
