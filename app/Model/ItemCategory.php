<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    //
   
    public function post()
    {
    	return $this->hasMany('App\Model\Item','category_id');
       
    }
    
}
