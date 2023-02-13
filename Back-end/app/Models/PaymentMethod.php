<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes, HasTranslations;

    const KEY_CASHONDELIVERY = 'CashOnDelivery';
    const KEY_ATM_ONLINE = 'ATM_ONLINE';
    const KEY_IB_ONLINE = 'IB_ONLINE';
    const KEY_ATM_OFFLINE = 'ATM_OFFLINE';
    const KEY_VISA = 'VISA';
    const KEY_PAYATSTORE_CASH = 'PayAtStoreCash';
    const KEY_PAYATSTORE_TRANSFER = 'PayAtStoreTransfer';
    const KEY_PAYATSTORE_CREDIT = 'PayAtStoreCredit';
    const KEY_PAYATSTORE_MOMO = 'PayAtStoreMoMo';
    const KEY_ORDERONLINE = 'OrderOnline';
    const KEY_COD = 'COD';
    const FEE_TYPE_PERCENT = 1;
    const FEE_TYPE_PRICE = 2;
    const ACTIVE = 1;
    const DISABLE = 0;

    protected $fillable = ['type', 'name', 'key', 'fee', 'fee_type', 'status'];

    /**
     * Translatable field
     *
     * @var array
     */
    public $translatable = ['name'];
}
