<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function category()
    {
        return $this->belongsTo('App\Model\ItemCategory');
    }
    
}
