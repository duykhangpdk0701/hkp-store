<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ItemCategory extends Model
{
    use HasFactory, HasTranslations;

    protected $table = 'item_categories';

    const CACHE_SUB_NAVBAR = 'SUB-NAVBAR-CATEGORIES';

    protected $fillable = [
        'parent_id',
        'name',
        'slug',
        'description',
        'status',
        'order'
    ];

    /**
     * Translatable field
     *
     * @var array
     */
    public $translatable = ['name'];

    /**
     * Children relationship
     *
     * Return the children collection of the resource
     *
     * @return Illuminate\Database\Eloquent\Collection
     **/
    public function children()
    {
        return $this->hasMany(ItemCategory::class, 'parent_id', 'id');
    }

    /**
     * Parent relationship
     *
     * Return the parent of the resource
     *
     * @return Illuminate\Database\Eloquent\Collection
     **/
    public function parent()
    {
        return $this->belongsTo(ItemCategory::class, 'parent_id', 'id');
    }

    /**
     * Items relationship
     *
     * Return a collection of items related to the resource
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

    /**
     * Size relationship
     *
     * Return a collection of sizes related to the resource
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function sizes()
    {
        return $this->hasMany(ItemSize::class, 'item_category_id', 'id');
    }

    /**
     * Scope a query to only include active categories.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', CONST_ENABLE);
    }

    /**
     * Check current category is parent
     *
     * @return bool
     **/
    public function isParent()
    {
        if ($this->parent_id == null) {
            return true;
        }
        return false;
    }
}
