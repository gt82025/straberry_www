<?php

namespace App\Http\Controllers\Aida;

use Illuminate\Http\Request;
use DB;
//use App\Http\Controller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Aida\CommonController;
use App\Http\Controllers\Aida\ConfigController;
use App\Http\Controllers\Aida\ExtensionController;
use Excel;
use PHPExcel_Worksheet_Drawing;
use Mail;
//use App\Task;

class AppsController extends Controller
{   
    public function exportExcel(request $request,$model)
    {   
        //$request->id = 625;
        //$request->table = 'orders';
        //$request = $request->all()['form'];
        
        $id = isset($_GET['id'])?$_GET['id']:'';
        //$id = implode(',', $request['id']);   //接收要匯出的id
        //return $id;
        $datas = '\App\Model\\'.$model;
        $datas = new $datas;
        
         //搜尋要匯出的TABLE
        //需要的欄位內容
        //$request->table = 'Order';

        switch ($model) {
            case 'Order':
                if($id){
                    $query = $datas::with(['ship','category','detail' => function($querys){
                        $querys->with('spec')->get();
                    }])->whereIn('id', $id)
                    ->orderBy('id','desc')
                    ->get();
                }else{
                    $query = $datas::with(['ship','category','detail' => function($querys){
                        $querys->with('spec')->get();
                    }])->orderBy('id','desc')
                    ->get();

                }

                foreach ($query as $k => $v) {
                    # code...
                    switch ($v->ship_time) {
                        case '不指定':
                            # code...
                            $query[$k]->ship_time = 4;
                        break;
                        
                        case '下午13:00前':
                        # code...
                            $query[$k]->ship_time = 1;
                        break;

                        case '14時~18時(最晚配送時段)':
                        # code...
                            $query[$k]->ship_time = 2;
                        break;

                        default:
                            # code...
                            $query[$k]->ship_time = $v->ship_time;
                        break;
                    }
                    
                }

                Excel::create('訂單資訊管理',function ($excel) use ($query){
                    
                    $excel->sheet('A', function($sheet) use ($query){
                        //$sheet->rows($cellData);
                        $sheet->loadView('excel.order', ['cellData' => $query]);
                    });

                })->export('xlsx');


                //return $query;
                # code...
                break;
            
            default:
                if($id){
                    $query = $datas->whereIn('id', $id)
                    ->orderBy('id','desc')
                    ->get();

                }else{
                    $query = $datas->orderBy('id','desc')
                    ->get();

                }
                $option = \App\Model\OptionCategory::where('model','=', $model)->first();
                if($option){
                    $column = json_decode($option->column,true);
                }else{
                    $option = \App\Model\Option::where('model','=', $model)->first();
                    $column = json_decode($option->column,true);
                };
                $cellTitle = [];
                $cellData = [];
                //return $column;
                foreach ($column as $k => $v) {
                    # code...
                    array_push($cellTitle ,$v['title']);
                };
                array_push($cellData ,$cellTitle);

                foreach($query as $k => $v){
                    $data = [];
                    foreach ($column as $k2 => $v2) {
                        # code...
                        //return $v[$v2['field']];
                        array_push($data,$v[$v2['field']]);
                    }
                    array_push($cellData ,$data);
                }
                Excel::create($option->name,function ($excel) use ($cellData){
                    
                    $excel->sheet('A', function($sheet) use ($cellData){
                        $sheet->rows($cellData);
                        //$sheet->loadView('excel.orders', ['cellData' => $cellData]);
                    });

                })->export('xlsx');
                break;
        }
        

    }

	public function exportExcel2(){
        
        $orders = new \App\Model\Order;
        $orders = $orders::all();
      
        $cellData = [
            //['商品名稱','尺寸','數量']
        ];
        foreach ($orders as $k => $v) {
            # code...
          
            array_push($cellData,[
				$v->order_date,
				$v->order_number,
				$v->merchant_trade,
				$v->name,
				$v->email,
				$v->phone,
				$v->address,
			]);
            //array_push($cellData,
            //    ['<img src="'.$product[$k]->product->cover.'">',
            //    $product[$k]->color." / ".$product[$k]->size,
            //    $product[$k]->total->qty
            //]);
            
        }

        Excel::create('銷售紀錄',function ($excel) use ($cellData){
            
            $excel->sheet('Payments', function($sheet) use ($cellData){
				$sheet->rows($cellData);
                //$sheet->loadView('excel.orders', ['cellData' => $cellData]);
            });

        })->export('xlsx');
        
    }

