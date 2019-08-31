<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use DB;
use Session;
use Validator;
use Crypt;
use Mail;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CartPluginController;
use App\Http\Controllers\AioSDK\CreateOrder;
//use App\Http\Controllers\AioSDK\ChoiceMap;
use App\Model\Post;
use App\Model\Meta;
use App\Model\Social;
use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\ShipCategory;
use App\Model\Ship;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\UserCategory;
use App\Model\User;
use App\Model\Coupon;
use App\Model\Email;
//use App\Task;

class CartController extends Controller
{   
	public function showProductContent2($id){
		//$result = Product::where('published', 1)->where('name', '幾何慕斯蛋糕')->first();
		
		//$cart = Session::get('cart');
		$result = OrderDetail::find($id);
		
		
		$detail = json_decode($result['detail']);
		foreach ($detail as $k => $v) {
			//$detail[$k]->inside0->info = '1';
			$detail[$k]->inside0->info = Product::where('published', 1)->where('id', $v->inside0->id )->first();
			$detail[$k]->inside1->info = Product::where('published', 1)->where('id', $v->inside1->id )->first();
			$detail[$k]->inside2->info = Product::where('published', 1)->where('id', $v->inside2->id )->first();
			$detail[$k]->inside3->info = Product::where('published', 1)->where('id', $v->inside3->id )->first();
			//$detail[$k]['inside1']['info'] = isset($detail[$k]['inside1']['info'])?$detail[$k]['inside1']['info']:Product::where('published', 1)->where('id', $v['inside1']['id'])->first();
			//$detail[$k]['inside2']['info'] = isset($detail[$k]['inside2']['info'])?$detail[$k]['inside2']['info']:Product::where('published', 1)->where('id', $v['inside2']['id'])->first();
			//$detail[$k]['inside3']['info'] = isset($detail[$k]['inside3']['info'])?$detail[$k]['inside3']['info']:Product::where('published', 1)->where('id', $v['inside3']['id'])->first();
		}
	
		//Session::put('cart', $cart);
		return $detail;
		
	}

	public function showCompleteForm(Request $request){
		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');
		$common = new CommonController;
		$nav = $common->common();
		//$footer_post = Post::where('published', 1)->with('category')->orderBy('published_at','desc')->take(5)->skip(0)->get();
		$order = Session::get('order'); 
		$order = Order::where('order_number', $order['order_number'])->first();
		
		
		//if( $order['payment']  == 'ATM轉帳' )
		Session::forget('bill');
		Session::forget('cart');
		Session::forget('order');
		

		
        return view('front.shop.complete',
            [
                'nav' => $nav,
				//'social' => $social,
				'order' => $order
            ]

        );
	}

	public function atmPayAccount(Request $request){

		//$order = Session::get('order');
		//$order = Order::where('order_number', '20190305002')->first();
		$order = Order::where('MerchantTradeNo', $request->MerchantTradeNo)->first();
		//$order->remark = 'test';
	
		$order->BankCode = $request->BankCode; //繳費銀行代碼 String (3) 812; //付款時間
		$order->vAccount = $request->vAccount; //繳費虛擬帳號 String (16) 9103522175887271
		$order->ExpireDate = $request->ExpireDate; // 繳費期限 String (10) 格式為 yyyy/MM/dd 2013/12/16
		$order->save();
		return '1|OK';
	}
	
	public function checkATM($id){
		//$data = Order::where('order_number', $id)->first();
		//return $data;
		
		return new CreateOrder(); 
	}

