<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Keranjang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function produk() 
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
