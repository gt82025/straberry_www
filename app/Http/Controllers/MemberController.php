<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\UserCategory;
use Session;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Model\Meta;
use App\Model\Order;
use App\Model\Social;
use App\Model\BookCategory;
use App\Model\BookDetail;
use App\Model\Book;
use Crypt;
use Mail;

class MemberController extends Controller
{
    //protected $redirectTo = '/';
    //protected $redirectTo = '/member';
    //protected $guard = 'user';
    //protected $redirectPath = 'member';
    public function showBookingRecordForm(){
		$common = new CommonController;
        $nav = $common->common();  
        $user = Auth::user();
        $booking = BookDetail::where('published', 1)->where('email', $user->email)->orderBy('date', 'asc')->get();
      
		return view('front.member.booking',
        	[
				'nav' => $nav,
				'booking' => $booking,
				'user' => $user,
        	]
        ); 
    }

    public function showBookingRecordDetailForm($id){
		$common = new CommonController;
        $nav = $common->common();  
        $user = Auth::user();
        $booking = BookDetail::where('published', 1)->where('id', $id)->with('category')->first();
    
        if($booking->email != $user->email)return redirect('member');


		return view('front.member.bookingdetail',
        	[
				'nav' => $nav,
				'booking' => $booking,
				'user' => $user,
        	]
        ); 
    }


    public function showRegisterForm(){
        $common = new CommonController;
        $nav = $common->common(); 
        
        return view('front.member.register',
        	[
                'nav' => $nav,
                
        	]

        );
    }

    public function register(Request $request)
    {   
        
        //return $request->all();
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        
        //註冊
        //$request['address'] = 
        $store = $this->create($request->all());
        //$category = UserCategory::find(1);
        /*
        if($category->bonus_register > 0) {
            $bonus = new Bonus;
            $bonus->published_at = date('Y/m/d H:i:s');
            $bonus->user_id = $store->id;
            $bonus->intro = '會員註冊紅利回饋'.$category->bonus_register.'點';
            $bonus->get_bonus = $category->bonus_register;
            $bonus->save();
        }
        -*/
        //return $store;
        //註冊後登入
        
        //Auth::guard($this->getGuard())->login($store);
        Auth::attempt(['email' => $store->email, 'password' => $request->password, 'published' => 1]);
        //$data = [
        //    'name'=>$store->name,
         //   'email'=>$store->email,
            //'token' => $store->token,
         //   'created_at' => $store->created_at
        //];
        //$from = ['email'=>env('WEBSITE_MAIL'),
        //'name'=>env('WEBSITE_NAME').'線上客服',
        //         'subject'=>'會員註冊確認信'
        //];
        //填寫收信人信箱
        //$to = ['email'=>$store->email,'name'=>$store->name];
        //信件的內容(即表單填寫的資料)
        
        //寄出信件
        //if($store->id)
        //Mail::send('emails.register', $data, function($message) use ($from, $to) {
        //     $message->from($from['email'], $from['name']);
        //    $message->to($to['email'], $to['name'])->subject('會員註冊確認信');
        //});

   

        //return redirect($this->redirectPath());
        //註冊完成後代入flash session
        //return redirect('/verification')->with('status', '註冊已完成,煩請至註冊信箱開通驗證碼');;
        return redirect('/member')->with('status', '註冊已完成');;
    }

