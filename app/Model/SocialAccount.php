<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;
class SocialAccount extends Model
{
    //
    protected $table = 'social_accounts';
    protected $guarded = ['id'];
    protected $fillable = ['user_id', 'provider_user_id', 'provider'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
    * [created_at]的mutator
    *
    * @param $value
    * @return string
    */
    public function getCreatedAtAttribute($value)
    {
        if(!$value)return false;
        $timestamp = $this->asDateTime($value);
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC');
        //$timezone = Carbon::now()->timezoneName;//時區
        //$date = $date->setTimezone($timezone);
        return $date->toDateTimeString();

    }
    
    public function getUpdatedAtAttribute($value)
    {
        if(!$value)return false;
        $timestamp = $this->asDateTime($value);
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $value, 'UTC');
        //$timezone = Carbon::now()->timezoneName;//時區
        //$date = $date->setTimezone($timezone);
        return $date->toDateTimeString();
        
    }
}
