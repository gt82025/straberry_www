<?php

namespace App\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //
	use SoftDeletes;
   protected $table = 'books';
   protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo('App\Model\BookCategory','category_id','id');
    }
    
    

    
    
    /**
    * [created_at]的mutator
    *
    * @param $value
    * @return string
    */
    public function getCreatedAtAttribute($value)
    {
        if(!$value)return null;
        $timestamp = $this->asDateTime($value);
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC');
        //$timezone = Carbon::now()->timezoneName;//時區
        //$date = $date->setTimezone($timezone);
        return $date->toDateTimeString();

    }
    
    public function getUpdatedAtAttribute($value)
    {
        if(!$value)return null;
        $timestamp = $this->asDateTime($value);
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC');
        //$timezone = Carbon::now()->timezoneName;//時區
        //$date = $date->setTimezone($timezone);
        return $date->toDateTimeString();
        
    }
}