	public function atmPayReturn(Request $request){
		
		$order = Order::where('MerchantTradeNo', $request->MerchantTradeNo)->first();
		//$order->MerchantTradeNo = $request->MerchantTradeNo; //特店交易編號
		$order->RtnCode = $request->RtnCode == 1?'已付款':'待付款'; //交易狀態
		$order->RtnMsg = $request->RtnMsg; //交易訊息
		$order->TradeNo = $request->TradeNo; //綠界的交易編號
		$order->TradeAmt = $request->TradeAmt; //交易金額
		$order->PaymentDate = $request->PaymentDate; //付款時間
		$order->PaymentType = $request->PaymentType; //付款方式

		$order->BankCode = $request->BankCode; //付款時間
		$order->vAccount = $request->vAccount; //付款方式
		$order->ExpireDate = $request->ExpireDate; //付款時間
		$order->save();
	
		$data = [
			'name' => $order->name,
			'email' => $order->email,
			'order_number' => $order->order_number,
			'payment_date' => $order->PaymentDate,
			'payment_type' => $order->payment,
			'payment_result' => $order->RtnCode,
			'merchant_trade' => $order->MerchantTradeNo,
			'total' => $order->TradeAmt
		];

		//return $order;
		$from = ['email'=> 'no-reply@farmertimex.com.tw',
			'name'=> '草菓農場 線上自動回覆',
			'subject'=>'訂單編號：'.$order->order_number.'付款狀態確認通知'
		];
		//填寫收信人信箱
		$to = ['email'=>$data['email'],'name'=>$data['name']];
		//信件的內容(即表單填寫的資料)
		//寄出信件
		$emails = Email::where('published', 1)->get();
	
		Mail::send('emails.checkout', $data, function($message) use ($from, $to ,$emails,$order) {
			$message->from($from['email'], $from['name']);
			foreach ($emails as $k => $v) {
                # code...
                $message->to($to['email'], $to['name'])->cc($v->email, $v->name)->subject('訂單編號：'.$order->order_number.'付款狀態確認通知');
            }
			//$message->to($to['email'], $to['name'])->cc($from['email'])->subject('感謝您 使用金錦町 JIN JIN DING線上訂購優質商品');
		});
		
		return '1|OK';
	}

	

	public function allPayReturn(Request $request){

		//return '1|OK';
		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');
		$common = new CommonController;
        $nav = $common->common(); 
		//$social = Social::where('published', 1)->orderBy('sort', 'asc')->get();
		//$footer_post = Post::where('published', 1)->with('category')->orderBy('published_at','desc')->take(5)->skip(0)->get();
		
		$order = Session::get('order'); 
	
		$order = Order::where('order_number', $order['order_number'])->first();
		if (!Auth::check()) {
			User::create([
				'published' => 1,
				'name' => $order->name,
				'email' => strtolower($order->email),
				'password' => bcrypt($order->phone),
				'gender' => $order->gender,
				'phone' => $order->phone,
				'city' => $order->city,
				'dist' => $order->dist,
				'zip' => $order->zip,
				'address' => $order->address,
				'token_exptime' => time()+60*60*24,
				'token' => md5($order->email.$order->phone),
				//'line' => $data['line'],
			]);
			Auth::attempt(['email' => $order->email, 'password' => $order->phone, 'published' => 1]);
			$user = Auth::user();
			$user = User::find($user->id);
			$order->user_id = $user->id;
		}
		

		$order->MerchantTradeNo = $request->MerchantTradeNo; //特店交易編號
		$order->RtnCode = $request->RtnCode == 1?'刷卡成功':'刷卡失敗'; //交易狀態
		$order->RtnMsg = $request->RtnMsg; //交易訊息
		$order->TradeNo = $request->TradeNo; //綠界的交易編號
		$order->TradeAmt = $request->TradeAmt; //交易金額
		$order->PaymentDate = $request->PaymentDate; //付款時間
		$order->PaymentType = $request->payment; //付款方式
		
		$order->save();
		
		
		

		$data = [
			'name' => $order->name,
			'email' => $order->email,
			'order_number' => $order->order_number,
			'payment_date' => $order->PaymentDate,
			'payment_type' => $order->PaymentType,
			'payment_result' => $order->RtnCode,
			'merchant_trade' => $order->MerchantTradeNo,
			'total' => $order->TradeAmt
		];
	
			
				//return $order;	

		$from = ['email'=> 'no-reply@farmertimex.com.tw',
			'name'=> '草菓農場 線上自動回覆',
			'subject'=>'訂單編號：'.$order->order_number.'付款狀態確認通知'
		];
		//填寫收信人信箱
		$to = ['email'=>$data['email'],'name'=>$data['name']];
		//信件的內容(即表單填寫的資料)
		//寄出信件
		//$emails = Email::where('published', 1)->get();
	
		//Mail::send('emails.checkout', $data, function($message) use ($from, $to ,$emails,$order) {
		//	$message->from($from['email'], $from['name']);
		//	foreach ($emails as $k => $v) {
                # code...
        //        $message->to($to['email'], $to['name'])->cc($v->email, $v->name)->subject('訂單編號：'.$order->order_number.'付款狀態確認通知');
       //     }
			//$message->to($to['email'], $to['name'])->cc($from['email'])->subject('感謝您 使用金錦町 JIN JIN DING線上訂購優質商品');
		//});
	
		
		Session::forget('bill');
		Session::forget('cart');
		Session::forget('order');

		
        return view('front.shop.complete',
            [
                'nav' => $nav,
				
				'order' => $order
            ]

        );
	}


