<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItemSize extends Model
{
    use HasFactory;

    protected $table = 'item_sizes';

    protected $fillable = [
        'item_category_id',
        'item_person_type_id',
        'value',
        'status',
        'order'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'related_sizes' => 'array'
    ];

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategory::class);
    }

    public function itemPersonType()
    {
        return $this->belongsTo(ItemPersonType::class);
    }

    public function itemVariants()
    {
        return $this->hasMany(ItemVariant::class, 'size_id', 'id');
    }

    public function activeItemVariants()
    {
        return $this->hasMany(ItemVariant::class, 'size_id', 'id')->active();
    }

    /**
     * Resource has many stock through variants
     *
     * @return HasMany
     */
    public function itemStocks(): HasMany
    {
        return $this->hasMany(ItemStock::class, 'size_id', 'id');
    }
}
