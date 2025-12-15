<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopupRequest extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'va_number',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
