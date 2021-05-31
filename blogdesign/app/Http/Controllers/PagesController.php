<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home(){
        $categories = Category::all();
        $allpost =  Post::latest()->get();
        // return $allpost;
        return view('mainpage',['posts'=>$allpost,'categories'=>$categories]);
    }
    public function index($id){
        $post= Post::find($id);
        return view('index',['post'=>$post]);
    }
}