    protected function validator(array $data)
    {
        $messages = [
            'email.email' => '電子郵件格式錯誤',
            'email.unique' => '此電子郵件帳戶已經註冊',
            //'password.confirmed' => '與原始密碼不符',
            'password.required' => '密碼為必填欄位',
			'password.min' => '密碼長度不足八碼',
            'phone.required' => '手機為必填欄位',
            //'agree.required' => '了解並同意我們的個資保護聲明。',
        ];
        
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'phone' => 'required',
            //'agree' => 'required',
        ],$messages);
    }

    protected function create(array $data)
    {
        return User::create([
            'published' => 1,
            'name' => $data['name'],
            'email' => strtolower($data['email']),
            'password' => bcrypt($data['password']),
            'gender' => $data['gender'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'dist' => $data['dist'],
            'zip' => $data['zip'],
            'address' => $data['address'],
            'token_exptime' => time()+60*60*24,
            'token' => md5($data['email'].$data['password']),
            //'line' => $data['line'],
        ]);
    }

    public function showRecordForm(){
        //$meta = Meta::find(1);
        $user = Auth::user();
        $orders = Order::with('category')->where('published', 1)->where('user_id',$user->id)->orderBy('order_date','desc')->paginate(20);
    
        $orders->setPath('records');
        
        $common = new CommonController;
        $nav = $common->common(); 
      
        return view('front.member.record',
        	[
                'nav' => $nav,
                'orders' => $orders,
                'user' => $user,
        	]

        );
        //return $orders;
    }

    public function showRecordDetailForm($id){
        $common = new CommonController;
        $nav = $common->common(); 
        $order = Order::with(['category','detail' => function($query){
            $query->with('product');
        }])->where('id',$id)->first();
      

       
        return view('front.member.detail',
        	[
                'nav' => $nav,
                'order' => $order,
        	]

        );
        //return $orders;
    }

	public function forget(Request $request){
        $user = User::where('email', $request->email)->first();
		$msg = $user?'煩請至註冊信箱 "'.$request->email.'" 收取新的密碼':'查無 "'.$request->email.'" 的相關資料';
		
		if($user){
			
			$newpassword =  md5(strtotime($user->created_at) + strtotime(date("Y-m-d H:i:s")));
			$newpassword =  substr(Crypt::encrypt($user->password), 12, 8);
			$user->password =  bcrypt($newpassword);
			$user->save();
			//return $user->password;
			$data = [
				'name'=>$user->name,
				'email'=>$user->email,
				'password' => $newpassword,
			];
			
           $from = ['email'=>'no-reply@farmertimex.com.tw',
				'name'=>'草菓農場線上客服',
                 'subject'=>'會員密碼重製通知信'
                ];
			
			//填寫收信人信箱
			$to = ['email'=>$user->email,'name'=>$user->name];
			//信件的內容(即表單填寫的資料)
			
			//寄出信件
        
			Mail::send('emails.forget', $data, function($message) use ($from, $to) {
				$message->from($from['email'], $from['name']);
				$message->to($to['email'], $to['name'])->subject($from['subject']);
            });
        
            return redirect('login')->with('error', $msg);
        }
        //$msg = $user?'密碼輸入錯誤':'查無此帳號或尚未開通';
        //$status = 'error';
		return redirect('forget')->with('error', $msg);
        
    }
	
	public function showResetForm(){
	
        $meta = Meta::find(1);
        //$footer_post = Post::where('published', 1)->with('category')->orderBy('published_at','desc')->take(5)->skip(0)->get();
        $product_categories = ProductCategory::where('published', 1)->orderBy('sort', 'asc')->get();
        return view('front.member.reset',
            [
                'meta' => $meta,
                'product_categories' => $product_categories,
            ]

        );
    }
	
	public function showResendForm(){
	
        $meta = Meta::find(1);
        $footer_post = Post::where('published', 1)->with('category')->orderBy('published_at','desc')->take(5)->skip(0)->get();
        return view('front.member.resend',
            [
                'meta' => $meta,
                'footer_post' => $footer_post,
            ]

        );
    }
	
	
    
    
	
	public function reset(Request $request){
        $validator = $this->resetValidator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = Auth::user();
        //$userNew = User::where('email', $_GET['email'])->first();
        $user = User::find($user->id);
        $user->password = bcrypt($request->password);
        $user->save();
		Auth::logout();
        return redirect('login')->with('status', '密碼變更成功,請重新登入');
        //$user = Auth::user();

        //return view('front.member.member',
        //    [
        //        'meta' => $meta,
        //        'user' => $user
        //    ]
        //);
    }

    public function member(Request $request){
        $validator = $this->memberValidator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $user = Auth::user();

        //$userNew = User::where('email', $_GET['email'])->first();
        $user = User::find($user->id);
        //$user->email = $request->email?$request->email:$user->email;
        if($request->password)
        $user->password = bcrypt($request->password);

        $user->name = $request->name;
        $user->phone = $request->phone;
        //$user->birthday = $request->birthday;
        $user->gender = $request->gender;
        $user->address = $request->address;
        //$user->line = $request->line;
        //$user->line_id = $request->line_id;
        $user->save();
		//Auth::logout();
        return redirect('member')->with('success', '會員資料已變更儲存成功');
        //$user = Auth::user();

        //return view('front.member.member',
        //    [
        //        'meta' => $meta,
        //        'user' => $user
        //    ]
        //);
    }

	public function showMemberForm(){
        $common = new CommonController;
        $nav = $common->common(); 
        $user = Auth::user();

        if($user->city)
        $user->address = $user->zip.$user->city.$user->dist.$user->address;
        /*
        $orders = Order::with(['category','detail' => function($query){
			$query->with(['product' => function($query2){
                $query2->with('category');
            },'spec']);
        }])->where('published', 1)->where('user_id',$user->id)->orderBy('order_date','desc')->get();
        */
        //return $orders;
        return view('front.member.member',
            [
                'nav' => $nav,
                'user' => $user
            ]
        );
    }

    public function showMembersForm(){
     
		Session::forget('bill');
		Session::forget('cart');
        Session::forget('order');
        return redirect('member');
    }

    public function showLoginForm(){
     
        if (Auth::check())
        {
            return redirect('member');
        }
        $common = new CommonController;
        $nav = $common->common(); 
        return view('front.member.login',
            [
                'nav' => $nav,
                //'social' => $social,
            ]

        );
    }

    public function showForgetForm(){
      
        $common = new CommonController;
        $nav = $common->common(); 
        return view('front.member.forget',
            [
                'nav' => $nav,
            ]

        );
    }

    public function showLogin2Form(){
     
        if (Auth::check())
        {
            return redirect('cart');
        }

      

        $meta = Meta::find(1);
        $product_categories = ProductCategory::where('published', 1)->orderBy('sort', 'asc')->get();
           //$footer_post = Post::where('published', 1)->with('category')->orderBy('published_at','desc')->take(5)->skip(0)->get();
        return view('front.member.login2',
            [
                'meta' => $meta,
                'product_categories' => $product_categories,
            ]

        );
    }

    public function login(Request $request){
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'published' => 1]))
        {
			$user = Auth::user();
			$user = User::find($user->id);
			$user->last_login_at = date('Y/m/d H:i:s');
			$user->last_login_ip = \Request::ip();
			
            $user->save();
            if(Session::has('cart') || count(Session::get('cart')) > 1 )
            return redirect('cart');
            
            return redirect()->intended('member');
        }else{
            $user = User::where('email', $request->email)->where('published', 1)->first();
            $msg = $user?'密碼輸入錯誤':'查無此帳號或尚未開通';
			$status = 'error';
           
            return redirect('login')->with($status, $msg);  
        }
    }

    public function login2(Request $request){
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'published' => 1]))
        {
			$user = Auth::user();
			$user = User::find($user->id);
			$user->last_login_at = date('Y/m/d H:i:s');
			$user->last_login_ip = \Request::ip();
			
			$user->save();
            return redirect()->intended('cart');
        }else{
            $user = User::where('email', $request->email)->where('published', 1)->first();
            $msg = $user?'密碼輸入錯誤':'查無此帳號或尚未開通';
			$status = 'error';
           
            return redirect('checkoutLogin')->with($status, $msg);  
        }
    }

    public function logout(){
        $user = Auth::user();
		$user = User::find($user->id);
		$user->last_logout_at = date('Y/m/d H:i:s');
		$user->save();
		
        Auth::logout();
        return redirect('login')->with('done', '會員帳號"'.$user->email.'"已登出');  ;
    }

	
	
	public function registerDone(Request $request){
        $meta = Meta::find(1);

        return view('front.member.verification',
            [
                'meta' => $meta
            ]

        );
    }

    

    protected function resetValidator(array $data)
    {
        $messages = [
            'password.confirmed' => '與新密碼不符',
            'password.required' => '密碼為必填欄位',
			'password.min' => '密碼長度不足八碼'
        ];
        
        return Validator::make($data, [
            'password' => 'required|min:8|confirmed',
        ],$messages);
    }
	
	protected function memberValidator(array $data)
    {
        $messages = [
            'name.required' => '姓名為必填欄位',
            //'birthday.date' => '日期格式錯誤',
            'phone.required' => '手機為必填欄位',
            'address.required' => '地址為必填欄位',
        ];
        
        return Validator::make($data, [
            'name' => 'required|max:255',
            //'birthday' => 'date',
            'phone' => 'required',
            'address' => 'required',
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    

}
