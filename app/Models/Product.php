<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='product';
    protected $fillable = ['plu','tag_id','name','image','description','qty','price','discount_price','price_1','price_2','price_3','user_id','supp_id'];
    use HasFactory;
}


//'plu','tag_id','name','image','description','qty','price','discount_price','price_1','price_2','price_3','user_id','supp_id',
