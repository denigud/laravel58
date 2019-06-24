<?php

namespace App\Observers;

use App\Models\ShopItem;

class ShopItemObserver
{

    /**
     * Handle the shop item "created" event.
     *
     * @param  ShopItem  $shopItem
     */
    public function creating(ShopItem $shopItem)
    {
        $this->setSlug($shopItem);
    }

    /**
     * @param  ShopItem  $shopItem
     */
    public function updating(ShopItem $shopItem)
    {
        $this->setSlug($shopItem);
    }

    /**
     * @param ShopItem $shopItem
     */
    protected function setSlug(ShopItem $shopItem)
    {
        if(empty($shopItem->slug)){
            $shopItem->slug = \Str::slug($shopItem->title);
        }
    }

}
