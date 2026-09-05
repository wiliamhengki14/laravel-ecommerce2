<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    // Data yang di izinkan boleh di isi
    protected $fillable = [
        'product_id',
        'order_id',
        'amount',
    ];

    // Transaction N:1 Product
    public function product() {
        return $this->belongsTo(Product::class);
    }
    // N:1 Order
    public function order() {
        return $this->belongsTo(Order::class);
    }
}
