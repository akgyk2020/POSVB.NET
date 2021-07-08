<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product as ProductModel;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
class Product extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    use WithFileUploads;
    public $plu,$tag_id,$name,$image,$description,$qty,$price,$discount_price,$price_1,$price_2,$price_3,$user_id,$supp_id;
    //'plu','tag_id','name','image','description','qty','price','discount_price','price_1','price_2','price_3','user_id','supp_id'
    public $search;
    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $products= ProductModel::where('name','like','%'.$this->search.'%')->orderBy('created_at','DESC')->paginate(4);
        return view('livewire.product',[
            'products'=> $products
        ]);
    }

    Public function previewImage(){
        $this->validate([
            'image' =>'image|max:2048'
        ]);
    }

    public function store(){
        $this->validate([
            'plu'=>'required',
            'tag_id'=>'required',
            'name'=>'required',
            'image'=>'image|max:2048|required',
            'description'=>'required',
            'qty'=>'required',
            'price'=>'required',
            'discount_price'=>'required',
            'price_1'=>'required',
            'price_2'=>'required',
            'price_3'=>'required',
            'user_id'=>'required',
            'supp_id'=>'required'
        ]);
        $imageName =md5($this->image.microtime().'.'.$this->image->extension());
        
        Storage::putFileAs(
            'public/images',
            $this->image,
            $imageName
        );

        ProductModel::create([
            'plu'=>$this->plu,
            'tag_id'=>$this->tag_id,
            'name' =>$this->name,
            'image' =>$imageName,
            'description' =>$this->description,
            'qty' =>$this->qty,
            'price' =>$this->price,
            'discount_price'=>$this->discount_price,
            'price_1'=>$this->price_1,
            'price_2'=>$this->price_2,
            'price_3'=>$this->price_3,
            'user_id'=>$this->user_id,
            'supp_id'=>$this->supp_id        
        ]);

        session()->flash('info','product created successfully');

            $this->plu  = '';
            $this->tag_id   = '';
            $this->name = '';
            $this->$imageName   = '';
            $this->description  = '';
            $this->qty  = '';
            $this->price    = '';
            $this->discount_price   = '';
            $this->price_1  = '';
            $this->price_2  = '';
            $this->price_3  = '';
            $this->user_id  = '';
            $this->supp_id = '';
            $this->created_at = '';
            $this->updated_at = '';
    }

    
}
