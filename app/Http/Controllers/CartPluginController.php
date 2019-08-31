<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
//use App\Http\Controller;
use App\Http\Controllers\Controller;
use App\Model\Meta;
use App\Model\Slider;
use App\Model\ProductCategory;
use App\Model\Product;
use App\Model\ShipCategory;
use App\Model\Ship;
use App\Model\Discount;
use App\Model\Order;
use App\Model\OrderNumber;
use App\Model\User;
//use App\Task;

class CartPluginController extends Controller
{   
	
	public function orderNumber()
	{
		
		$order = OrderNumber::where('number','like', date('Ymd')."%")->orderBy('id', 'asc')->get();
		$count = count($order);
		//$order = Order::select(DB::raw('count(id) as c'))->where('order_number','like', date('Ymd')."%")->get();
		//$number = date('Ymd').str_pad($count+1, 3, '0', STR_PAD_LEFT);
		$number = date('Ymd').str_pad($count+1, 3, '0', STR_PAD_LEFT);
		$data = new OrderNumber;
		$data->number = $number;
		$data->save();

		return $number;
	}

    public function total($cart, $discount = null, $ship = null){
		
		$subtotal = 0;//全部小計
		$total = 0;
		$bill = [];
		$bill['freight'] = 0 ; //運費
		$bill['delivery']  = ''; //運送方式
		$bill['condition'] = 0; //免運標準
		$bill['condition_total'] = 0; //符合門檻總計
		$total_price= 0;

		$delivery = ShipCategory::where('published', 1)->with('ships')->orderBy('sort', 'asc')->get();
		$item_count = 0;
		$percent = 100;
	
        foreach ($cart as $k => $v) { 
			$cart[$k]->selling = Auth::check()?$v->vip_price:$v->price;
			$cart[$k]->total = $v->selling * $v->qty;
			$cart[$k]->condition = 'false';
			$subtotal += $cart[$k]->total;
			$item_count += $v->qty;
		} 
		
		
		foreach ($delivery as $k => $v) { 
			$delivery[$k]->allpass = 'true';
			$delivery[$k]->freight = 0;
			$cart2 = $cart;
			$delivery[$k]->count = count($cart2);
			$delivery[$k]->condition_count = 0;
			foreach ($v->ships as $k2 => $v2) { 
				//$delivery[$k]->ships[$k2]->picks = Product::where('published', 1)->whereIn('id', explode(',',$v2->pick))->with('category')->get();
				$delivery[$k]->ships[$k2]->picks = explode(',',$v2->pick);
				$delivery[$k]->ships[$k2]->inpick = 0;
				
				foreach($delivery[$k]->ships[$k2]->picks as $k3 => $v3){
					
					foreach($cart2 as $k4 => $v4){
						if($v4->id == $v3){
							$delivery[$k]->ships[$k2]->inpick += $v4->selling * $v4->qty;
							$delivery[$k]->ships[$k2]->count = 'true';
							$delivery[$k]->condition_count++;
						}
							//$delivery[$k]->allpass = 'false';
					}
				}

				if($delivery[$k]->ships[$k2]->inpick > $v2->condition && $delivery[$k]->ships[$k2]->count == 'true'){
					$delivery[$k]->freight += $v2->price;
				}elseif($delivery[$k]->ships[$k2]->inpick < $v2->condition && $delivery[$k]->ships[$k2]->count == 'true'){
					$delivery[$k]->freight = $v->price;
				}	
			} 
			if($delivery[$k]->condition_count != $delivery[$k]->count || $delivery[$k]->freight > $v->price)
			$delivery[$k]->freight = $v->price;
			
		} 
		$bill['delivery'] = $delivery;
		$bill['subtotal'] =  $subtotal;

		if($ship){
			foreach ($delivery as $k => $v) {
				# code...
				if($v->id == $ship->id)
				$bill['freight'] = $v->freight;
			}
		}
		$bill['discount'] = 0 ;
		if($discount){
			$bill['discount_subtotal'] = round(($bill['subtotal'] - $discount->discount_cash) * ($discount->discount / 100));
			$bill['discount'] = $bill['subtotal'] - $bill['discount_subtotal'];
		}
		
		$bill['total'] =  $bill['subtotal'] + $bill['freight'] - $bill['discount'];
		
        Session::put('cart', $cart);
		Session::put('bill', $bill);
		return $bill;
		
	}
	
	
	public function shipping($shipping){
		switch (ceil($shipping)) {
			case 0:
				$shipping = 0;
			break;

			case 1:
				$shipping = 160;
			break;
			
			case ($shipping > 1 && $shipping < 7):
				$shipping = 225;
			break;
			
			case ($shipping > 6 && $shipping < 11):
				$shipping = 290;
			break;
			
			case 11:
				$shipping = 450;
			break;
			
			case ($shipping > 11 && $shipping < 17):
				$shipping = 515;
			break;
			
			case ($shipping > 16 && $shipping < 21):
				$shipping = 580;
			break;
			
			case 21:
				$shipping = 740;
			break;
			
			case ($shipping > 21 && $shipping < 27):
				$shipping = 805;
			break;
			
			case ($shipping > 26 && $shipping < 31):
				$shipping = 870;
			break;
			
			case 31:
				$shipping = 1030;
			break;
			
			case ($shipping > 31 && $shipping < 37):
				$shipping = 1095;
			break;
			
			case ($shipping > 37 && $shipping < 41):
				$shipping = 1160;
			break;
			
			case 41:
				$shipping = 1320;
			break;
			
			case ($shipping > 41 && $shipping < 47):
				$shipping = 1385;
			break;
			
			case ($shipping > 47 && $shipping < 50):
				$shipping = 1450;
			break;
			
			case ($shipping > 50):
				$shipping = 1500;
			break;
			
			default:
				$shipping = 0;
		}
		
		return $shipping;
	}
	

}
