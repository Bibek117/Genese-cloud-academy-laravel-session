<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_desc',
        'image',
        'price',
        'category_id',
    ];
    protected $attributes = [
        'image' => " ",
    ];
    protected $with =['category'];  //for faster

    public function Category()
    { 
        return $this->belongsTo(Category::class);
    }
    // public function Cat()  //laravel assumes cat_id as foreign key here so at this point foreign key muust also be passed
    //  {
    //      return $this->belongsTo(Category::class,'category_id');
    //  }
 }
