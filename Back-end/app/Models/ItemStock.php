<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Arr;

class ItemStock extends Model
{
    use HasFactory;

    const STOCK_IN_STOCK = 1;
    const STOCK_PRE_ORDER = 2;
    const STOCK_OUT_OF_STOCK = 3;
    const STOCK_SOME_DAYS = 4;
    const STOCK_RECEIVING = 5;
    const STOCK_RECEIVED = 6;

    public static $stockStatuses = [
        self::STOCK_IN_STOCK => 'In Stock',
        self::STOCK_PRE_ORDER => 'Pre Order',
        self::STOCK_OUT_OF_STOCK => 'Out Of Stock',
        self::STOCK_SOME_DAYS => 'Some Days',
        self::STOCK_RECEIVING => 'Receiving',
        self::STOCK_RECEIVED => 'Received'
    ];

    const STOCK_OUT_TYPE_RETURN = 1;
    const STOCK_OUT_TYPE_SOLD = 2;
    const STOCK_OUT_TYPE_BID_DECLINED = 3;

    const STATUS_PENDING_APPROVAL = 0;
    const STATUS_APPROVED = 1;

    const DUE_DAYS = 0; // For test, release change to 4 days

    protected $table = 'item_stocks';

    protected $fillable = [
        'item_variant_id',
        'item_id',

        'stock_status_id',

        'code',
        'sku',

        'size_value',
        'size_id',

        'color_value',
        'color_name',
        'color_id',

        'price_in',
        'price',
        'is_sale',
        'old_price',

        'stock_in_date',
        'stock_in_note',
        'stock_in_type',

        'stock_out_date',
        'stock_out_note',
        'stock_out_type',

        'status',
        'created_by'
    ];

    /**
     * Return the item variant that this stock belongs to
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function itemVariant()
    {
        return $this->belongsTo(ItemVariant::class, 'item_variant_id', 'id');
    }

    /**
     * Return the item that this stock belongs to
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    /**
     * Return the a collection of prices
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function prices()
    {
        return $this->hasMany(ItemStockPrice::class)->latest();
    }

    /**
     * Return the latest prices of the resource
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function latestPrice()
    {
        return $this->prices()->take(1);
    }

    /**
     * Return the size that the resource belongs to
     *
     * @return BelongsTo
     */
    public function itemSize(): BelongsTo
    {
        return $this->belongsTo(ItemSize::class, 'size_id', 'id');
    }

    /**
     * Return the color that the resource belongs to
     *
     * @return BelongsTo
     */
    public function itemColor(): BelongsTo
    {
        return $this->belongsTo(ItemSize::class, 'color_id', 'id');
    }

    /**
     * Scope a query to only include in stock stocks.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInStock($query)
    {
        return $query->where('stock_status_id', self::STOCK_IN_STOCK);
    }

    /**
     *
     */
    public function orderItem()
    {
        return $this->hasOne(orderItem::class, 'item_stock_id', 'id');
    }

    public function getCreatedAtAttribute($value)
    {
        return date("d/m/Y H:i", strtotime($value));
    }
}