	public function sendStatus($data){
		
		
		$order = new \App\Model\OrderCategory;
		$order =  $order::find($data->category_id);
		$data = [
			'name' => $data->name,
			'email' => $data->email,
			'order_number' => $data->order_number,
			'datetime' => date('Y/m/d H:i:s'),
			'order_status' => $order->name,
			'payment_code' => $data->payment_code
		];
	
		$from = [
			'email'=>'no-reply@cherrynini.com',
			'name'=>' Cherry Nini線上客服',
			'subject'=>'Cherry Nini 訂單狀態變更通知'
		];
		
		//填寫收信人信箱
		$to = ['email'=>$data['email'],'name'=>$data['name']];
		//$to = ['email'=>'linus73921@gmail.com','name'=>'LINUS'];
		//信件的內容(即表單填寫的資料)
		//寄出信件
		Mail::send('emails.status', $data, function($message) use ($from, $to) {
			$message->from($from['email'], $from['name']);
			$message->to($to['email'], $to['name'])->subject($from['subject']);
			//$message->to('linus73921@gmail.com', 'LINUS')->cc($from['email'])->subject($from['subject']);
		});
	}


    public function exportOrderExcel(){
        
        $start_date = isset($_GET['start_date'])?$_GET['start_date']:'';
        $end_date = isset($_GET['end_date'])?$_GET['end_date']:'';
        $from = $start_date.' 00:00:00';
        $to = $end_date.' 23:59:59';

        $orders = new \App\Model\Order;
        $orders = $orders::whereBetween('order_date', [$from, $to])
        ->where('payment_code','成功')
        ->orWhere('payment_code','刷卡成功')
        ->whereBetween('order_date', [$from, $to])
        ->orderBy('id','desc')
        ->get();
        $order_id = [];
        foreach ($orders as $key => $value) {
            # code...
            array_push($order_id,$value->id);
        }

        $details = new \App\Model\OrderDetail;
        $group = $details::whereIn('order_id', $order_id)
        ->selectRaw('sum(qty) AS qty, spec_id')
        ->groupBy('spec_id')
        ->get();
        if(!count($group))return '查無相關資訊';
        //return $group;
        $ids = [];
        foreach ($group as $key => $value) {
            # code...
            array_push($ids,$value->spec_id);
        }
        $product = new \App\Model\ProductSpec;
       
        $product = $product::whereIn('id', $ids)
            ->with('product')
            ->get();
        $cellData = [
            //['商品名稱','尺寸','數量']
        ];
        foreach ($product as $k => $v) {
            # code...
            foreach ($group as $k2 => $v2) {
                # code...
                if($v->id == $v2->spec_id)
                $product[$k]->total = $v2;
            }
            array_push($cellData,[$product[$k]->product->cover,$product[$k]->number,$product[$k]->product->name,$product[$k]->color." / ".$product[$k]->size,$product[$k]->total->qty]);
            //array_push($cellData,
            //    ['<img src="'.$product[$k]->product->cover.'">',
            //    $product[$k]->color." / ".$product[$k]->size,
            //    $product[$k]->total->qty
            //]);
            
        }

        Excel::create($start_date.'至'.$end_date.'銷售紀錄',function ($excel) use ($cellData){
            
            $excel->sheet('Payments', function($sheet) use ($cellData){
               
                $sheet->loadView('excel.orders', ['cellData' => $cellData]);
            });

            //$excel->sheet('score', function ($sheet) use ($cellData){
                //$objDrawing = new PHPExcel_Worksheet_Drawing;
                //$objDrawing->setPath(public_path('uploads/前後兩穿扭結上衣(黑色、米白色、粉色、咖啡色)/21317542_10159271497805084_9137874919038617703_n.jpg')); //your image path
                //$objDrawing->setCoordinates('A2');
                //$objDrawing->setHeight(100);  
                //$objDrawing->setWorksheet($sheet);
              
            //    $sheet->rows($cellData);
            //});




           

        })->export('xlsx');
        
    }

    public function createTracking($id){
        $order = \App\Model\Order::with(['detail' => function($query){
                        $query->with('spec')->get();
                    }])->find($id);  
        include(app_path() . '/Http/Controllers/AioSDK/CreateShippingOrder.php'); //建立物流單
        $result = createShippingOrder($order);
        
            if(isset($result['ErrorMessage'])){
				return $result;
            }else{
                return $result;
				$order->allpay_logistics_id = $result['AllPayLogisticsID'];
				$order->logistics_status = $result['RtnCode'];  
				
				//if($order->LogisticsSubType == 'UNIMART'){
					//include(app_path() . '/Http/Controllers/AioSDK/QueryLogisticsInfo.php'); //建立物流單
					//$shipinfo = getLogisticsInfo($order->allpay_logistics_id);
					// = $shipinfo['ShipmentNo'];
				//}
				$order->tracking_code = $result['ShipmentNo'];
				$order->save();
				$result['RtnCode'] = $this->checkLogisticsStatu($result['RtnCode']);
				$result['AllPayLogisticsID'] = $result['ShipmentNo'];
				return $result;
			
			}
           
    }

