<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponCodeHistory extends Model
{
    use HasFactory;

    protected $table = 'coupon_code_history';

    protected $fillable = [
        'user_id',
        'coupon_code_id',
        'coupon_code_event_id',
        'order_details_id'
    ];

    public function code()
    {
        return $this->hasOne(CouponCode::class, 'id', 'coupon_code_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */
    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class, 'order_details_id', 'id');
    }
}
