<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_order extends Model
{
    protected $table = 'product_order';
    protected $primaryKey = 'pro_id';
    protected $guarded = [];
      public function oder()
    {
        return $this->belongTo('App\Order' ,'or_oder' ,'pro_id');
    }
}
