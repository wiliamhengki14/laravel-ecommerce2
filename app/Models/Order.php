<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Data yang boleh di isi
    protected $fillable = [
        'user_id',
        'is_paid',
        'payment_receipt',
    ];
    // Order 1 to m transaction
    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
    // Order N:1 user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
