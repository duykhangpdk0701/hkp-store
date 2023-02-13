<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteDetail extends Model
{
    use HasFactory;

    const QUANTITY_ADD_CART_DEFAULT = 1;

    const CONVERSION_SIZE = [
        'width' => '240',
        'height' => '180'
    ];

    protected $fillable = [
        'quote_id',
        'item_id',
        'item_variant_id',
        'coupon_id',
        'size_id',
        'size_value',
        'color_id',
        'color_name',
        'color_value',
        'price',
        'quantity',
        'discount'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function quote()
    {
        return $this->belongsTo(Quote::class, 'quote_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function size()
    {
        return $this->belongsTo(ItemSize::class, 'size_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function color()
    {
        return $this->belongsTo(ItemColor::class, 'color_id', 'id');
    }

    /**
     * Get created at attribute
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute($value)
    {
        return date("d/m/Y H:i", strtotime($value));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function couponCode()
    {
        return $this->hasOne(CouponCode::class, 'id', 'coupon_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemVariant()
    {
        return $this->belongsTo(ItemVariant::class, 'item_variant_id', 'id');
    }

    public function getDiscountPrice($priceDiscount, $priceType)
    {
        if ($priceType == CouponCode::AMOUNT_TYPE_PERCENT)
            return   $this->price  * $priceDiscount / 100;
        if ($priceType == CouponCode::AMOUNT_TYPE_PRICE)
            return  $priceDiscount;
    }

    public function getDiscountAttribute($value)
    {
        return $value;
    }
}
