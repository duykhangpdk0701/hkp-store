<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * @inheritdoc
     */
    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'order_status_id',
        'order_detail_id',
        'item_id',
        'item_variant_id',
        'item_stock_id',
        'size_id',
        'color_id',
        'coupon_code_id',
        'item_name',
        'sku',
        'code',
        'size_value',
        'color_name',
        'color_value',
        'price_in',
        'price',
        'quantity',
        'discount',
        'tax',
        'shipping',
        'payment_fee',
        'total',
        'reward',

        'coupon_code_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderDetails()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function items()
    {
        return $this->hasOne(ItemStock::class, 'id', 'item_stock_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function supplier()
    {
        return $this->hasOne(User::class, 'id', 'supplier_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function variant()
    {
        return $this->belongsTo(ItemVariant::class, 'item_variant_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemStock()
    {
        return $this->belongsTo(ItemStock::class, 'item_stock_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getOrder()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemSize()
    {
        return $this->belongsTo(ItemSize::class, 'size_id', 'id');
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getCreatedAtAttribute($value)
    {
        return date("d/m/Y H:i", strtotime($value));
    }

    /**
     * @param $value
     * @return false|string
     */
    public function getUpdatedAtAttribute($value)
    {
        return date("d/m/Y H:i", strtotime($value));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function couponCode()
    {
        return $this->hasOne(CouponCode::class, 'id', 'coupon_code_id');
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
                $attributes[] = $this->sku;
            }
            if (in_array('new_status', $show)) {
                $attributes[] = $this->getTextNewStatus();
            }
            if (in_array('size', $show)) {
                $attributes[] = $this->size_value;
            }
            if (in_array('price', $show)) {
                $attributes[] = $this->price;
            }
        }
        if (!empty($attributes)) {
            $text .= '( ' . implode(' | ', $attributes) . ' )';
        }
        return $text;
    }
}
