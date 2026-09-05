<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Data yang boleh di isi
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        'stock'
    ];

    // Product 1 to manny Transaction
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
    // Product 1 to m Cart
    public function carts() {
        return $this->hasMany(Cart::class);
    }
}
