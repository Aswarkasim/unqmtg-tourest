<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = [];

    function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
    function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
