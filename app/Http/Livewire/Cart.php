<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Product as ProductModel;
use Carbon\Carbon;
class Cart extends Component
{
    public $tax ="0%";

    public function render()
    {
        $products= ProductModel::orderBy('created_at','DESC')->get();
        
        $condition = new \Darryldecode\Cart\CartCondition([
            'name'=>'pajak',
            'type'=>'tax',
            'target'=>'total',
            'value'=>$this->tax,
            'order'=>1
        ]);

        \Cart::session(Auth()->id())->condition($condition);
        $items = \Cart::session(Auth()->id())->getContent()->sortBy(function($cart){
            return $cart->attributes->get('added_at');
        });

        if(\Cart::isEmpty()){
            $cartData=[];
        }else{
            foreach($items as $item){
                $cart[]=[
                    'rowId'=>$item->id,
                    'plu'=>$item->plu,
                    'name'=>$item->name,
                    'qty'=>$item->quantity,
                    'pricesingle'=>$item->price,
                    'price'=>$item->getPriceSum(),
                ];
                
            }
            $cartData= collect($cart);
        }

        $sub_total=\Cart::session(Auth()->id())->getSubTotal();
        $total=\Cart::session(Auth()->id())->getTotal();

        $newCondition= \Cart::session(Auth()->id())->getCondition('pajak');
        $pajak= $newCondition->getCalculatedValue($sub_total);

        $summary = [
            'sub_total'=>$sub_total,
            'pajak'=>$pajak,
            'total'=>$total
        ];

    
        return view('livewire.cart',[
            'products'=>$products,
            'cart'=>$cartData,
            'summary'=>$summary
        ]);
    }

    public function addItem($id){
        $rowId="Cart".$id;
        $cart=\Cart::session(Auth()->id())->getContent();
        $cekItem= $cart->whereIn('id',$rowId);

        if($cekItem->isNotEmpty()){
            \Cart::session(Auth()->id())->update($rowId,[
            'quantity'=>[
                'relative'=>true,
                'value'=>1
                ]
            ]);
        }else{
            $product =ProductModel::findOrFail($id);
            \Cart::session(Auth()->id())->add([
                'id'=>"Cart".$product->id,
                'plu'=>$product->plu,
                'name'=>$product->name,
                'price'=>$product->price,
                'quantity'=>1,
                'attributes'=>[
                    'added_at'=>Carbon::now()
                ],
            ]);

        }
    
        
    }
    public function enableTax(){
        $this->tax="+10%";
    }

    public function disableTax(){
        $this->tax="0%";
    }

    public function increaseItem($rowId){
        //$rowId="Cart".$id;
       // $product=ProductModel::find($id);
       // $cart=\Cart::session(Auth()->id())->getContent();
       // $checkItem=$cart->whereIn('id',$rowId);
        //if($product->qty=$checkItem[$id]->quantity){
       //     session()->flash('error','Qty MInus');
       // }else{
            \Cart::session(Auth()->id())->update($rowId,[
                'quantity'=>[
                    'relative'=>true,
                    'value' =>1
                ]
            ]);
       
        
    }

    public function decreaseItem($rowId){
            \Cart::session(Auth()->id())->update($rowId,[
                'quantity'=>[
                    'relative'=>true,
                    'value' =>-1
                ]
            ]);
       
        
    }

    public function removeItem($rowId){
        \Cart::session(Auth()->id())->remove($rowId);
    }
    
}

