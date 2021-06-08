{{-- @dd($categories) --}}
<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif  --}}

           {{-- @can('create',App\Models\product::class); --}}
                <form  enctype="multipart/form-data" action="/admin/products/store" method="POST"  >
                    @csrf
                    {{-- <x-forms.input type="text" name="full_name"/> --}}
                    <h1>Enter a new product</h1>
                    Product Name: <input type="text" class="form-control" name="product_name" value="{{old('product_name')}}" @error('product_name')
                 style="border-color : red;"
                @enderror >
                           @error('product_name')
                                 <div class="alert alert-danger">{{$message}}</div>
                           @enderror<br><br>
                    Product Description : <textarea class="form-control" name="product_desc" id="" cols="30" rows="10">{{old('product_desc')}}</textarea>
                            @error('product_desc')
                              <div class="alert alert-danger">{{$message}}</div>
                            @enderror<br>  
                   
                    Price : <input type="text" class="form-control"  value="{{old('price')}}" name="price" id="">
                             @error('price')
                                 <div class="alert alert-danger">{{$message}}</div>
                             @enderror<br><br>
                  
                    Category : 
                    <x-forms.select name="category_id" class="form-control">
                        <option value="" selected disabled hidden >Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == old('category_id')?"selected":""}}>{{$category->name}}</option>
                        @endforeach
                    
                    </x-forms.select> 
                     @error('category_id')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror<br><br> 
                    Image : <input type="file" name="image_upload" id=""><br>
                        {{-- <option value="" selected disabled hidden >Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select> --}}
                    <input class="btn btn-primary" type="submit" value="submit" name="submit"> 
                </form>
            </div>
        </div>
    </div>
</x-admin.layout>

{{-- 
<form action="/admin/products/store" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name">
    <textarea name="text" id="" cols="30" rows="10"></textarea>

    <br>
    <input type="file" name="image">
    <input type="text" name="category">
    <input type="submit" value="submit" name="submit">
</form> --}}