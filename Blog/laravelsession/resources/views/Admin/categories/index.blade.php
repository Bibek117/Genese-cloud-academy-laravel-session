<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
              @can('update',\App\Models\Category::class)
              <h4><a href="/admin/products/create">Create Products</a></h4>
                   <table >
                       <tr>
                           <th>Id</th>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Slug</th>
                           <th>Parent Id</th>
                           <th>Action</th>
                       </tr>
                      
                           @foreach ($categories as $category) 
                           <tr>
                           <td>{{$category->id}}</td>
                           <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td> {{-- substr($product->product_desc,0,50) --}}
                           <td>{{$category->slug}}</td>
                           <td>{{$category->parent_id}}</td>
                           <td>
                             <button class="btn btn-warning"><a href="{{ route('categories.edit',$category->id)}}">Edit</a> </button> <button class="btn btn-danger"><a href="{{ route('categories.destroy',$category->id)}}">Delete</a></button>
                           </td>
                        </tr>
                       @endforeach  
                   </table>
                   @else
                   <h4>You are unauthorized</h4>
                   @endcan
                </div>
            </div>
        </div>
</x-admin.layout>