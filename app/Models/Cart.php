<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'user_id',
        'product_id',
        'amount',
    ];
    // Cart N:1 Product
    public function product() {
        return $this->belongsTo(Product::class);
    }
    // Cart N:1 User
    public function user() {
        return $this->belongsTo(User::class);
    }
}
