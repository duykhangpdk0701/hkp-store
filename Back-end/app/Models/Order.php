<?php

namespace App\Models;

use App\Traits\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

class Order extends Model
{
    use HasFactory, Location;

    /**
     * @inheritdoc
     */
    protected $table = 'orders';
    const ORDER_INVOICE_CODE_PREFIX = 'HKPM-';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_code',
        'shipper_id',
        'customer_id',
        // 'billing_name',
        // 'billing_address',
        // 'billing_country_id',
        // 'billing_city_id',
        // 'billing_district_id',
        // 'billing_ward_id',
        // 'billing_phone',
        'shipping_name',
        'shipping_address',
        'shipping_country_id',
        'shipping_city_id',
        'shipping_district_id',
        'shipping_ward_id',
        'shipping_phone',
        'payment_method',
        'payment_method_id',
        // 'payment_fee',
        // 'payment_fee_type',
        'comment',
        'coupon_id',
        'ip',
        'forwarded_ip',
        'user_agent',
        'accept_language',
        // 'created_by',
        // 'updated_by',
        'total',
        // 'grand_total',
        // 'original_total',
        'total_price',
        'total_discount',
        'total_shipping',
        'total_payment_fee',
        'total_cancel',
        'order_status_id',
        'note',
        'uuid'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function paymentMethod()
    {
        return $this->hasOne(PaymentMethod::class, 'id', 'payment_method_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderStatus()
    {
        return $this->hasOne(OrderStatus::class, 'id', 'order_status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function couponCode()
    {
        return $this->hasOne(CouponCode::class, 'id', 'coupon_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getOrderDetail()
    {
        return $this->hasOne(OrderDetail::class, 'order_id', 'id');
    }

    public function getOrderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff()
    {
        return $this->belongsTo(User::class, 'staff_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    /**
     * Resource belongs to an item bid confirmation
     *
     * @return BelongsTo
     */
    public function itemBidConfirmation(): BelongsTo
    {
        return $this->belongsTo(ItemBidConfirmation::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
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

    /**
     * Get shipping address
     * @return mixed
     */
    public function shippingAddress()
    {
        $this->address = $this->shipping_address;
        $this->street_id = $this->shipping_street_id;
        $this->ward_id = $this->shipping_ward_id;
        $this->district_id = $this->shipping_district_id;
        $this->city_id = $this->shipping_city_id;
        return $this->locationToText();
    }

    /**
     * Get billing address
     * @return mixed
     */
    public function billingAddress()
    {
        $this->address = $this->billing_address;
        $this->street_id = $this->billing_street_id;
        $this->ward_id = $this->billing_ward_id;
        $this->district_id = $this->billing_district_id;
        $this->city_id = $this->billing_city_id;
        return $this->locationToText();
    }
}
