<?php

namespace App\Http\Controllers\AioSDK;
use App\Http\Controllers\Controller;
use App\Model\Order;

class FcPayController extends Controller
{ 
    public function CreditPay($order){

        //$cart = Session::get('cart'); 
        //$order = Session::get('order');
        $ServiceURL  = "https://www.focas.fisc.com.tw/FOCAS_WEBPOS/online/";         //服務位置
        $MerchantID = "009566994919001";
        $TerminalID = "90011801";
        $merID = "63007";
        $MerchantName = $order['name'];
        //$purchAmt = $order['bill']['total']; //交易金額
        $purchAmt = 1; //交易金額
        $lidm = $order['merchant_trade']; //交易訂單編號
        $AutoCap = "1";
        //$AuthResURL =  url("fcPayReturn"); //授權結果回傳網址
        $AuthResURL = "https://farmertimex.com.tw/fcPayReturn";
        $mobileNbr = $order['phone']; //電話號碼
        $szHtml =  '<!DOCTYPE html>';
        $szHtml .= '<html>';
        $szHtml .=     '<head>';
        $szHtml .=         '<meta charset="utf-8">';
        $szHtml .=     '</head>';
        $szHtml .=     '<body>';
        $szHtml .=         "<form id=\"__allpayForm\" method=\"post\" target=\"_self\" action=\"{$ServiceURL}\">";
        
        $szHtml .=         "<input type=\"hidden\" name=\"MerchantID\" value='{$MerchantID}' />";
        $szHtml .=         "<input type=\"hidden\" name=\"TerminalID\" value='{$TerminalID}' />";
        $szHtml .=         "<input type=\"hidden\" name=\"merID\" value='{$merID}' />";
        $szHtml .=         "<input type=\"hidden\" name=\"MerchantName\" value='{$MerchantName}' />";
        $szHtml .=         "<input type=\"hidden\" name=\"purchAmt\" value='{$purchAmt}' />";
        $szHtml .=         "<input type=\"hidden\" name=\"lidm\" value='{$lidm}' />";
        $szHtml .=         "<input type=\"hidden\" name=\"AutoCap\" value='{$AutoCap}' />";
        $szHtml .=         "<input type=\"hidden\" name=\"AuthResURL\" value='{$AuthResURL}' />";
        $szHtml .=         "<input type=\"hidden\" name=\"mobileNbr\" value='{$mobileNbr}' />";


        //$szHtml .=             "<input type=\"hidden\" name=\"CheckMacValue\" value=\"{$szCheckMacValue}\" />";
        $szHtml .=         '</form>';
        $szHtml .=         '<script type="text/javascript">document.getElementById("__allpayForm").submit();</script>';
        $szHtml .=     '</body>';
        $szHtml .= '</html>';

        return $szHtml ;

    
    } 

