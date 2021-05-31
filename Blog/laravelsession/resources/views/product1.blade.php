@extends('product-layout')
{{-- @section('header')
 <h1>Hello world</h1>
@endsection --}}
@section('content')
{{-- <div class="container"> --}}
    <section class="product-area shop-sidebar shop section">
        <div class="container">
            <div class="row">
                     @include('include.sidebar')
                     <div class="col-lg-9 col-md-8 col-12">
						
						<div class="row">
                            <div class="details">
                                    <h1>Product name: {{$products->product_name}}</h1>
                                    <hr>
                                     <p>Product description: {{$products->product_desc}}</p>
                                     <p>Product price: {{$products->price}}</p>  {{--to parse html --}}
                                     <p>Product category: {{$products->category->name}}</p>
                                     <hr><hr>
                                     <a href="/home-page" style="color:orange">Go  to home page</a><br>
                                     <a href="/category/{{$products->category->id}}" style="color:orange">Go  back to category page</a>

                            </div>
                         
    
    
							
						
						</div>
					</div>
            </div>
        </div>
    </section>

{{-- </div> --}}
 @endsection
