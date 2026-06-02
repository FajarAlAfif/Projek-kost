<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    'user_id',
    'kost_id',
    'booking_date',
    'status'
    ];
    public function kost()
    {
    return $this->belongsTo(
        \App\Models\Kost::class
    );
    }

}