    public function AtmPay($order){

        //$cart = Session::get('cart'); 
        //$order = Session::get('order');
        $ServiceURL  = "https://eatm.chb.com.tw/eatm/chbpartner/index.action";         //服務位置
     
        $merID = "63007";
        $Amt = 1; //交易金額
        $y = substr(date ( 'Y'), -1); //當年尾數
        $day = date ( 'z', strtotime ( date("Y-m-d") )) + 3; //日歷日
        $order_number = str_pad(substr($order['order_number'],-3), 4, '0', STR_PAD_LEFT); //
        $amt_number = str_pad($Amt, 8, '0', STR_PAD_LEFT); 
        
        $OrderNum = $merID.$y.$day.$order_number;//"63007929100026"; //交易訂單編號
        $lid1 = preg_split('//', "7317317317317", -1, PREG_SPLIT_NO_EMPTY);//"7317317317317";
        $lid2 = preg_split('//', "31731731", -1, PREG_SPLIT_NO_EMPTY);//"31731731";

        $code1 = preg_split('//', $OrderNum, -1, PREG_SPLIT_NO_EMPTY);
        $code2 = preg_split('//', $amt_number, -1, PREG_SPLIT_NO_EMPTY);

        $num1 = 0;
        $num2 = 0;
        foreach ($code1 as $k => $v) {
            $num1 += substr($v * $lid1[$k], -1);
        }

        foreach ($code2 as $k => $v) {
            $num2 += substr($v * $lid2[$k], -1);
        }
        //$num1 = (substr($num1, -1) == 0)?10:substr($num1, -1);
        //$num2 = (substr($num2, -1) == 0)?10:substr($num2, -1);
        $vcode = substr(10 - substr($num1 + $num2, -1), -1);
        $OrderNum = $OrderNum.$vcode;
        $data = Order::where('order_number', $order['order_number'])->first();
        $data->MerchantTradeNo = $OrderNum;
        $data->save();
        //return $lid1;
                   //7317317317317     31731731 
                   //2900194710004 = 1
                   //preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
                  
        //$Amt = $order['bill']['total']; //交易金額
       
        //$Url =  url("fcPayReturn"); //授權結果回傳網址
        $Url = "https://farmertimex.com.tw/fcATMReturn";
 
        $szHtml =  '<!DOCTYPE html>';
        $szHtml .= '<html>';
        $szHtml .=     '<head>';
        $szHtml .=         '<meta charset="utf-8">';
        $szHtml .=     '</head>';
        $szHtml .=     '<body>';
        $szHtml .=         "<form id=\"__allpayForm\" method=\"post\" target=\"_self\" action=\"{$ServiceURL}\">";
    
        $szHtml .=         "<input type=\"hidden\" name=\"OrderNum\" value='{$OrderNum}' />";
        $szHtml .=         "<input type=\"hidden\" name=\"Amt\" value='{$Amt}' />";
        $szHtml .=         "<input type=\"hidden\" name=\"Url\" value='{$Url}' />";
        //$szHtml .=             "<input type=\"hidden\" name=\"CheckMacValue\" value=\"{$szCheckMacValue}\" />";
        $szHtml .=         '</form>';
        $szHtml .=         '<script type="text/javascript">document.getElementById("__allpayForm").submit();</script>';
        $szHtml .=     '</body>';
        $szHtml .= '</html>';

        return $szHtml ;

    
    } 
    
    public function QrPay($order){

        //$cart = Session::get('cart'); 
        //$order = Session::get('order');
        //特店及端末代號 
        //MID：009566994919001 
        //TID：90011802 
        $ServiceURL  = "https://www.focas-test.fisc.com.tw/FOCAS_WEBPOS/QR_PAGE/";         //服務位置
        
        $AcqBank = '009';//收單行代碼
        $AuthResURL = 'http://farmertimex.loc/QrPayReturn'; //授權結果回傳網址
        $lidm = '20191010001'; //交易訂單編號
        $MerchantID = '009566994919001';//收單銀行授權使用的特店代號
        $purchAmt = 1;//交易金額
        $redomcode = '1qaz2wsx3edc4rfv5tgb6yhn7ujm8ikl';//驗證參數
        $TerminalID = '90011802'; //收單銀行授權使用的機台代號
        $reqToken = hash('sha256',$AcqBank.'&'.$AuthResURL.'&'.$lidm.'&'.$MerchantID.'&'.$purchAmt.'&'.$TerminalID.'&'.$redomcode);
        $merID = "63007";
      
        $szHtml =  '<!DOCTYPE html>';
        $szHtml .= '<html>';
        $szHtml .=     '<head>';
        $szHtml .=         '<meta charset="utf-8">';
        $szHtml .=     '</head>';
        $szHtml .=     '<body>';
        $szHtml .=         "<form id=\"__allpayForm\" method=\"post\" target=\"_self\" action=\"{$ServiceURL}\">";
    
        $szHtml .=         "<input type=\"hidden\" name=\"AcqBank\" value=\"{$AcqBank}\" />";
        $szHtml .=         "<input type=\"hidden\" name=\"AuthResURL\" value=\"{$AuthResURL}\" />";
        $szHtml .=         "<input type=\"hidden\" name=\"lidm\" value=\"{$lidm}\" />";
        $szHtml .=         "<input type=\"hidden\" name=\"MerchantID\" value=\"{$MerchantID}\" />";
        $szHtml .=         "<input type=\"hidden\" name=\"purchAmt\" value=\"{$purchAmt}\" />";
        $szHtml .=         "<input type=\"hidden\" name=\"TerminalID\" value=\"{$TerminalID}\" />";
        $szHtml .=         "<input type=\"hidden\" name=\"reqToken\" value=\"{$reqToken}\" />";
        $szHtml .=         "<input type=\"hidden\" name=\"merID\" value=\"{$merID}\" />";
        $szHtml .=         '</form>';
        $szHtml .=         '<script type="text/javascript">document.getElementById("__allpayForm").submit();</script>';
        $szHtml .=     '</body>';
        $szHtml .= '</html>';

        return $szHtml ;

    
    } 
}