<?php
function createEInvoice($order){
	try
	{
		$sMsg = '' ;
	// 1.載入SDK程式
		include_once('Ecpay_Invoice.php') ;
		$ecpay_invoice = new EcpayInvoice ;
		
	// 2.寫入基本介接參數
		/*
		$ecpay_invoice->Invoice_Method 			= 'INVOICE' ;
		$ecpay_invoice->Invoice_Url 			= 'https://einvoice-stage.ecpay.com.tw/Invoice/Issue' ;
		$ecpay_invoice->MerchantID 			= '2000132' ;
		$ecpay_invoice->HashKey 			= 'ejCk326UnaZWKisg' ;
		$ecpay_invoice->HashIV 				= 'q9jcZX8Ib9LM8wYk' ;
		*/
		$ecpay_invoice->Invoice_Method 			= 'INVOICE' ;
		$ecpay_invoice->Invoice_Url 			= 'https://einvoice.ecpay.com.tw/Invoice/Issue' ;
		$ecpay_invoice->MerchantID 			= '3010214' ;
		$ecpay_invoice->HashKey 			= 'ODrgogC7i7tlprZm' ;
		$ecpay_invoice->HashIV 				= 'OHoadf4utxGVWUoF' ;
		
	// 3.寫入發票相關資訊
		$aItems	= array();
		array_push($ecpay_invoice->Send['Items'], 
				array(
					'ItemName' => $order->order_number, 
					'ItemCount' => 1, 
					'ItemWord' => '件', 
					'ItemTaxType' => 1, 
					'ItemPrice' => $order->total, 
					'ItemAmount' => $order->total, 
				//'ItemRemark' => '商品備註一'  
				)) ;
		// 商品資訊
		
		
		//array_push($ecpay_invoice->Send['Items'], array('ItemName' => '商品名稱二', 'ItemCount' => 1, 'ItemWord' => '批', 'ItemPrice' => 150, 'ItemTaxType' => 1, 'ItemAmount' => 150, 'ItemRemark' => '商品備註二' )) ;
		//array_push($ecpay_invoice->Send['Items'], array('ItemName' => '商品名稱二', 'ItemCount' => 1, 'ItemWord' => '批', 'ItemPrice' => 250, 'ItemTaxType' => 1, 'ItemAmount' => 250, 'ItemRemark' => '商品備註三' )) ;
		
		//$RelateNumber = 'ECPAY'. date('YmdHis') . rand(1000000000,2147483647) ; // 產生測試用自訂訂單編號
		$ecpay_invoice->Send['RelateNumber'] = $order->order_number;
		$ecpay_invoice->Send['CustomerID'] 			= $order->user_id ;
		$ecpay_invoice->Send['CustomerIdentifier'] 		= '' ;
		$ecpay_invoice->Send['CustomerName'] 			= $order->name ;
		$ecpay_invoice->Send['CustomerAddr'] 			= $order->address ;
		//$ecpay_invoice->Send['CustomerPhone'] 			= $order->phone;
		$ecpay_invoice->Send['CustomerEmail'] 			= $order->email;
		$ecpay_invoice->Send['ClearanceMark'] 			= '' ;
		$ecpay_invoice->Send['Print'] 				= '1' ;
		$ecpay_invoice->Send['Donation'] 			= '2' ;
		$ecpay_invoice->Send['LoveCode'] 			= '' ;
		$ecpay_invoice->Send['CarruerType'] 			= '' ;
		$ecpay_invoice->Send['CarruerNum'] 			= '' ;
		$ecpay_invoice->Send['TaxType'] 			= 1 ;
		$ecpay_invoice->Send['SalesAmount'] 			= $order->total ;
		$ecpay_invoice->Send['InvoiceRemark'] 			= 'SDK TEST PHP V1.0.3' ;	
		$ecpay_invoice->Send['InvType'] 			= '07' ;
		$ecpay_invoice->Send['vat'] 				= '' ;
	// 4.送出
		$aReturn_Info = $ecpay_invoice->Check_Out();
		return $aReturn_Info;
	// 5.返回
		//foreach($aReturn_Info as $key => $value)
		//{
		//	$sMsg .=   $key . ' => ' . $value . '<br>' ;
		//}
		
	}
	catch (Exception $e)
	{
		// 例外錯誤處理。
		$sMsg = $e->getMessage();
	}
	//echo 'RelateNumber=>' . $order->number.'<br>'.$sMsg ;
}
?>
