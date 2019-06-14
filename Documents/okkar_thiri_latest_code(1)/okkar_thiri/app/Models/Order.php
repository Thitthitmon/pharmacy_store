<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orderdetails';

    public $fillable = [
        'user_id',
        'order_price',
        'order_quantity',
        'order_status',
        'order_total',
        'order_name'
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
