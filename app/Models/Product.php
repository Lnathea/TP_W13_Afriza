<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'description',
        'toko_id'
    ];

   public function stok()
    {
    return $this->hasOne(Stok::class, 'product_id', 'id');
    }
    
    public function toko()
    {
    return $this->belongsTo(Toko::class, 'toko_id');
    }
}
