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

	public function showTwShopCom($id = null){
		$products = Product::where('published', 1)->with('category')->orderBy('sort', 'asc')->get();
		//return $products;
		$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		$xml .= "<Products> \n";
		foreach ($products as $k => $v) {
			$xml .= "<Product> \n";
			$xml .= "<SKU>$v->id</SKU> \n";
			$xml .= "<Name>$v->name</Name> \n";
			$xml .= "<Description>$v->intro</Description> \n";
			$xml .= "<URL>https://farmertimex.com.tw/product/info/$v->id</URL> \n";
			$xml .= "<Price>$v->price</Price> \n";
			$xml .= "<LargeImage>https://farmertimex.com.tw$v->cover</LargeImage> \n";
			$xml .= "<SalePrice>$v->vip_price</SalePrice> \n";
			$xml .= "<UPC> </UPC> \n";
			$xml .= "<ISBN> </ISBN> \n";
			$xml .= "<MPN> </MPN> \n";
			$xml .= "<Manufacturer>農夫時代</Manufacturer> \n";
			$xml .= "<Brand>草菓農場</Brand> \n";
			$xml .= "<Category>分類</Category> \n";
			$xml .= "<EAN> </EAN> \n";
			$xml .= "<Condition>New</Condition> \n";
			$xml .= "</Product> \n";
		}
		$xml .= "</Products>\n";
        return response($xml,200)->header("Content-type","text/xml");

	}

	
	
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
