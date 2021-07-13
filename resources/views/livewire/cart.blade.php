<div >
    {{-- Care about people's approval and you will be their prisoner. --}}
<div class="row">
    <div class="col-md-8">
       <div class="card">
                <div class="card-header bg-white">
                    <div class="row mb-2">
                    <div class="col-md-6"><h4 class="font-weight-bold">List Product</h4> </div>
                    <div class="col-md-6"><input wire:model="search" type="text" placeholder="Typing your item here" class="form-control">                 </div> 
                    </div>
                </div>
           <div class="card-body">
                
               <div class="row">
               @forelse($products as $product)
               <div class="col-md-3 mb-3">
                    <div class="card">
                        
                        <img src="{{ asset('storage/images/'.$product->image)}}" alt="Product" style="object-fit:contain; width:100%; height:170px">
                        <button wire:click="addItem({{$product->id}})" class="btn btn-success btn-sm" style="position:absolute;top:0;right:0;padding:10px 10px"><i class="fas fa-shopping-bag fa-lg"></i></button>
                         
                        <h6 class="text-center font-weight-bold mt-2">{{$product->plu}} . {{$product->name}}</h6>
                        <h8 class="text-center">Stock :{{$product->qty}}</h8>
                        <h8 class="text-center">Rp.{{ number_format($product->price,2,',','.')}} </h8>
                       

                    </div>
               </div>
               @empty
               <div class="col-sm-12 mt-5">
                   <h7 class="text-center font-weight-bold text-primary">Product not Found</h7>
               </div>
               @endforelse
               </div>
               <div style="display:flex;justify-content:center;">{{$products->links()}}</div>
           </div>
           
       </div>
    </div>
    <div class="col-md-4">
    <div class="card">
         <div class="card-header bg-dark text-white">

         <h4 class="font-weight-bold mb-1 center">List Cart  </h4> 
            
                
         
              
         </div>
           <div class="card-body ">
                @if(session()->has('error'))
                    <p class="text-danger font-weight-bold">
                        {{session('error')}}
                    </p>  
                @endif
               <table class="table table-sm table-bordered table-hovered">
                 <thead>
                    <tr>
                        <th class="font-weight-bold text-dark">No</th>
                        <th class="font-weight-bold text-dark">Item</th>
                        <th class="font-weight-bold text-dark">Qty</th>
                        <th class="font-weight-bold text-dark">action</th>
                        <th class="font-weight-bold text-dark">Price</th>
                    </tr>
                 </thead>
                 <tbody>
                 @forelse($cart as $index=>$cart)
                     <tr class="font-weight-bold text-dark">
                        <td class="text-center">{{$index + 1}}</td>
                        <td><span href="#" class="font-weight-bold text-dark;cursor:pointer">{{$cart['name']}}<br>Rp.{{ number_format($cart['pricesingle'],2,',','.')}}</span></td>
                        <td class="text-center">{{$cart['qty']}}<br><i class="fas fa-trash" wire:click="removeItem('{{$cart['rowId']}}')"  style="font-size:13px;cursor:pointer;color:red"></i> <td>
                            <button class="btn btn-primary btn-sm" style="padding:7px 10px" wire:click="increaseItem('{{$cart['rowId']}}')">+</button>
                            <button class="btn btn-info btn-sm" style="padding:7px 10px" wire:click="decreaseItem('{{$cart['rowId']}}')">-</button>
                         
                         
                        
                        <td>Rp.{{ number_format($cart['price'],2,',','.')}}</td>
                     </tr>   
                 @empty
                    <td colspan="34" class="text-center">Empty Cart</td>

                 @endforelse
                 </tbody>
                 </table>
            </div>
       </div> 
         
    
            <div class="card">
                <div class="card-body">
                   <div> <h7 class="font-weight-bold">Cart Summary</h7></div>
                   <div> <h7 class="font-weight-bold">Sub Total: Rp.{{ number_format($summary['sub_total'],2,',','.')}}  </h7></div>
                   <div> <h7 class="font-weight-bold">Tax: Rp.{{ number_format($summary['pajak'],2,',','.')}}</h7></div>
                   <div> <h7 class="font-weight-bold">Total: Rp.{{ number_format($summary['total'],2,',','.')}}</h7></div>
                <div class="row">
                    <div class="col-sm-3">
                        <button wire:click="enableTax"   class="btn btn-primary btn-sm" style="padding:7px 10px">add tax</button>
                    </div>

                    <div class="col-sm-3">
                        <button wire:click="disableTax"  class="btn btn-danger btn-sm" style="padding:7px 10px">Remove tax</button>
                    </div>
                   
                </div>
                <div class="form-group mt-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Payment</span>
                        
                            <input type="number" class="form control" id="payment" placeholder="Input customer payment amount">
                        </div>
                    <input type="hidden" class="form control" id="total" value="{{$summary['total']}}" >
                </div>

                <div class="form-group mt-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Payment</span>
                    <h5 id="PaymentText">Rp. 0</h5>
                    </div>
                </div>

                <div class="form-group mt-4">
                    <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Cash Back</span>
                    <h5 id="kembalianText">Rp. 0</h5>
                    </div>
                </div>

                <div class="mt-4">
                   <button wire:ignore disabled  class="btn btn-success  btn-block" id="saveButton">Save Transaction</button>
                </div>
                </div>
            </div>
    </div>
</div> 
</div>

@push('script-custom')
    <script>
      payment.oninput = () => {
           const paymentAmount = document.getElementById("payment").value
           const totalAmount = document.getElementById("total").value

           const kembalian =  paymentAmount - totalAmount
           document.getElementById("PaymentText").innerHTML =`Rp. ${rupiah(paymentAmount)},00`
           document.getElementById("kembalianText").innerHTML =`Rp. ${rupiah(kembalian)},00`
           
           const saveButton = document.getElementById("saveButton")
                if(kembalian < 0){
                    saveButton.disabled = true
                }else{
                    saveButton.disabled = false
                }
           }
           

             
      }

      const rupiah = (angka) => {
          const numberString = angka.toString()
          const split=numberString.split(',')
          const sisa =split[0].length % 3
          let rupiah = split[0].substr(0, sisa) 
          const ribuan = split[0].substr(sisa).match(/\d{1,3}/gi)

          if (ribuan){
              const separator = sisa ? '.':''
              rupiah += separator + ribuan.join('.')

          }
          return split[1] != undefined ? rupiah + ',' + split[1]: rupiah
      }
      
            
    </script>

@endpush