	public function showTPayForm(){
		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');
		$common = new CommonController;
        $nav = $common->common(); 
		
		$user = Auth::user();
		if($user)$user->category = UserCategory::find($user->category_id);

	
        //$cart = Session::get('cart'); 
		//$bill = Session::get('bill'); 
        return view('front.shop.tpay',
            [
				'nav' => $nav,
				
				//'cart' => $cart, 
				
				
            ]

        );
	}

	public function showTPayCheckForm(){
		
		sleep(3);
		return redirect('complete');
	}

	
	


	public function laterRegister(Request $request){
		Session::put('later', true);
		return redirect('cart');
		
	}

	public function addToCart(Request $request){
		
		//return $request->size;
		$has = false; 
		//$data = ProductSpec::with(['product'=> function($query){
		//	$query->with('category');
		//}])->where('id', $request->size)->first();
		$data = Product::find($request->size);
		$cart = Session::has('cart')?Session::get('cart'):[]; //確認資料

		foreach ($cart as $k => $v) { 
			if ($v['id'] == $data['id']) { 
				$cart[$k]['qty'] = $request->qty; 
				//$cart[$k]['content_detail'] = isset($request->content_detail)?$request->content_detail:null; 
				$has = true; 
			}
		} 
		if (!$has) { 
			$data->qty = $request->qty;
			$cart[] = $data; 
			Session::put('cart', $cart);
		} 
		
		//計算金額
		//$total = $plugin->total($cart);
		$status = 'done';
		$msg = '已加入購物車';
		//return back()->with($status, $msg);
		
		return array(
			'count' => count(Session::get('cart')),
			'notice' => '已加入購物車',
			'reload' => 'cart'
		);
        
	}

	//STEP-1
	public function showCartForm(Request $request){

		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');

		if(!Auth::check()){
			if(!Session::has('later'))return redirect('login');
		}

		$common = new CommonController;
        $nav = $common->common(); 
		//$maybe = Product::where('published', 1)->where('home_show', 1)->orderBy('publish_at', 'desc')->get();
		$ships = ShipCategory::where('published', 1)->with('ships')->orderBy('sort', 'asc')->get();
		//$ship_special = Ship::where('published', 1)->where('category_id', 2)->orderBy('condition', 'asc')->get();
		//return $ship;
		$order = Session::get('order');
		$plugin = new CartPluginController;
		if(isset($order['discount'])){
			$bill = $plugin->total(Session::get('cart'),$order['discount']); 
		}else{
			$bill = $plugin->total(Session::get('cart')); 
		}
		
		$cart = Session::get('cart');
		$products = Product::inRandomOrder()->where('published', 1)->with('category')->skip(0)->take(9)->get();
		//return $bill;
        return view('front.shop.cart',
            [
				'nav' => $nav,
				'order' => $order,
				'bill' => $bill,
				'cart' => $cart,
				'ships' => $ships,
				'products' => $products,
				
            ]

        );
	}

