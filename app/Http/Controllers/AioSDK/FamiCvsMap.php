<?php
    // 電子地圖
    define('HOME_URL', 'http://kangtien.loc/');
    //define('HOME_URL', 'http://meler.app');
    //require('ECPay.Logistics.Integration.php');
    include('ECPay.Logistics.Integration.php');
    try {
        $AL = new ECPayLogistics();
        $AL->Send = array(
            'MerchantID' => '3035639',
            //'MerchantID' => '3010214', //正式
            'MerchantTradeNo' => 'no' . date('YmdHis'),
            'LogisticsType' => 'CVS',
            'LogisticsSubType' => 'FAMI',
            'IsCollection' => 'N',
            'ServerReplyURL' => HOME_URL . '/ServerReplyURL',
            'ExtraData' => '測試額外資訊',
            'Device' => 0
        );
        // CvsMap(Button名稱, Form target)
        $html = $AL->CvsMap('電子地圖(統一)');
        echo $html;
    } catch(Exception $e) {
        echo $e->getMessage();
    }
?>
