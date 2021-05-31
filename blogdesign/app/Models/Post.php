<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'body',
        'category_id',
    ];
    public function Category()
    { 
        return $this->belongsTo(Category::class);
    }
}
