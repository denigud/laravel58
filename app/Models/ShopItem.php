<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ShopItem
 * @package App\Models
 *
 * @property ShopCategory   $category
 * @property string         $title
 * @property string         $slug
 * @property string         description
 * @property string         price
 * @property boolean        is_active
 */
class ShopItem extends Model
{
    use SoftDeletes;

    protected $fillable
        =[
          'title',
          'slug',
          'category_id',
          'description',
          'is_active',
          'price',
        ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {

        return $this->belongsTo(ShopCategory::class);

    }


}
