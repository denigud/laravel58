<?php

namespace App\Observers;

use App\Models\ShopCategory;

class ShopCategoryObserver
{
    /**
     * Handle the shop category "created" event.
     *
     * @param  ShopCategory  $shopCategory
     */
    public function creating(ShopCategory $shopCategory)
    {
        $this->setSlug($shopCategory);
    }

    /**
     * @param ShopCategory $shopCategory
     */
    protected function setSlug(ShopCategory $shopCategory)
    {
        if (empty($shopCategory->slug)){
           $shopCategory->slug = \Str::slug($shopCategory->title);
        }
    }

    /**
     * @param ShopCategory $shopCategory
     */
    public function updating(ShopCategory $shopCategory)
    {
        $this->setSlug($shopCategory);
    }

}
