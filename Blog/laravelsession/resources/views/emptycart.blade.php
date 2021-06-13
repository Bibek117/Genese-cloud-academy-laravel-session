@extends('product-layout')
@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li><a href="{{'/'}}">Home<i class="ti-arrow-right"></i></a></li>
                        <li class="active"><a href="{{route('order.index')}}">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->
        
<!-- Shopping Cart -->
<div class="shopping-cart section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>PRODUCT</th>
                            <th>NAME</th>
                            <th class="text-center">UNIT PRICE</th>
                            <th class="text-center">QUANTITY</th>
                            <th class="text-center">TOTAL</th> 
                            <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                        </tr>
                    </thead>
                    
                </table>
               
                <!--/ End Shopping Summery -->
            </div> 
            <h3>&nbsp;Your cart is empty! Please choose products you wanna buy and add to cart...</h3>
        </div>
    </div>
</div>
@endsection