<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ItemVariant extends Model
{
    use HasFactory;

    /**
     * @inheritdoc
     */
    protected $table = 'item_variants';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sku',
        'item_id',
        'size_id',
        'color_id',
        'order',
        'status'
    ];

    protected $appends = ['min_in_stock_price'];

    public function getMinInStockPriceAttribute()
    {
        if (!$this->relationLoaded('itemStocks')) {
            return false;
        }
        $minPrice = $this->itemStocks->where('stock_status_id', CONST_STOCK_IN_STOCK)->min('price');
        return $minPrice ? number_format($minPrice) : 0;
    }

    public function itemStocks()
    {
        return $this->hasMany(ItemStock::class, 'item_variant_id', 'id');
    }

    /**
     * Lowest Item Stock Relationship
     *
     * @return void
     */
    public function lowestInStockItemStock(): HasOne
    {
        return $this->hasOne(ItemStock::class, 'item_variant_id', 'id')->inStock()->orderBy('price', 'ASC')->oldest();
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(ItemSize::class, 'size_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(ItemColor::class, 'color_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderItem()
    {
        return $this->hasOne(OrderItem::class, 'item_variant_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'user_id', 'id');
    }

    /**
     * The latest order sale
     *
     * @return HasOne
     */
    public function latestSale(): HasOne
    {
        return $this->hasOne(OrderItem::class)->where('order_status_id', ORDER_STT_COMPLETED)->latest();
    }

    /**
     * Scope a query to only include active brands.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', CONST_ENABLE);
    }
}
