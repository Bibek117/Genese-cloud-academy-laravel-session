<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\product;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Category::truncate();  only for tables without foreign key~
        // product::truncate();
        
        // \App\Models\User::factory(5)->create();
    //   $category =  \App\Models\Category::create([
    //        'name'=>'headphones',
    //        'description'=>'This category includes headphones'
    //    ]);
    //    \App\Models\product::create([
    //        'product_name'=>'ABC',
    //        'product_desc'=>'It was build by ABC',
    //        'price'=>'100000',
    //        'category_id'=>$category->id
    //    ]);

    // $category = Category::create([
    //         'name'=>'Mobile',
    //       'description'=>'This category includes mobile phones'
    // ]);
    // product::create([
    //             'product_name'=>'samsung',
    //            'product_desc'=>'It was build by sumsung',
    //            'price'=>'100000',
    //        'category_id'=>$category->id
    //       ]);
     product::factory(5)->create();
     //product::factory(5)->create([
    //  'category_id'=>2,
     //]);
    //Category::factory(5)->create();
    }
}
