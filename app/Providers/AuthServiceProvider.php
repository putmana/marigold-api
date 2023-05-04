<?php

namespace App\Providers;

use App\Models\Album;
use App\Models\Playlist;
use App\Models\Track;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        ResetPassword::createUrlUsing(function (object $notifiable, string $token) {
            return config('app.frontend_url')."/password-reset/$token?email={$notifiable->getEmailForPasswordReset()}";
        });

        Gate::define('access-album', function (User $user, Album $album) {
            return $user->id === $album->user_id;
        });

        Gate::define('access-playlist', function (User $user, Playlist $playlist) {
            return $user->id === $playlist->user_id;
        });

        Gate::define('access-track', function (User $user, Track $track) {
            return $user->id === $track->track_id;
        });
        //
    }
}
