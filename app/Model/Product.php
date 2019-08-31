<?php

namespace App\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $guarded = ['id'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    
    ];
    public function category()
    {
        return $this->belongsTo('App\Model\ProductCategory','category_id','id');
    }
	
	public function ship()
    {
        return $this->belongsTo('App\Model\Ship','ship_id','id');
    }
    
	public function spec()
    {
        return $this->hasMany('App\Model\ProductSpec','product_id');
    }

    public function stock()
    {
        return $this->hasMany('App\Model\ProductStock','product_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Model\OrderDetail','product_id');
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
