<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

/**
 * Class ShopCategory
 * @package App\Models
 *
 * @property-read ShopCategory  $parentCategory
 * @property-read string        $parentTitle
 */
class ShopCategory extends Model
{
    use SoftDeletes;

    const ROOT = 1;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
    ];

    /**
     * @return ShopCategory
     */
    public function parentCategory()
    {
        return $this->belongsTo(ShopCategory::class, 'parent_id', 'id');
    }

    /**
     * @return string
     */
    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
                ? 'Корень'
                : '???');

        return $title;
    }

    /**
     * @return bool
     */
    public function  isRoot()
    {
        return $this->id === ShopCategory::ROOT;
    }
}
