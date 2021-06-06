<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

     protected $with =['product','order'];

    public function product(){
       return $this->belongsTo(product::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
}
 