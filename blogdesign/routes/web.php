<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $categories = Category::all();
    $allpost =  Post::latest()->get();
    // return $allpost;
    return view('mainpage',['posts'=>$allpost,'categories'=>$categories]);
});

Route::get('/index/{id}',function($id){
    $post= Post::find($id);
    return view('index',['post'=>$post]);
});
