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
use App\Model\PostCategory;
use App\Model\Post;
use App\Model\Product;
use App\Model\ProductCategory;
use App\Model\Contact;
use App\Model\Banner;
use App\Model\Social;
use App\Model\Email;
use App\Model\User;
use Excel;
use PHPExcel_Worksheet_Drawing;
//use App\Task;

class HomeController extends Controller
{
    public function excel(){
        //Excel::import(new User, 'dist/farm.xls');
        $filePath = 'dist/'.iconv('UTF-8', 'GBK', 'farm').'.xls';
        
        $result = Excel::load($filePath, function($reader) {
            $reader->all();
            
        })->get();
        $result = json_encode($result); 
        $result = json_decode($result); 
        foreach($result as $k => $v) {
            $result[$k]->password = explode('@',$v->email);
            $result[$k]->password = $result[$k]->password[0];
            /*
            User::create([
				'published' => 1,
				'name' => $v->name,
				'email' => strtolower($v->email),
				'password' => bcrypt($result[$k]->password),
				'gender' => $v->gender,
				'phone' => $v->phone,
				'address' => $v->address,
				'token_exptime' => time()+60*60*24,
				'token' => md5($v->email.$v->phone),
				//'line' => $data['line'],
            ]);
           
            */
        }
        return $result;
        
    }

    public function showEbook(){
        $meta = Meta::find(1);

        return view('front.ebook',
        	[
        		'meta' => $meta,     
        	]

        );
    }

    public function about(){
        $common = new CommonController;
        $nav = $common->common();  
        return view('front.about',
        	[
        		'nav' => $nav,
        	]
        );
    }

    public function showHowForm(){
        $common = new CommonController;
        $nav = $common->common();  
        return view('front.how',
        	[
        		'nav' => $nav,
        	]
        );
    }

    public function showPayForm(){
        $common = new CommonController;
        $nav = $common->common();  
        return view('front.pay',
        	[
        		'nav' => $nav,
        	]
        );
    }

    public function showReturnForm(){
        $common = new CommonController;
        $nav = $common->common();  
        return view('front.return',
        	[
        		'nav' => $nav,
        	]
        );
    }

    public function showQaForm(){
        $common = new CommonController;
        $nav = $common->common();  
        return view('front.qa',
        	[
        		'nav' => $nav,
        	]
        );
    }

    public function showPrivacyForm(){
        $common = new CommonController;
        $nav = $common->common();  
        return view('front.privacy',
        	[
        		'nav' => $nav,
        	]
        );
    }

    public function showTermsForm(){
        $common = new CommonController;
        $nav = $common->common();  
        return view('front.terms',
        	[
        		'nav' => $nav,
        	]
        );
    }
   

    public function defaults(){
        //Session::put('default', 'skip');
        //$common = new CommonController;
       //$nav = $common->common();  

        return view('layouts.default',
        	[
        		//'nav' => $nav,
        	]

        );
    }
    
    
    public function index(){
        //if(!Session::has('default'))
        //return redirect('default');
        //return  Session::get('cart'); //確認資料
        $common = new CommonController;
        $nav = $common->common();  
        $banner = Banner::where('published', 1)->where('publish_at', '<=', date('Y-m-d'))->orderBy('publish_at', 'desc')->get();
        
        $category = ProductCategory::where('published', 1)->where('home_show', 1)->with(['product' => function($query){
          	$query->where('published', 1)->where('home_show', 1)->orderBy('sort','asc');
        }])->orderBy('sort', 'asc')->skip(0)->take(2)->get();
        
        $sales = Product::where('published', 1)->where('home_show', 1)->where('on_sale', 1)->with('category')->orderBy('sort', 'desc')->get();
        //return $sales;
        //$product = Product::where('published', 1)->where('home_show', 1)->with(['category','spec' => function($query){
		//	$query->where('published', 1)->orderBy('sort','asc');
        //}])->orderBy('publish_at', 'desc')->get();
        $posts = PostCategory::where('published', 1)->with(['post' => function($query){
            $query->where('published', 1)->where('publish_at', '<=', date('Y-m-d'))->orderBy('publish_at','desc');
        }])->orderBy('sort', 'asc')->skip(0)->take(2)->get();
        //foreach ($posts as $k => $v) {
            # code...
        //    $posts[$k]->content =  mb_substr(strip_tags($v->content), 0, 58, 'UTF-8').'...';
        //}
        //return $nav;

        return view('front.index',
        	[
        		'nav' => $nav,
                'banner' => $banner,
                'category' => $category,
                'sales' => $sales,
                'posts' => $posts,

        	]

        );
    }

    public function showContactForm(){
        $common = new CommonController;
        $nav = $common->common();  
       
        return view('front.contact',
        	[
        		'nav' => $nav,
                //'social' => $social,
        	]

        );
    }

    public function showNoticeForm(){
        $common = new CommonController;
        $nav = $common->common();  
       
        return view('front.notice',
        	[
        		'nav' => $nav,
                //'social' => $social,
        	]

        );
    }

    public function showContractForm(){
        $common = new CommonController;
        $nav = $common->common();  
       
        return view('front.contract',
        	[
        		'nav' => $nav,
                //'social' => $social,
        	]

        );
    }

    public function showPolicyForm(){
        $common = new CommonController;
        $nav = $common->common();  
       
        return view('front.policy',
        	[
        		'nav' => $nav,
                //'social' => $social,
        	]

        );
    }

    public function contact(Request $request){

        //if($request->code != $request->digi){
        //    return redirect('forget')->with('error', '驗證碼不正確');
        //}
        


        $data = new Contact;
        $data->send_time = date("Y-m-d h:i:s");
        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->subject = $request->subject;
        $data->title = $request->title;
        $data->message = $request->message?strip_tags($request->message):'無';
        $data->save();

        //$emails = Email::where('published', 1)->get();
       

		$result = [
			'send_time'=>$data->send_time,
            'name'=>$data->name,
            'gender'=>$data->gender,
            'email'=>$data->email,
			'phone'=>$data->phone,
            'subject'=>$data->subject,
            'title'=>$data->title,
			'msg'=>$data->message,
        ];
        
        $from = ['email'=>'farmertimex@farmertimex.com.tw',
			'name'=>'草菓農場 自動回覆',
			'subject'=>'聯絡我們 - 草莓園有機農場 '
		];

		//填寫收信人信箱
		$to = ['email'=>'linus73921@gmail.com','name'=>'草菓農場線上客服'];
		//信件的內容(即表單填寫的資料)
		
        //寄出信件
        /*
            foreach ($emails as $k => $v) {
                # code...
                $message->to($v->email, $v->name)->subject($from['subject']);
            }*/
        
        if($data->id)
		Mail::send('emails.contact', $result, function($message) use ($from, $to ) {
            $message->from($from['email'], $from['name']);
            $message->to($from['email'], $from['name'])->subject($from['subject']);
			
        });
        
        /*
        */
        $status = '感謝您的來信,我們將盡快請專員與您聯絡';
        return redirect('contact')->with('status', $status);
       
    }
}
