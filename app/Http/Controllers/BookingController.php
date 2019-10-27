<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;
//use App\Http\Controller;
use App\Http\Controllers\Controller;
use App\Model\Meta;
use App\Model\Social;
use App\Model\BookCategory;
use App\Model\BookDetail;
use App\Model\Book;
use Crypt;
use Mail;

//use App\Model\Tag;
//use App\Task;

class BookingController extends Controller
{   

	
	public function showBookingForm(){
		if (!Auth::check())return redirect('login/booking');

		$user = Auth::user();
		$common = new CommonController;
		$nav = $common->common();  
		$category = BookCategory::where('published', 1)->with('books')->orderBy('sort', 'asc')->get();
		$book = Book::where('published', 1)->where('opening', 1)->where('category_id', $category[0]->id)->orderBy('from_date', 'asc')->get();
		$disable = ''; 
		foreach ($book as $k => $v) {
			# code...
			if($k > 0)$disable .= ',';
			$disable .= "{from: '".$v->from_date."',to: '".$v->to_date."'}";
			
		}
		//$disable = implode(',',$disable);
		
		return view('front.booking.index',
        	[
				'nav' => $nav,
				'category' => $category,
				'user' => $user,
				'disable' => $disable,
        	]
        ); 
    }

	public function showCompleteForm(){
		$common = new CommonController;
		$nav = $common->common();  
		if(!Session::has('booking'))return redirect('booking');
		$booking = Session::get('booking'); 
		$google = BookCategory::find($booking->category_id);

		Session::forget('booking');
		return view('front.booking.inner',
        	[
				'nav' => $nav,
				'booking' => $booking,
				'map' => $google->map
        	]
        );  
    }

	public function disable($id){
		$book = Book::where('published', 1)->where('opening', 1)->where('category_id', $id)->orderBy('from_date', 'asc')->get();
		$disable = []; 
		//$disable = ''; 
		foreach ($book as $k => $v) {
			# code...
			//if($k==0) $disable .= '[';
			//if($k > 0)$disable .= ',';
			//$disable .= "{from: '".$v->from."',to: '".$v->to."'}";
			//if($k == count($book)-1) $disable .= ']';
			$data = array('from' => $v->from_date , 'to' => $v->to_date);
			array_push($disable,$data);
		}
		//$disable = implode(',',$disable);
		$disable = json_encode($disable);
		return $disable;
		
    }
	public function booking(Request $request){
		
		
		$disable = Book::where('published', 1)->
			where('category_id', $request->location)->
			where('opening', 1)->
			whereDate('from_date','<=', $request->datetime)->
			whereDate('to_date','>=', $request->datetime)->
			//where('date', $request->datetime)->
			first();
		
		if($disable)return redirect('booking')->with('error', '很抱歉,您所指定的日期目前無法預定')->withInput();
		

		$change = Book::where('published', 1)->
			where('category_id', $request->location)->
			whereDate('from_date','<=', $request->datetime)->
			whereDate('to_date','>=', $request->datetime)->
			//where('date', $request->datetime)->
			first();
		$date= $request->datetime;
		$location = BookCategory::where('id', $request->location)->first();
		if($change){
			$location->morning = $change->morning?$change->morning:$location->morning ;
			$location->afternoon = $change->afternoon?$change->afternoon:$location->afternoon ;
		}
		$detail = BookDetail::where('published', 1)->
			where('category_id', $request->location)->
			where('date', $request->datetime)->
			where('session', $request->session)->
			orderBy('id', 'asc')->get();
			
		$bookingNumber = 0;
		
		if($detail)
		foreach ($detail as $k => $v) {
			# code...
			$bookingNumber += $v->number;
		}
		$total = $bookingNumber+$request->number;
		if($request->session == '上午場 (AM09:00~PM12:00)'){
			if($total > $location->morning )return redirect('booking')->with('error', '很抱歉,您所預訂的人數已經超過該場次限制');
		}else{
			if($total > $location->afternoon )return redirect('booking')->with('error', '很抱歉,您所預訂的人數已經超過該場次限制');
		}

		$user = Auth::user();
		$data = new BookDetail;
		$data->published = 1;
		$data->category_id = $request->location;
		$data->location = $location->name;
		$data->date = $request->datetime;
		$data->session = $request->session;
		$data->email = $request->email;
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->number = $request->number;
		$data->remark = strip_tags($request->remark);
		$data->user_id = $user->id;
        $data->save();

        //$emails = Email::where('published', 1)->get();
       
		
		$result = [
			'location'=>$data->location,
            'date'=>$data->date,
            'session'=>$data->session,
            'email'=>$data->email,
			'name'=>$data->name,
            'phone'=>$data->phone,
            'number'=>$data->number,
			'remark'=>$data->remark,
        ];
        
        $from = ['email'=>'farmertimex@farmertimex.com.tw',
			'name'=>'草菓農場 自動回覆',
			'subject'=>'聯絡我們 - 草莓園有機農場 '
		];

		//填寫收信人信箱
		$to = ['email'=>$data->email,'name'=>'草菓農場 線上客服'];
		//信件的內容(即表單填寫的資料)
		
		//寄出信件
		/**/
		if($data->id)
		Mail::send('emails.booking', $result, function($message) use ($from, $to ) {
            $message->from($from['email'], $from['name']);
            $message->to($from['email'], $from['name'])->cc($to['email'], $from['name'])->subject($from['subject']);
			
		});
		
	
		Session::put('booking', $data);
        return redirect('booking/complete');
	
	}

	
	
}
