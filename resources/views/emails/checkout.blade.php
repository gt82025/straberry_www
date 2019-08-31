<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
	
    <body>
        <h1>感謝您 使用草菓農場線上訂購優質商品</h1>
		<p>親愛的 {{ $name }} 先生/小姐 您好：<br>
		通知您{{ $order_number }}此筆訂單，已經於{{ $payment_date }}收到付款完成<br>",
	    我們將會在最短時間內處理您的訂單！訂單明細請至<a href="https://www.farmertimex.com.tw/login">『會員專區-消費記錄』</a>查詢。
		</p>
	

		<h3>付款資訊</h3>
		訂單編號：{{ $order_number }}<br>
		付款結果：{{ $payment_result }}<br>
		付款方式：{{ $payment_type }}<br>
		付款日期：{{ $payment_date }}<br>
		付款金額：{{ $total }}<br>
		交易代碼：{{ $merchant_trade }}<br>
		<br>
		<br>
		***系統自動發信，有問題請使用客服系統詢問***
		<br>
		<br>
		草菓農場 strawberry field<br>
		Website: https://farmertimex.com.tw<br>
		LINE ID: @fs_farm
		
		

    </body>
</html>