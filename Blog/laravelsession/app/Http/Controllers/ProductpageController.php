<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
class ProductpageController extends Controller
{

    //homepage
    public function index(){
        $product_list = product::latest()->get();
        $categories = category::latest()->get();
        return view('homepage',['productpass'=>$product_list,'categories'=>$categories]);
    }
    //category page
    public function cat(Category $category){  //id of catgory is passed
        $products = $category->products; 
        $all =Category::all();       //all products having id as foreign key same is passed
       // return view('category',['products'=>$product,'category'=>$category,'all'=>$all]);  //id of category and products belonging to that category is passeed
        return view('category',compact('products','category','all'));
    }

    //products details
    public function prodetails(product $prod){
        return view('product1',['products'=>$prod]);
    }

    // public function checkout(){
    //     return view('checkout');
    // }

    public function contact(){
        return view('contact');
    }
    public function grid(){
        return view('shop-grid');
    }
}

