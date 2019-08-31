<?php
    // 超商取貨物流訂單幕後建立
    //define('HOME_URL', 'http://cherrynini.com');
    define('HOME_URL', 'http://kangtien.loc/');
    //require('ECPay.Logistics.Integration.php');
    include('ECPay.Logistics.Integration.php');
    function createShippingOrder($order){
        try {
            $AL = new ECPayLogistics();
            $AL->HashKey = 'ti7u612oiqLyhCmr';
            $AL->HashIV = 'vFm9DjF7hltULwaY';
            //$AL->HashKey = '5294y06JbISpM5x9'; //測試
            //$AL->HashIV = 'v77hoKGq4kWxNNIS'; //測試
            $AL->Send = array(
                'MerchantID' => '3035639',
                //'MerchantID' => '2000132', //測試
                //'MerchantTradeNo' => $order->merchant_trade,
                'MerchantTradeNo' => $order->order_number,
                'MerchantTradeDate' => date('Y/m/d H:i:s'),
                'LogisticsType' => LogisticsType::CVS,
                'LogisticsSubType' => $order->LogisticsSubType,
                'GoodsAmount' => $order->subtotal,
                'CollectionAmount' => 0,
                'IsCollection' => 'N',
                'GoodsName' => '訂單編號：'.$order->order_number,
                'SenderName' => '綱田繡',
                'SenderPhone' => '0223145123',
                'SenderCellPhone' => '',
                'ReceiverName' => mb_substr($order->name,0,8,"utf-8"),
                //'ReceiverPhone' => $order->phone,
                'ReceiverCellPhone' => $order->phone,
                'ReceiverEmail' => $order->email,
                'TradeDesc' => $order->remark,
                'ServerReplyURL' => HOME_URL . '/allPayReturn.php',
                'LogisticsC2CReplyURL' => HOME_URL . '/LogisticsC2CReplyURL.php',
                'Remark' => '',
                'PlatformID' => '',
            );
            $AL->SendExtend = array(
                'ReceiverStoreID' => $order->CVSStoreID,
                //'ReturnStoreID' => '991182'
            );
            // BGCreateShippingOrder()
            $Result = $AL->BGCreateShippingOrder();
			if(!isset($Result['ErrorMessage'])){
				$Result['ShipmentNo'] = $Result['AllPayLogisticsID'];
				if($order->LogisticsSubType == 'UNIMART'){
					$AL->Send = array(
						'MerchantID' => '3035639',
						'AllPayLogisticsID' => $Result['AllPayLogisticsID'],
						'PlatformID' => ''
					);
					// QueryLogisticsInfo()
					$Result2 = $AL->QueryLogisticsInfo();
					$Result['ShipmentNo'] = $Result2['ShipmentNo'];
				}
			
			}
			
            //echo '<pre>' . print_r($Result, true) . '</pre>';
            return $Result;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    
?>