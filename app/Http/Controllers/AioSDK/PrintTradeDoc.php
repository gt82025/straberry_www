<?php
    // 超商取貨物流訂單幕後建立
    define('HOME_URL', 'http://cherrynini.com');
    //define('HOME_URL', 'http://meler.app');
    //require('ECPay.Logistics.Integration.php');
    include('ECPay.Logistics.Integration.php');
    function getPrintDoc($code){
        try {
            $AL = new ECPayLogistics();
            //$AL->HashKey = '5294y06JbISpM5x9';
            //$AL->HashIV = 'v77hoKGq4kWxNNIS';
			$AL->HashKey = '7qtio9P1tVtDQ0rw';
            $AL->HashIV = 'kQr6aMgLALOtVZBP';
            $AL->Send = array(
                //'MerchantID' => '2000132',
				'MerchantID' => '3010214',
                'AllPayLogisticsID' => $code,
                'PlatformID' => ''
            );
            // PrintTradeDoc(Button名稱, Form target)
            $html = $AL->PrintTradeDoc('產生托運單/一段標',"_self");
            echo $html;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    
    
?>