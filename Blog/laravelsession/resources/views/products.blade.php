@extends('layout')

@section('content')
<h1>Welcome to main page</h1>
@foreach($productpass as $productdis) <!-- 2d array is changed to 1d array  and : for starting foreach-->  
      <div class="container">
         <h1><a href="/product/{{$productdis->id}}">{{$productdis['product_name']}}</a></h1>
          <p><?php echo $productdis['product_desc']; ?></p>
      </div>
@endforeach   
@endsection