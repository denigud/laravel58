<?php

namespace App\Providers;

use App\Models\ShopCategory;
use App\Models\ShopItem;
use App\Observers\ShopCategoryObserver;
use App\Observers\ShopItemObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        ShopItem::observe(ShopItemObserver::class);
        ShopCategory::observe(ShopCategoryObserver::class);
    }
}
