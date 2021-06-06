<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
        'image' => "",
    ];
    protected $with =['category'];  //for faster

    public function Category()
    { 
        return $this->belongsTo(Category::class);
    }
    public function orderitem()
    { 
        return $this->hasMany(OrderItem::class);
    }
    // public function Cat()  //laravel assumes cat_id as foreign key here so at this point foreign key muust also be passed
    //  {
    //      return $this->belongsTo(Category::class,'category_id');
    //  }

//     public function scopeSearch($query, array $terms){ 
//         $search = $terms['search'];
//         $category = $terms['category'];
//         $query->when($search, function($query, $search){
//             return $query->where('product_name', 'like', '%'. $search .'%')
//                 ->orWhere('product_desc', 'like', '%'. $search .'%');
//         } , function($query){
//         return $query->where('id', '>', 0);
//     });

//         $query->when($category, function($query, $category){
//             return $query->whereCategoryId($category);
//         });

//         // if( $search ) {
//         //     $query->where('product_name', 'like', '%'. $search .'%')
//         //         ->orWhere('product_desc', 'like', '%'. $search .'%');
//         // }
//         return $query;
//  }
// }

public function scopeSearch($query, array $terms){ 
    $search = $terms['search'];
    $category = $terms['category'];
    if($search){
         $query->where(function($query) use ($search){
             return $query->where('product_name', 'like', '%'. $search .'%')
            ->orWhere('product_desc', 'like', '%'. $search .'%');
        });
    //     ,function($query){
    //         return $query->where('id','>',0);
    //     });
     }
    $query->when($category, function($query, $category){
        return $query->whereCategoryId($category);
    });
    return $query;
  }
}
