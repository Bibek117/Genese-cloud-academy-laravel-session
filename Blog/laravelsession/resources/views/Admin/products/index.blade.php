<x-admin.layout>
    <div class="az-content az-content-dashboard">
        <div class="container">
          <div class="az-content-body">
              <h4><a href="/admin/products/create">Create Products</a></h4>
               <p>User : {{Auth::user()->name}}</p>
               <p>Role :{{Auth::user()->user_type}}</p>
                   <table>
                       <tr>
                           <th>Id</th>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Price</th>
                           <th>Action</th>
                       </tr>
                      
                           @foreach ($products as $product) 
                           <tr>
                           <td>{{$product->id}}</td>
                           <td>{{$product->product_name}}</td>
                            <td>{{$product->product_desc}}</td> {{-- substr($product->product_desc,0,50) --}}
                           <td>{{$product->price}}</td>
                           <td>
                             <button class="btn btn-warning"><a href="{{ route('product_edit',$product->id)}}">Edit</a> </button> <button class="btn btn-danger"><a href="{{ route('product_delete',$product->id)}}">Delete</a></button>
                           </td>
                        </tr>
                       @endforeach  
                   </table>
                </div>
            </div>
        </div>
</x-admin.layout>