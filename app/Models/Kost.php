<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kost extends Model
{
    protected $fillable = [
        'user_id',
        'nama_kost',
        'alamat',
        'daerah',
        'harga',
        'deskripsi',
        'rating'
    ];

    public function images()
    {
        return $this->hasMany(KostImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}