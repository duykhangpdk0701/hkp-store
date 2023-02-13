<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStockPrice extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_stock_prices';

    protected $fillable = [
        'item_stock_id',
        'old_price',
        'price',
        'created_by',
        'updated_by'
    ];

    /**
     * return the collection of the stock this resource belongs to
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function itemStock()
    {
        return $this->belongsTo(ItemStock::class);
    }
}
