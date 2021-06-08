<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\product;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Symfony\Component\HttpFoundation\File\UploadedFile;
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
        if(Auth::user()->user_type === 'admin'){
            $products = product::latest()->get();
        return view('Admin.products.index',['products'=>$products]);
        }else{
            $products = product::whereUserId(Auth::user()->id)->latest()->get();
            return view('Admin.products.index',['products'=>$products]);
        }
        
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
    // public function store(StorePostRequest $request)
    public function store(Request $request)
    {
        //@dd($request); 
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
        if($request->hasFile('image_upload')){
            $name = $request->file('image_upload')->getClientOriginalName();
            $request ->file('image_upload')->storeAs('public/images',$name);
            // $product->image = "storage/images/".$name;
            // $image_resize = Image::make(storage_path('app/public/images/'.$name))->resize(550,750);
            // $image_resize->save(storage_path('app/public/images/thumbnail/'.$name));
            // Image::make(storage_path('app/public/images/'.$name))->resize(550,750)->save(storage_path('app\public\images\thumbnail\\'.$name));
            //image_crop($name, 550, 750);
            $product->image = $name;
        }
        $product->price = $request->input('price');
        $product->category_id =$request->input('category_id');
        $product->user_id = Auth::user()->id;
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
    public function update(StorePostRequest $request, product $product)
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


        //using gate allows function to authorize
        // if(!Gate::allows('update-product',$product)){
        //     abort(403);
        // }
        
        //using gate authorize to authorize
        //Gate::authorize('update-product',$product);

        //using policiy
        $this->authorize('update',$product);

        //if $product is unknown here it searches for policiy bind with product model and implements update function
        //$this->authorize('update',product::class);


      //  $product = product::find($id);   //$request brings the new value
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
        if(!Gate::allows('delete-product',$product)){
            abort(403);
        }
        $product->delete();
      return redirect()->route('product_list');
    }
}
