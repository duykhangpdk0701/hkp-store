<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewActivity extends Model
{
    use HasFactory;

    protected $table = 'views';

    protected $fillable = [
        'viewable_type',
        'viewable_id',
        'user_id',
        'user_email',
        'user_activity',
        'tracking',
        'ip',
        'forwarded_ip',
        'user_agent'
    ];

    public function viewable()
    {
        return $this->morphTo();
    }
}
