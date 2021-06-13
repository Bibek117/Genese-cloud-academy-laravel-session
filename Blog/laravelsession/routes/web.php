<?php

use Illuminate\Support\Facades\Route;
use App\Models\product;
use App\Models\blogpost;
use App\Models\Category;
use App\Http\Controllers\ProductpageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';




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
// Route::get('/', function () {
//     $product_list = array();
//     $product_list[] = array(
//         'product_name'=>'First product',
//         'product_desc'=>'This is a product we want to sell.This is very nice product'
//     );
//     $product_list[] = array(
//         'product_name'=>'Second product',
//         'product_desc'=>'This is a product we want to sell.This is very nice product'
//     );
//     $product_list[] = array(
//         'product_name'=>'Third product',
//         'product_desc'=>'This is a product we want to sell.This is very nice product'
//     );
//     return view('products',['productpass'=>$product_list]);  //products.blade.php
// });
// Route::get('/product', function () {
//     return view('product1');  //product1.blade.php
// });
// Route::get('/', function () {
//     $product_list = product::all();
//     return view('homepage',['productpass'=>$product_list]);  //products.blade.php
// });

// Route::get('/product/{prod}', function (product $prod) {  //route model binding
//     //$product = product::find($id);  //finds the matching product id and send
//     return view('product1',['products'=>$prod]);  //product1.blade.php
// });
//to insert new data
// Route::get('/create-product', function () {
//      product::create([   //refer to model name
//          'product_name' => 'Laptop',
//          'product_desc' => 'This is lenovo Thinkbook15',
//          'image'=> '',
//          'price'=>'10000'
//      ]);
//     // $sql = "INSERT INTO products(name,desc) VALUES('bibej','hjfj')";
// });

//to fetch
// Route::get('/blogpost',function(){
//     $products = product::get();
//     return view('blogpost',['stu' => $products]);
// });
// Route::get('/get-products',function(){
//         $products = product::get();
//        return $products;
//  });

 //for blogpost

 
 //for writing
//  Route::get('/write-post',function(){
//      blogpost::create([         //assocative array
//          'title'=>'How to code',
//          'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius eligendi aliquid cum laborum odio reiciendis exercitationem, perferendis ut quis, asperiores esse dignissimos at. Eum dolor quam officia voluptates asperiores? Officia.
//          Asperiores magnam optio culpa distinctio labore provident cupiditate similique commodi? Facere quaerat suscipit facilis nobis enim obcaecati natus! Adipisci, et dolor. Magni modi, voluptates ab sequi minima quibusdam sit impedit?
//          Laborum, quas! Delectus officiis, est voluptatum ex nostrum quam veritatis! Fugit aliquam quas, in animi ad porro provident dolores natus repudiandae ut magni voluptatum doloremque nisi saepe modi itaque quis.
//          Cumque magni officiis tempora sed voluptatibus iusto incidunt, consequuntur aut repellat dolorum harum reiciendis totam soluta veritatis quia a quidem sapiente aspernatur labore nihil. Libero alias eos quisquam accusantium voluptatibus.
//          Quas fuga facere architecto, vitae in veritatis quae laboriosam et quos maiores alias, harum odio voluptatum recusandae, sapiente id vero quibusdam illum itaque. Corporis tempora blanditiis consequuntur quisquam necessitatibus excepturi!',
//         'author' => 'Hacker',
//         'contact-num' => 5566677,
//         'email' => 'abcdefg@gmail.com',
//      ]);
//      return view('home');
//  });
//  //for fetching
//  Route::get('/show-post',function(){
//      $allpost = blogpost::get();
//      return view('blogpost',['posts'=>$allpost]);
//  });


 //ecommerce homepage
 //Route::get('/home-page',function(){
    // $product_list = product::all();
    // $product_list = product::latest('id')->get();
   // $product_list = product::latest()->get();
    // $product_list = product::latest()->with('category')->get();
   // return view('homepage',['productpass'=>$product_list]);
 //});

 //foreign key
 //Route::get('/category/{category}',function(Category $category){
    //  $product = product::whereCategoryId($category->id)->get();
   // $product = $category->products;
    // return view('category',['products'=>$product,'category'=>$category]);
    //  return $category;
    //  return Category::find(1)->products;   //->first();  //displays one to many such that prducts having id 1 from products as called from category
 //});

//  Route::get('/category',function(){
//     return Category::find(1)->products->where('id',3);   //->first();  //this 1 is foreign key for child and primary key for parent
// });
// Route::get('/category',function(){
//     return Category::find(1)->products->where('product_name','nokia');   //->first();  //this 1 is foreign key for child and primary key for parent
// });

//Route::get('/product/{prod}', function (product $prod) {  //route model binding  
    //$product = product::find($id);  //finds the matching product id and send
   // return view('product1',['products'=>$prod]);  //product1.blade.php
//});

//products route
 Route::get('/',[ProductpageController::class,'index']);
 Route::get('/contact',[ProductpageController::class,'contact'])->name('contact');
 Route::get('/shop-grid',[ProductpageController::class,'grid'])->name('shop-grid');
 Route::get('/category/{category}',[ProductpageController::class,'cat']);
 Route::get('/product/{prod}',[ProductpageController::class,'prodetails']);

//genneraluser

Route::middleware('auth')->group(function(){
 Route::get('/checkout',[App\Http\Controllers\OrderController::class,'checkout'])->name('checkout');
 Route::post('/checkout/store',[App\Http\Controllers\CheckoutDetailController::class,'store'])->name('checkout_store');
});
 //admin routing
//adding prefix admin adds /admin/ to all prefix of routes
//also name can we added and will be applied to all prefixes
//  Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function (){
 Route::middleware(['auth','adminvendor'])->prefix('admin')->group(function (){
      Route::get('products',[App\Http\Controllers\Admin\ProductsController::class,'index'])->name('product_list');  //name for route
      Route::get('products/create',[App\Http\Controllers\Admin\ProductsController::class,'create'])-> name('product_create');
      Route::post('products/store',[App\Http\Controllers\Admin\ProductsController::class,'store']);
      Route::get('products/edit/{product}',[App\Http\Controllers\Admin\ProductsController::class,'edit'])->name('product_edit');
      Route::post('products/update/{product}',[App\Http\Controllers\Admin\ProductsController::class,'update'])->name('product_update');
      Route::get('products/delete/{product}',[App\Http\Controllers\Admin\ProductsController::class,'destroy'])->name('product_delete');
      Route::resource('categories',App\Http\Controllers\Admin\CategoriesController::class);
     
 });
//only two allowed
 //Route::resource('categories',App\Http\Controllers\Admin\CategoriesController::class)->only(['show','index']);
 //except
 //Route::resource('photos', PhotoController::class)->except(['create', 'store', 'update', 'destroy']);

Route::get('/admin/dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index'])->name('admin_dashboard')->middleware(['auth','adminvendor']);

Route::get('search',[App\Http\Controllers\SearchController::class,'search'])->name('search');

Route::resource('order',App\Http\Controllers\OrderController::class)->middleware('auth');

 Route::resource('cart',App\Http\Controllers\OrderItemController::class)->middleware('auth');