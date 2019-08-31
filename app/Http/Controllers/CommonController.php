<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;
use Mail;
use Session;
//use App\Http\Controller;
use App\Http\Controllers\Controller;
use App\Model\Meta;
use App\Model\Social;
use App\Model\ProductCategory;
use App\Model\PostCategory;
//use App\Task;

class CommonController extends Controller
{
    public function common(){
        $result['meta'] = Meta::find(1);
        $result['social'] = Social::where('published', 1)->orderBy('sort', 'asc')->get();
        $result['cartcount'] = Session::has('cart')?count(Session::get('cart')):0;
        $result['product'] = ProductCategory::where('published', 1)->orderBy('sort', 'asc')->get();
        $result['post'] = PostCategory::where('published', 1)->orderBy('sort', 'asc')->get();
        return $result;
    }
    
}
