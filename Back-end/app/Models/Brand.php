<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    public static $statuses = [
        CONST_ENABLE => 'Enabled',
        CONST_DISABLE => 'Disabled'
    ];

    const CACHE_SUB_NAVBAR = 'SUB-NAVBAR-BRANDS';

    protected $fillable = [
        'name',
        'slug',
        'order',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
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
