{{-- @dd($categories) --}}
<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{$error}}</li>
                          @endforeach
                      </ul>
                  </div>
                  
              @endif
                <form style="padding: 10px;border:2px solid black;" action="{{ route('product_update',$product->id)}}" method="post">
                    @csrf
                    {{-- <x-forms.input type="text" name="full_name"/> --}}
                    {{-- <input type="hidden" _method="put"> --}}
                    <h1>Edit product: {{$product->product_name}}</h1>
                    Product Name: <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}"><br><br>
                    Product Description : <textarea class="form-control" name="product_desc" id="" cols="30" rows="10">{{$product->product_desc}}</textarea><br>
                    Price : <input type="text" value="{{$product->price}}" class="form-control" name="price" id=""><br>
                    Category : 
                    <x-forms.select name="category_id" class="form-control">
                        <option value="" selected disabled hidden >Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == $product->category_id?"selected":""}}>{{$category->name}}</option>
                        @endforeach
                    </x-forms.select><br><br>
                        {{-- <option value="" selected disabled hidden >Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select> --}}
                    <input class="btn btn-primary" type="submit" value="Update" name="submit">
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>