	//STEP-1-1
	public function checkCart(Request $request){

		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');
		
		$cart = Session::get('cart'); 
		$qty = 0;	
		
		foreach ($cart as $k => $v) { 
			$qty = $request->qty[$k] ? $request->qty[$k] : 1;
			$qty = $request->qty[$k] < 1 ? 1 : $qty;
			$qty = $request->qty[$k] > $v->max ? $v->max : $qty;
			$cart[$k]->qty = $qty; 
		}
		$order = Session::has('order')?Session::get('order'):[];
		$order['cart'] = $cart;
		$order['discount'] = isset($order['discount'])?$order['discount']:'';
		//確認運送
	
		if(isset($request->coupon) && isset($request->discount)){
			$dt = date('Y-m-d');
			$discount = Coupon::where('published',1)
			->where('code',$request->coupon)
			->where('start_on','<=',$dt)
			->where('end_on','>=',$dt)
			->first();

			if(!$discount)return redirect('cart')->with('status', '查無此優惠代碼或已經過期')->with('code',$request->coupon);
			$order['discount'] = $discount;
			Session::put('order', $order);
			return redirect('cart')->with('status', '已使用'.$discount->name)->with('code',$request->coupon)->with('checked','ok');
		}
		
		$ship = ShipCategory::find($request->ship);
		$order['ship'] = $ship;
		
		Session::put('order', $order);
		Session::put('cart', $cart);
		return redirect('payment');
	
		
	}

	//STEP-2
	public function showPaymentForm(){
		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');

		if(!Auth::check()){
			if(!Session::has('later'))return redirect('login');
		}

		$common = new CommonController;
        $nav = $common->common(); 
		
		$user = Auth::user();
		//if($user)$user->category = UserCategory::find($user->category_id);
		//return $user;
		$plugin = new CartPluginController;
		
		$order = Session::get('order');
		$bill = $plugin->total(Session::get('cart'),null,$order['ship']);
		if(isset($order['discount'])){
			$plugin = new CartPluginController;
			$bill = $plugin->total(Session::get('cart'),$order['discount'],$order['ship']); 
		}
		
		$order['bill'] = Session::get('bill');
		
		Session::put('order',$order);
	
		
        return view('front.shop.payment',
            [
				'nav' => $nav,
				'user' => $user,
				//'cart' => $cart, 
				
				
            ]

        );
    }

	//STEP-2-1
	public function checkDelivery(Request $request){
		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');

		$user = User::where('email', $request->email)->first();
		if($user && !Auth::check()){
			$msg = '此信箱已經註冊,煩請先登入會員帳號即可享有會員優惠';
			Session::forget('later');
			return redirect('login')->with('error', $msg);
		}

		$order = Session::get('order'); 
		$plugin = new CartPluginController;
		$order['order_number'] = isset($order['order_number'])?$order['order_number']:'';
		$order['order_number'] = $order['order_number']?$order['order_number']:$plugin->orderNumber();
		$order['payment'] = $request->payment;

		$order['email'] = $request->email;
		$order['name'] = $request->name;
		$order['gender'] = $request->gender;
		$order['city'] = $request->city;
		$order['dist'] = $request->dist;
		$order['zip'] = $request->zip;
		$order['address'] = $request->address;
		$order['phone'] = $request->phone;

		$order['to_email'] = $request->to_email;
		$order['to_name'] = $request->to_name;
		$order['to_gender'] = $request->to_gender;
		$order['to_phone'] = $request->to_phone;
		$order['to_city'] = $request->to_city;
		$order['to_dist'] = $request->to_dist;
		$order['to_zip'] = $request->to_zip;
		$order['to_address'] = $request->to_address;
		$order['ship_time'] = $request->ship_time; 
		$order['remark'] = strip_tags($request->remark)?strip_tags($request->remark):'無'; 

		//$order['remark'] = preg_match("/['.,:;*?~`!@#$%^&+=)(<>{}]|]|[|/|\|||/",$request->remark);
		Session::put('order', $order);
		return redirect('checkout');
	}

	//STEP-3
	public function showCheckoutForm(){
		
		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('products');

		if(!Auth::check()){
			if(!Session::has('later'))return redirect('login');
		}

		$common = new CommonController;
		$nav = $common->common();
		
		$order = Session::get('order');
		
		$bill = Session::get('bill'); 
		$cart = Session::get('cart');
		
		
        return view('front.shop.checkout',
            [
                'nav' => $nav,
				'bill' => $bill,
				'cart' => $cart, 
				'order' => $order,
			
            ]

        );
	}
	
