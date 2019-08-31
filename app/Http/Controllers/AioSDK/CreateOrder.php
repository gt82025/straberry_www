<?php
/**
*    Credit信用卡付款產生訂單範例，參數說明請參考SDK技術文件(https://www.allpay.com.tw/Content/files/allpay_047.pdf)
*/
    
    //載入SDK(路徑可依系統規劃自行調整)
    include('AllPay.Payment.Integration.php');
    try {
        
        //$bill = Session::get('bill'); 
        //$cart = Session::get('cart')?Session::get('cart'):Session::get('cartATM'); 
        //$order = Session::get('order')?Session::get('order'):Session::get('orderATM');
        $cart = Session::get('cart'); 
        
        $order = Session::get('order');
        $payment = ($order['payment'] == '虛擬ATM付款') ? 'ATM' : 'Credit';
    	$obj = new AllInOne();
        
        //服務參數
		//商店代號：3113138
        //介接 HashKey： Tjbu8ZyV5ZsbBwGQ
        //介接 HashIV： fq7GyKTzvr3Toijh
        //信用卡測試卡號	4311-9522-2222-2222
        //信用卡測試安全碼 222
        
        $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";         //服務位置
        $obj->HashKey     = '5294y06JbISpM5x9' ;                                            //測試用Hashkey，請自行帶入AllPay提供的HashKey
        $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                            //測試用HashIV，請自行帶入AllPay提供的HashIV
        $obj->MerchantID  = '2000132';                                                      //測試用MerchantID，請自行帶入AllPay提供的MerchantID
	
        /*
		$obj->ServiceURL  = "https://payment.ecpay.com.tw/Cashier/AioCheckOut/V5"; //服務位置
        $obj->HashKey     = 'Tjbu8ZyV5ZsbBwGQ' ;                                          //測試用Hashkey，請自行帶入AllPay提供的HashKey
        $obj->HashIV      = 'fq7GyKTzvr3Toijh' ;                                          //測試用HashIV，請自行帶入AllPay提供的HashIV
        $obj->MerchantID  = '3113138';   
        	*/
        //基本參數(請依系統規劃自行調整)

        $obj->Send['MerchantTradeNo']   = $order['merchant_trade'];                     //訂單編號
        $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                        //交易時間
        $obj->Send['TotalAmount']       = $order['bill']['total'];                                       //交易金額
        $obj->Send['TradeDesc']         = $order['order_number'];                           //交易描述
        //$obj->Send['ChoosePayment']     = PaymentMethod::Credit ;                     //付款方式:Credit
        $obj->Send['ChoosePayment']     = $payment;                     //付款方式:Credit WebATM
        
        //訂單的商品資料
        foreach($cart as $k => $v){
            array_push($obj->Send['Items'], 
            array('Name' => $v->name, 'Price' => (int)$v->selling,'Currency' => "元", 'Quantity' => (int) $v->qty, 'URL' => "dedwed"));
        }
        //array_push($obj->Send['Items'],array('Name' => '常溫運費', 'Price' => (int)$order['bill']['freight_normal'],'Currency' => "元", 'Quantity' => (int) 1, 'URL' => "dedwed"));
        //array_push($obj->Send['Items'],array('Name' => '低溫運費', 'Price' => (int)$order['bill']['freight_special'],'Currency' => "元", 'Quantity' => (int) 1, 'URL' => "dedwed"));
        //array_push($obj->Send['Items'], 
        //array('Name' => '冷凍宅配', 'Price' => (int)$order['shipping_fr'],'Currency' => "元", 'Quantity' => (int) 1, 'URL' => "dedwed"));
         
        if($order['payment'] == 'ATM虛擬帳號'){
            
            $obj->Send['ReturnURL']       = 'https://'.$_SERVER['HTTP_HOST']."/atmPayReturn";    //Server 付款完成通知回傳的網址
            $obj->Send['ClientBackURL']   = 'https://'.$_SERVER['HTTP_HOST']."/members"; //Client 端返回會員系統的按鈕連結
            $obj->SendExtend['PaymentInfoURL']  = 'https://'.$_SERVER['HTTP_HOST']."/atmPayAccount" ; //Server 端回傳付款相關資訊
            $obj->SendExtend['ExpireDate'] = 5 ;  
            //$obj->Send['ClientRedirectURL']   = 'https://'.$_SERVER['HTTP_HOST']."/atmPayAccount" ; //Client 端回傳付款相關資訊
            Session::forget('bill');
            Session::forget('cart');
            Session::forget('order');
           
        }else{
            $obj->Send['ReturnURL']           = 'https://'.$_SERVER['HTTP_HOST']."/allPayReturn" ;    //付款完成通知回傳的網址
            $obj->Send['ClientBackURL']       = 'https://'.$_SERVER['HTTP_HOST'];    //Client 端返回會員系統的按鈕連結
            $obj->Send['OrderResultURL']      = 'https://'.$_SERVER['HTTP_HOST']."/allPayReturn" ; //Client 端回傳付款結果網址
            //$obj->Send['PaymentInfoURL']      = 'https://'.$_SERVER['HTTP_HOST']."/allPayReturn" ; //Server 端回傳付款相關資訊
            $obj->Send['ClientRedirectURL']   = 'https://'.$_SERVER['HTTP_HOST']."/allPayReturn" ; //Client 端回傳付款相關資訊
            //Credit信用卡分期付款延伸參數(可依系統需求選擇是否代入)
            //以下參數不可以跟信用卡定期定額參數一起設定
            $obj->SendExtend['CreditInstallment'] = 0 ;    //分期期數，預設0(不分期)
            $obj->SendExtend['InstallmentAmount'] = 0 ;    //使用刷卡分期的付款金額，預設0(不分期)
            $obj->SendExtend['Redeem'] = false ;           //是否使用紅利折抵，預設false
            $obj->SendExtend['UnionPay'] = false;          //是否為聯營卡，預設false;

            //Credit信用卡定期定額付款延伸參數(可依系統需求選擇是否代入)
            //以下參數不可以跟信用卡分期付款參數一起設定
            // $obj->SendExtend['PeriodAmount'] = '' ;    //每次授權金額，預設空字串
            // $obj->SendExtend['PeriodType']   = '' ;    //週期種類，預設空字串
            // $obj->SendExtend['Frequency']    = '' ;    //執行頻率，預設空字串
            // $obj->SendExtend['ExecTimes']    = '' ;    //執行次數，預設空字串
        }
         
        //產生訂單(auto submit至AllPay)
        $obj->CheckOut();

    
    } catch (Exception $e) {
    	echo $e->getMessage();
    } 


 
?>