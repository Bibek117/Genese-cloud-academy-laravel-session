<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutDetail extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','district','province','address','user_id','phone_number'];
}