	//STEP-3-1
	public function checkCheckout(){
		$order = Session::get('order');
		$plugin = new CartPluginController;
		$order['merchant_trade'] = "JID".time();
		//return $order;
		$order['order_number'] = $order['order_number']?$order['order_number']:$plugin->orderNumber();
	
		$user = Auth::user();
		$data = Order::where('order_number', $order['order_number'])->first();
		$data = $data?$data:new Order;
		$data->order_date = date('Y/m/d H:i:s'); //訂單日期
		$data->order_number	= $order['order_number'];//訂單編號
		$data->payment = $order['payment'];//備註
		$data->user_id = Auth::check()?$user->id:0;	//會員ID
		$data->name = $order['name'];	//姓名
		$data->gender = $order['gender'];//稱謂
		$data->email = $order['email'];//email
		
		$data->phone = $order['phone'];//手機
		$data->address = $order['address'];//地址
		$data->to_name = $order['to_name'];//收件姓名
		$data->to_gender= $order['to_gender'];//;收件稱謂
		$data->to_email = $order['to_email'];//收件email
	
		$data->to_phone = $order['to_phone'];//收件手機
		$data->to_address = $order['to_address'];//收件地址
		
		
		$data->remark = $order['remark'];//備註
		$data->ship = $order['ship']['name'];//收件時間
		$data->ship_id = $order['ship']['id'];//收件時間
		
		$data->ship_time = $order['ship_time'];//收件時間
		//if(isset($order['discount']))$data->coupon = $order['discount']['code'];//折扣金額
		$data->discount = $order['bill']['discount'];//折扣金額
		$data->PaymentType = $order['payment'];//付款方式
		$data->RtnCode = '待付款';
		$data->subtotal = $order['bill']['subtotal'];//小計
		$data->freight = $order['bill']['freight'];//運費
		//$data->shipping_fee_temp = $order['bill']['freight_special'];//常溫運費
		$data->total = $order['bill']['total'];//總計
		$data->MerchantTradeNo = $order['merchant_trade'];
		
		$data->save();
		
		foreach ($order['cart'] as $k => $v) {
			$detail = OrderDetail::where('product_id',$v['id'])->where('order_id',$data->id)->first();
			$detail = $detail?$detail:new OrderDetail;
			$detail->published = 1;
			$detail->category_id = $v['category_id'];
			$detail->order_date = $data->order_date;
			$detail->order_id = $data->id;
			$detail->product_id = $v['id'];
			//$detail->spec_id = $v['id'];
			$detail->cover = $v['cover'];
			$detail->name = $v['name'];
			$detail->selling = $v['selling'];
			$detail->qty = $v['qty'];
			$detail->total = $v['total'];
			//$detail->detail = isset($v['content_detail'])?json_encode($v['content_detail']):null;
			$detail->save();
		}
		Session::put('order', $order);
		
	
		$from = ['email'=> 'no-reply@farmertimex.com.tw',
					'name'=> '草菓農場 線上自動回覆',
					'subject'=>'感謝您 使用草菓農場線上訂購優質商品'
				];
			
				//return $order;	
				
		//填寫收信人信箱
		$to = ['email'=>$data['email'],'name'=>$data['name']];
		//信件的內容(即表單填寫的資料)
		//寄出信件
		//$emails = Email::where('published', 1)->get();
		
	
		//Mail::send('emails.order', $order, function($message) use ($from, $to, $emails) {
		//	$message->from($from['email'], $from['name']);
		//	foreach ($emails as $k => $v) {
				# code...
		//		$message->to($to['email'], $to['name'])->cc($v->email, $v->name)->subject('感謝您 使用草菓農場線上訂購優質商品');
		//	}
			//$message->to($to['email'], $to['name'])->cc($from['email'])->subject('感謝您 使用草菓農場線上訂購優質商品');
		//});

		if($order['payment'] == '信用卡'){
			return new CreateOrder(); 
		}elseif($order['payment'] == 'tPay'){
			return redirect('tPay');
		}else{
			return redirect('complete');
		}
	}

