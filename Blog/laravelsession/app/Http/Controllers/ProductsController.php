<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;

class ProductsController extends Controller
{
    //homepage
    public function index(){
        $product_list = product::latest()->get();
        return view('homepage',['productpass'=>$product_list]);
    }
    //category page
    public function cat(Category $category){  //id of catgory is passed
        $product = $category->products;        //all products having id as foreign key same is passed
        return view('category',['products'=>$product,'category'=>$category]);  //id of category and products belonging to that category is passeed
    }

    //products details
    public function prodetails(product $prod){
        return view('product1',['products'=>$prod]);
    }
}


