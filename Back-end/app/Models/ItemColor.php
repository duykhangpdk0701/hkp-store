<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemColor extends Model
{
    use HasFactory;

    protected $table = 'item_colors';

    protected $fillable = [
        'name',
        'value',
        'order'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'related_sizes' => 'array'
    // ];

    public function itemVariants()
    {
        return $this->hasMany(ItemVariant::class, 'color_id', 'id');
    }

    public function activeItemVariants()
    {
        return $this->hasMany(ItemVariant::class, 'color_id', 'id')->active();
    }

    /**
     * Resource has many stock through variants
     *
     * @return HasMany
     */
    public function itemStocks(): HasMany
    {
        return $this->hasMany(ItemStock::class, 'color_id', 'id');
    }
}