	/*
	public function showDeliveryForm(){
		if(!Session::has('cart') || count(Session::get('cart')) < 1 )
		return redirect('product');
		$common = new CommonController;
        $nav = $common->common(); 
		
		//$product_categories = ProductCategory::where('published', 1)->orderBy('sort', 'asc')->get();
		$plugin = new CartPluginController;
		$bill = $plugin->total(Session::get('cart')); 
		$cart = Session::get('cart');
		$order = session::get('order');
		//付款方式
		$order['PaymentType'] = isset($_GET['PaymentType'])?$_GET['PaymentType']:'信用卡';
		Session::put('order', $order);
		//if (Auth::check()) {
			// 這個使用者已經登入...
			$user = Auth::user();
		//	$order['to_name'] = isset($order['to_name'])?$order['to_name']:$user->name;
		//	$order['to_address'] = isset($order['to_address'])?$order['to_address']:$user->address;
		//	$order['to_tel'] = isset($order['to_tel'])?$order['to_tel']:$user->phone;
		//	$order['to_phone'] = isset($order['to_phone'])?$order['to_phone']:$user->phone;
		//	$order['to_email'] = isset($order['to_email'])?$order['to_email']:$user->email;
		//}else{
			$order['tel'] = isset($order['tel'])?$order['tel']:'';
			$order['address'] = isset($order['address'])?$order['address']:'';
			$order['to_name'] = isset($order['to_name'])?$order['to_name']:'';
			$order['to_address'] = isset($order['to_address'])?$order['to_address']:'';
			$order['to_tel'] = isset($order['to_tel'])?$order['to_tel']:'';
			$order['to_phone'] = isset($order['to_phone'])?$order['to_phone']:'';
			$order['to_email'] = isset($order['to_email'])?$order['to_email']:'';
			
		//}
		//$bonus = Bonus::with('order')->where('published',1)->where('user_id',$user->id)->orderBy('published_at','desc')->get();
		
		//$total = 0;
        //foreach ($bonus as $k => $v) {
            # code...
        //    $total = $total + $v->get_bonus - $v->use_bonus;
        //}
		
		
		 
	
		//$order['bonus'] = $total;
		//Session::put('order',$order);
		//return $order;
        return view('front.shop.delivery',
            [
				'meta' => $meta,
				'social' => $social,
				'order' => $order,
				'cart' => $cart, 
				'bill' => $bill,
				'user' => $user
            ]
        );
    }
	*/

	public function removeToCart(Request $request){

		$cart = Session::get('cart');  
		foreach ($cart as $k => $v) {
			# code...
			if($request->id == $v->id)unset($cart[$k]);
		}
		$cart = array_values($cart);
		Session::put('cart', $cart);  
		$cart = Session::get('cart');  
		
		return array(
			'count' => count(Session::get('cart')),
			'notice' => '已加入購物車',
			'reload' => 'cart'
		);
	}
	

	
	
	//step2
	

	public function getCVSmap($store){
		switch ($store) {

				case 'uni':
				# code...
					return new \App\Http\Controllers\AioSDK\UniCvsMap;
				break;
			
			default:
					return new \App\Http\Controllers\AioSDK\FamiCvsMap;
				break;
		}
		
		//return $order;
	}

	public function ServerReplyURL(Request $request){
		
		$order = Session::get('order');
		$order['LogisticsSubType'] = $request->LogisticsSubType;
		$order['CVSStoreID'] = $request->CVSStoreID;
		$order['CVSStoreName'] = $request->CVSStoreName;
		$order['CVSAddress'] = $request->CVSAddress;
		$order['CVSTelephone'] = $request->CVSTelephone;
		Session::put('order',$order);
		return redirect('delivery');
		//return $order;
	}

	//step3

	protected function validator(array $data)
    {
        $messages = [
            'email.email' => '電子郵件格式錯誤',
            'email.unique' => '此電子郵件帳戶已經註冊,請先登入結帳即可享有會員價格',
            
        ];
        
        return Validator::make($data, [
           
            'email' => 'required|email|max:255|unique:users',
            //'agree' => 'required',
        ],$messages);
    }

}
