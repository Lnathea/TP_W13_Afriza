<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    use HasFactory;

    protected $table = "toko";

    protected $fillable = [
        'nama_toko',
        'alamat',
        'pemilik'
    ];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}