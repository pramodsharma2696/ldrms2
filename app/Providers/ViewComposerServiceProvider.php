<?php

namespace App\Providers;

use App\Models\Booking;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
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
    public function boot()
    {

        View::composer('*', function ($view) {
            $notifications = Booking::where("status", "new")->latest()->get();
            $numNotifications = $notifications->count();
            $view->with('numNotifications', $numNotifications)->with('notifications', $notifications);
        });
    }
}
