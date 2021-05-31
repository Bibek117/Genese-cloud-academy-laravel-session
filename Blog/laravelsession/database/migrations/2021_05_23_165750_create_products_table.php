<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_desc');
            $table->string('image');
            $table->string('price');
            $table->foreignId('category_id')->constrained('categories','id');  //if u use this then it will handle the datatype itself
            // $table->unsignedInteger('category_id');
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');  //ondelete cascade basically deletes if the parent id is deleted
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
