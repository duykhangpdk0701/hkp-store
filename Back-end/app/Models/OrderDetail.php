<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    /**
     * @inheritdoc
     */
    protected $table = 'order_detail';

    protected $fillable = [
        'order_id',
        'item_id',
        'item_variant_id',
        'size_id',
        'size_value',
        'color_id',
        'color_name',
        'color_value',
        'price',
        'new_status',
        'quantity',
        'items',
        'coupon_code'
    ];

    public $timestamps = true;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function couponCode()
    {
        return $this->hasOne(CouponCode::class, 'code', 'coupon_code');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemVariant()
    {
        return $this->belongsTo(ItemVariant::class, 'item_variant_id', 'id');
    }

    public function getSize()
    {
        return $this->size_value;
    }

    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute($value)
    {
        return date("d/m/Y", strtotime($value));
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getUpdatedAtAttribute($value)
    {
        return date("d/m/Y", strtotime($value));
    }

    public function getTextNewStatus()
    {
        $num = intval($this->new_status);
        if ($num == 1) {
            return 'New';
        }
        return 'Used';
    }

    public function getFullnameAndAttributes($show)
    {
        $attributes = [];
        $text = '';
        if (!empty($show)) {
            if (in_array('name', $show)) {
                $text .= $this->item->name;
            }
            if (in_array('sku', $show)) {
                $attributes[] = $this->item->sku_producer;
            }
            if (in_array('new_status', $show)) {
                $attributes[] = $this->getTextNewStatus();
            }
            if (in_array('size', $show)) {
                $attributes[] = $this->getSize();
            }
            if (in_array('price', $show)) {
                $attributes[] = $this->getPrice();
            }
        }
        if (!empty($attributes)) {
            $text .= '( ' . implode(' | ', $attributes) . ' )';
        }
        return $text;
    }

    public function getDiscountPrice($priceDiscount, $priceType)
    {
        if ($priceType == CouponCode::AMOUNT_TYPE_PERCENT)
            return   $this->price  * $priceDiscount / 100;
        if ($priceType == CouponCode::AMOUNT_TYPE_PRICE)
            return  $this->price - $priceDiscount;
    }

    public function getDiscountAttribute($value)
    {
        return $value;
    }
}
