<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Redis;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::latest()->get();
        return view('Admin.products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // $products = product::latest()->get();
        return view('Admin.products.create',compact('categories'));
        // return view('Admin.products.create',compact(['categories','products']));
        // return view('Admin.products.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // $this->validate($request,[
        //     // 'product_name'=>'required|max:255|unique:products',
        //     'product_name'=>'required|max:100',
        //     'product_desc'=>'required',
        //     'price'=>'required',
        //     'category_id'=>'required'
        // ]);
      //  $validated = $request->validated();
     
        $product = new product;
        $product->product_name = $request->input('product_name');
        $product->product_desc = $request->input('product_desc');
        $product->price = $request->input('price');
        $product->category_id =$request->input('category_id');
        if($product->save()){
            // return redirect('/admin/products');  //->route('/admin/products');
            return redirect()->route('product_list');
        }else{
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    { 
        $categories = Category::all();
        return view('admin.products.edit',compact(['product','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        //way 1 to update
        // $data = $this->validate($request,[
        //        'product_name'=>'required',
        //        'product_desc'=>'required',
        //          'price'=>'required',
        //        'category_id'=>'required'
        //      ]);
        //  return $request;
        //  return $data;
        // $update = $product->update($data);
        // if( $update == true){
        //  return redirect()->route('product_list');
        // } 

        //way 2 to update
        // $validated = $request->validate([
        //    // 'product_name'=>'required|max:255',
        //     'product_name'=>['required','max:100'],
        //     'product_desc'=>'required',
        //     'price'=>'required',
        //     'category_id'=>'required',
        // ],[                                                     //customize error messages
        //     'required'=>'The :attribute is required',
        //     'product_desc.required'=>'Please give a few lines description'
        // ]);

        $product = product::find($id);   //$request brings the new value
       $product->product_name = $request['product_name'];
       $product->product_desc = $request['product_desc'];
       $product->price = $request['price'];
       $product->category_id= $request['category_id'];
       $product->save();
       return redirect()->route('product_list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
      return redirect()->route('product_list');
    }
}