	public function creatEInvoice($id){
		$order = \App\Model\Order::with(['detail' => function($query){
                        $query->with('spec')->get();
                    }])->find($id);  
		if(!$order->InvoiceNumber){
			include(app_path() . '/Http/Controllers/AioSDK/CreateEInvoice.php'); //建立物流單
			$result = createEInvoice($order);
			$order->InvoiceDate = $result['InvoiceDate'];
			$order->InvoiceNumber = $result['InvoiceNumber'];
			$order->InvoiceCode = $result['RtnCode'];
			$order->InvoiceMsg = $result['RtnMsg'];
			$order->save();
		}
		
		return $order;
	}


	
    public function checkLogisticsStatu($code){
        
        switch ($code) {
            case '300':
                # code...
                return '訂單處理中(已收到訂單資料)';
                break;

            case '310':
                # code...
                return '上傳電子訂單檔處理中';
                break;
            
            case '2001':
                # code...
                return '檔案傳送成功';
                break;

            case '3018':
                # code...
                return '到店尚未取貨，簡訊通知取件';
                break;

            case '3019':
                # code...
                return '退件到店尚未取貨，簡訊通知取件';
                break;

            case '3020':
                # code...
                return '貨件未取退回物流中心';
                break;

            case '3021':
                # code...
                return '退貨商品未取退回物流中心';
                break;

            case '3022':
                # code...
                return '買家已到店取貨';
                break;

            case '3023':
                # code...
                return '賣家已取買家未取貨';
                break;

            case '3024':
                # code...
                return '貨件已至物流中心';
                break;

            case '3025':
                # code...
                return '退貨已退回物流中心';
                break;

            case '3032':
                # code...
                return '賣家已到門市寄件';
                break;

            case '7013':
                # code...
                return '訂單超過驗收期限（商家未出貨）';
                break;

            default:
                # code...
                return '訂單處理中(已收到訂單資料)';
                break;
        }
        //$html =  include(app_path() . '/Http/Controllers/AioSDK/ECPay.Logistics.Integration.php');
        //include(app_path() . '/Http/Controllers/AioSDK/CreateShippingOrder.php'); //建立物流單
        //$html = include(app_path() . '/Http/Controllers/AioSDK/PrintTradeDoc.php');
        include(app_path() . '/Http/Controllers/AioSDK/QueryLogisticsInfo.php'); //查詢單號
        //$order = \App\Model\Order::find($id);
        return getLogisticsInfo($id);
		//return ECPay($id);
        
	}

    public function checkLogisticsInfo($code){

        //$html =  include(app_path() . '/Http/Controllers/AioSDK/ECPay.Logistics.Integration.php');
        //include(app_path() . '/Http/Controllers/AioSDK/CreateShippingOrder.php'); //建立物流單
        //$html = include(app_path() . '/Http/Controllers/AioSDK/PrintTradeDoc.php');
        include(app_path() . '/Http/Controllers/AioSDK/QueryLogisticsInfo.php'); //查詢單號
        $result = getLogisticsInfo($code);
        return $result['LogisticsStatus'];
		//return ECPay($id);
        
	}


    public function printorder($id)
    {

        $order = \App\Model\Order::with(['ship','category','detail' => function($query){
                        $query->with(['spec' => function($query){
                            $query->with('product')->get();
                        }])->get();
                    }])->find($id);    
        
       
            foreach($order->detail as $k => $v){
                if($order->detail[$k]->detail){
                $order->detail[$k]->detail = json_decode($order->detail[$k]->detail);
                $detail = [];
                foreach($order->detail[$k]->detail as $k2 => $v2){
                    //\App\Model\Product::where('id', $v2->inside0->id)->first();
                    $data =  [
                         array(
                            'id'=> $v2->inside0->id,
                            'qty'=> $v2->inside0->qty,
                            'info'=> \App\Model\Product::where('id', $v2->inside0->id)->first(),
                        ),
                        array(
                            'id'=> $v2->inside1->id,
                            'qty'=> $v2->inside1->qty,
                            'info'=> \App\Model\Product::where('id', $v2->inside1->id)->first(),
                        ),
                        array(
                            'id'=> $v2->inside2->id,
                            'qty'=> $v2->inside2->qty,
                            'info'=> \App\Model\Product::where('id', $v2->inside2->id)->first(),
                        ),
                        array(
                            'id'=> $v2->inside3->id,
                            'qty'=> $v2->inside3->qty,
                            'info'=> \App\Model\Product::where('id', $v2->inside3->id)->first(),
                        )
                    ];
                    array_push($detail,$data);
    
                }
                $order->detail[$k]->content = $detail;
                }
        
            }
      
        //return $order;
        return view('aida.printorder',
            [
                'order' => $order
            ]
        );
    }

    public function printTradeDoc($code){
    
        include(app_path() . '/Http/Controllers/AioSDK/PrintTradeDoc.php');
        //$html = include(app_path() . '/Http/Controllers/AioSDK/QueryLogisticsInfo.php'); //查詢單號
        //$order = \App\Model\Order::find($id);
		
        return getPrintDoc($code);
		//return ECPay($id);
        
	}

  
}
