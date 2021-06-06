{{-- @dd($categories) --}}
<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 
                <form  enctype="multipart/form-data" action="{{route('categories.store')}}" method="POST"  >
                    @csrf
                    {{-- <x-forms.input type="text" name="full_name"/> --}}
                    <h1>Create Category</h1>
                    Category Name: <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" @error('name')
                 style="border-color : red;"
                @enderror >
                           @error('name')
                                 <div class="alert alert-danger">{{$message}}</div>
                           @enderror<br><br>
                           Category Slug: <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}"><br><br>
                    Category Description : <textarea class="form-control" name="description" id="" cols="30" rows="10">{{old('description')}}</textarea>
                            @error('description')
                              <div class="alert alert-danger">{{$message}}</div>
                            @enderror<br>  
                   
                   
                  
                     Parent Category : 
                    <x-forms.select name="parent_id" class="form-control">
                        <option value="" selected disabled hidden >Category</option>
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{$category->id == old('parent_id')?"selected":""}}>{{$category->name}}</option>
                        @endforeach
                    
                    </x-forms.select> 
                     @error('parent_id')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror<br><br> 
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
<script>
    jQuery(document).ready(function($){
        $('#name').on('change', function(){
            var name = $('#name').val();
            var slug = name.replace(/\s+/g, '-').toLowerCase();
            $('#slug').val(slug);
        })
    })
</script>
