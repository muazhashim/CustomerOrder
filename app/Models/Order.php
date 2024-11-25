<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "Order";
    protected $fillable = [
        'user_id',
        'order_date',
        'order_total',
        'payment_type',
        'image',
    ];

    public function  user()
    {
        return $this->belongsTo(User::class);
    }

}
