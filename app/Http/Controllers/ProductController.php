<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
//use App\Http\Controller;
use App\Http\Controllers\Controller;
use App\Model\Meta;
use App\Model\Social;
use App\Model\ProductCategory;
use App\Model\Product;

//use App\Model\Tag;
//use App\Task;

class ProductController extends Controller
{   
	
	public function showProduct($id = null){
		$common = new CommonController;
		$nav = $common->common();  
		$category = ProductCategory::where('published', 1)->orderBy('sort', 'asc')->get();
		$title = '熱門商品';
		if($id){
			if($id == 'sale'){
				$products = Product::where('published', 1)->where('on_sale', 1)->with('category')->orderBy('sort', 'asc')->get();
				$title = '促銷商品';
			}else{
				$products = Product::where('published', 1)->where('category_id', $id)->with('category')->orderBy('sort', 'asc')->get();
				$title = count($products)?$products[0]->category->name:'熱門商品';
			}
		}else{
			$products = Product::where('published', 1)->orderBy('sort', 'asc')->get();//->paginate(9);
		}
		
		return view('front.product.index',
        	[
				'nav' => $nav,
				'title' => $title,
				'id' => $id,
				'category' => $category,
				'products' => $products,

        	]
        ); 
    }

	public function showProductInner($id){
		$common = new CommonController;
		$nav = $common->common();  
	
		if(!$id)return 404;
		$category = ProductCategory::where('published', 1)->orderBy('sort', 'asc')->get();
		$result = Product::with('category')->where('published', 1)->find($id);
		$result->album = explode(',',$result->album);
		$result->picks = Product::where('published', 1)->whereIn('id', explode(',',$result->pick))->with('category')->get();
		return view('front.product.inner',
        	[
				'nav' => $nav,
				'result' => $result,
				'category' => $category
        	]
        );  
    }

	

	


	
	
}
