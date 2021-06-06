<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    // public function search(){
    //     // return request('search');
    //     // return request(['search']);
    //     $products = product::latest();
    //     if( request('search')){
    //         $products->where('product_name','like','%'.request('search').'%')
    //         ->orWhere('product_desc','like','%'.request('search').'%');
    //     }
    //     return view('products',['products'=>$products->get()]);
    // }
    public function search(){
        //  return request(['search', 'category']);
       $products = Product::latest()->search(request(['search', 'category']))->get();
        // $products = Product::latest()->search(request(['search']))->get();
        return view('products', ['products' => $products]);
    }

}
