<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPersonType extends Model
{
    use HasFactory;

    protected $table = 'item_person_types';

    protected $fillable = [
        'code',
        'name'
    ];

    const ITEM_PERSON_TYPE_MEN = 1;
    const ITEM_PERSON_TYPE_WOMEN = 2;
    const ITEM_PERSON_TYPE_KIDS = 3;

    public static $personTypes = [
        self::ITEM_PERSON_TYPE_MEN => 'men',
        self::ITEM_PERSON_TYPE_WOMEN => 'women',
        self::ITEM_PERSON_TYPE_KIDS => 'kids',
    ];

    public function itemSizes()
    {
        return $this->hasMany(ItemSize::class);
    }
}
