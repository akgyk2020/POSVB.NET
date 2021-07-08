<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
<div class="row">
    <div class="col-md-8">
       <div class="card">
           <div class="card-body">
           
           <div class="row row mb-2">
                    <div class="col-md-6"><h2 class="font-weight-bold">Master Product</h2> </div>
                    <div class="col-md-6">
                    <div class="input-group mb-6">
                    <div class="input-group-prepend">
                        <span  class="input-group-text" id="basic-addon3">Searching</span>
                        <input wire:model="search" type="text" placeholder="Typing your item here" type="text" class="form-control"></div></div></div>
                </div>
               <table class="table table-bordered table-hovered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>PLU</th>
                                <th>Name</th>
                                <th width="10%">Image</th>
                                <th>Description</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Disc</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $index => $product)
                            <tr>
                                <td>{{$index + 1}}</td> 
                                <td>{{$product->plu}}</td>   
                                <td>Item: {{$product->name}}</td>
                                <td><img src="{{asset('storage/images/'.$product->image)}}" alt="Product Image" class="img-fluid"></td>
                                <td>{{$product->description}}<br> Tag: {{$product->tag_id}}<br>Supp: {{$product->supp_id}}</td>
                                <td>{{$product->qty}}</td>
                                <td>Rp.{{ number_format($product->price,2,',','.')}} </td>
                                <td>disc1 Rp.{{ number_format($product->discount_price,0,',','.')}}<br>disc2 Rp.{{ number_format($product->discount_price_1,0,',','.')}}<br>disc3 Rp.{{ number_format($product->discount_price_2,0,',','.')}}<br>disc4 Rp.{{ number_format($product->discount_price_3,0,',','.')}}</td>
                                <td><button type="edit" class="btn btn-success btn-block">Edit</button><button type="Delete" class="btn btn-danger btn-block">Delete</button> </td>

                            </tr>
                            
                            @empty
                                <h7>Product not Found</h7>

                            @endforelse
                            
                        </tbody>
               </table>
               <div style="display:flex;justify-content:center;">{{$products->links()}}</div>
           </div>
       </div>
    </div>
    <div class="col-md-4">
    <div class="card">
           <div class="card-body">
               <h2 class="font-weight-bold mb-1">Create Product </h2> 
                <form  wire:submit.prevent="store">
                <div class="form-group">
                <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">User ID</span>
                        </div>
                        <input wire:model="user_id" type="number" class="form-control">
                        @error('user_id')<small class="text-danger">{{$message}}</small>@enderror
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Supp ID</span>
                        </div>
                        <input wire:model="supp_id" type="number" class="form-control">
                        @error('supp_id')<small class="text-danger">{{$message}}</small>@enderror
                </div></div>
                <div class="input-group mb-3">   
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">PLU</span>
                        </div>
                        <input wire:model="plu" type="number" class="form-control">
                        @error('plu')<small class="text-danger">{{$message}}</small>@enderror
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">TAG</span>
                        </div>
                        <input wire:model="tag_id" type="number" class="form-control">
                        @error('tag_id')<small class="text-danger">{{$message}}</small>@enderror
                </div>

                   

                
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span  class="input-group-text" id="basic-addon3">Product Name</span>
                    </div>
                        <input wire:model="name"  type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        @error('name')<small class="text-danger">{{$message}}</small>@enderror
                    </div>

                    <div class="input-group mb-3"> 
                        <div class="custom-file">
                            <input wire:model="image" type="file" class="custom-file-input" id="customFile">
                            <label for="customFile" class="custom-file-label">Choose Product Image</label>
                            @error('image')<small class="text-danger">{{$message}}</small>@enderror
                        </div>
                        @if($image)
                            <label class="mt-2">Image Preview:</label>
                            <img  src="{{$image->temporaryUrl()}}" class="img-fluid"  alt="Preview Image">
                        @endif
                    </div>  
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                        </div>
                        <textarea wire:model="description" class="form-control" aria-label="With textarea"></textarea>
                        @error('description')<small class="text-danger">{{$message}}</small>@enderror   
                    </div> 

                     
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Qty</span>
                        </div>
                        <input wire:model="qty" type="number" class="form-control">
                        @error('qty')<small class="text-danger">{{$message}}</small>@enderror
                    </div>


                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                            <input wire:model="price" type="number" class="form-control"> 
                            @error('price')<small class="text-danger">{{$message}}</small>@enderror
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Discount 1,2</span>
                        </div>
                            <input wire:model="discount_price" type="number" class="form-control"> 
                            @error('discount_price')<small class="text-danger">{{$message}}</small>@enderror
                            <input wire:model="price_1" type="number" class="form-control"> 
                            @error('price_1')<small class="text-danger">{{$message}}</small>@enderror
                         
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Discount 3,4</span>
                        </div>
                            <input wire:model="price_2" type="number" class="form-control"> 
                            @error('price_2')<small class="text-danger">{{$message}}</small>@enderror
                            <input wire:model="price_3" type="number" class="form-control"> 
                            @error('price_3')<small class="text-danger">{{$message}}</small>@enderror
                    </div>

                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary active btn-block">Save</button>
                        <button type="hidden" class="btn btn-secondary btn-block" disabled>Clear</button>
                    </div>
                </form>
            </div>
       </div> 
         <!--  show on front end  
        <div class="card mt-3">
            <div class="card-body">
                <h3>{{$name}}</h3>
                <h3>{{$image}}</h3>
                <h3>{{$description}}</h3>
                <h3>{{$qty}}</h3>
                <h3>{{$price}}</h3>
                <h3>{{$discount_price}}</h3>
            </div>
        </div>
          -->
    </div>
</div> 
</div>

