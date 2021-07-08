<div >
    {{-- Care about people's approval and you will be their prisoner. --}}
<div class="row">
    <div class="col-md-8">
       <div class="card">
           <div class="card-body">
               <h2 class="font-weight-bold mb-1">Product List </h2> 
               <div class="row">
               @foreach($products as $product)
               <div class="col-md-3 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/images/'.$product->image)}}" alt="Product Image" class="rounded float-center" height="100"  width="150px">
                        </div>
                        <div class="card-footer">
                        <div class="text-center"><h7>{{$product->plu}}</h7></div>
                        <div class="text-center font-weight-bold"><h7>{{$product->name}}</h7></div>
                        <div class="text-center"><h7>Stock :{{$product->qty}}</h7></div>
                        <div class="text-center"><h7>Prices : Rp. {{$product->price}}</h7></div>
                            <button wire:click="addItem({{$product->id}})" class="btn btn-success btn-sm btn-block">add to cart</button>
                        </div>

                    </div>
               </div>
               @endforeach
               </div>
           </div>
       </div>
    </div>
    <div class="col-md-4">
    <div class="card">
           <div class="card-body ">
               <h2 class="font-weight-bold mb-1 center">Cart List </h2> 
                 <table class="table table-sm table-bordered table-hovered">
                 <thead class="bg-secondary text-white">
                    <tr>
                        <th>No</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>action</th>
                        <th>Price</th>
                    </tr>
                 </thead>
                 <tbody>
                 @forelse($cart as $index=>$cart)
                     <tr class="">
                        <td>{{$index + 1}}</td>
                        <td><a href="#" class="font-weight-bold text-dark">{{$cart['name']}}</a></td>
                        <td>{{$cart['qty']}} <td>
                        
                        <a href="#" wire:click="increaseItem('{{$cart['rowId']}}')" class="font-weight-bold text-dark" style="font-size:15px;">+ </a> 
                        <a href="#" wire:click="decreaseItem('{{$cart['rowId']}}')" class="font-weight-bold text-dark" style="font-size:15px;">- </a>
                        <a href="#" wire:click="removeItem('{{$cart['rowId']}}')" class="font-weight-bold text-dark" style="font-size:15px;">x </a>
                        
                        <td>{{$cart['price']}}</td>
                     </tr>   
                 @empty
                    <td colspan="3" class="text-center">Empty Cart</td>
                 @endforelse
                 </tbody>
                 </table>
            </div>
       </div> 
         
    
            <div class="card">
                <div class="card-body">
                   <div> <h7 class="font-weight-bold">Cart Summary</h7></div>
                   <div> <h7 class="font-weight-bold">Sub Total: Rp. {{$summary['sub_total']}}</h7></div>
                   <div> <h7 class="font-weight-bold">Tax: Rp. {{$summary['pajak']}}</h7></div>
                   <div> <h7 class="font-weight-bold">Total: Rp. {{$summary['total']}}</h7></div>
                <div>
                   <button wire:click="enableTax"   class="btn btn-primary btn-block">add tax</button>
                   <button wire:click="disableTax"  class="btn btn-danger btn-block">Remove tax</button>
                </div>
                <div class="mt-4">
                   <button   class="btn btn-success active btn-block">Save Transaction</button>
                </div>
                </div>
            </div>
    </div>
</div> 
</div>
