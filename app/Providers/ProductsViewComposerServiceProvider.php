<?php

namespace App\Providers;

use App\Models\Products;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ProductsViewComposerServiceProvider extends ServiceProvider
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
        View::composer([
            'products.single-product',
            'auth.register',
            'auth.login',
            'bookings.book-products',
            'profile.change-password',
            'profile.edit',
            'auth.forgot-password',
            'guest.contact-us',
        
        ], function ($view) {
            $products = Products::latest()->take(6)->get();
            $view->with('products', $products);
        });
    }

}
