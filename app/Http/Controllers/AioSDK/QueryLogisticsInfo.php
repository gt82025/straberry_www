<?php
    // 超商取貨物流訂單幕後建立
    //define('HOME_URL', 'http://cherrynini.com');
    include('ECPay.Logistics.Integration.php');
    function getLogisticsInfo($code){

        try {
            $AL = new ECPayLogistics();
            $AL->HashKey = '7qtio9P1tVtDQ0rw';
            $AL->HashIV = 'kQr6aMgLALOtVZBP';
            $AL->Send = array(
                'MerchantID' => '3010214',
                'AllPayLogisticsID' => $code,
                'PlatformID' => ''
            );
            // QueryLogisticsInfo()
            $Result = $AL->QueryLogisticsInfo();
            //echo '<pre>' . print_r($Result, true) . '</pre>';
            return $Result;
        } catch(Exception $e) {
            echo $e->getMessage();
        }
    }
    
    
?>