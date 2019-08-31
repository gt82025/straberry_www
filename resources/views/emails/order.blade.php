<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>感謝您 使用尋莓園有機農場線上訂購優質商品</h1>
		<p>親愛的 {{ $name }} 先生/小姐 您好：<br>
		已經收到您的訂購資訊，感謝您使用尋莓園有機農場訂購優質商品，<br>
		本通知函只是通知您本系統已經在{{ date('Y/m/d H:i:s') }}收到您的訂購訊息，
		並供您再次自行核對之用，不代表交易已經完成。
		</p>
		
		<h3>訂單資訊</h3>
		<table width="600" style="border:1px solid #c8c8c8">
			<tbody>
				<tr>
					<td style="border:1px solid #c8c8c8;width:100;"></td>
					<td style="border:1px solid #c8c8c8">商品資訊</td>
					<td style="border:1px solid #c8c8c8" align="center">數量</td>
					<td style="border:1px solid #c8c8c8" align="center">單價</td>
					<td style="border:1px solid #c8c8c8" align="center">總價</td>
				</tr>
				@foreach($cart as $k => $v)
				<tr>
				<td style="border:1px solid #c8c8c8">
				
					<img src="{{url($v['product']['cover'])}}" alt="{{$v['name']}}" width="100"> 
				
				</td>
				<td style="border:1px solid #c8c8c8">
				{{$v['name']}}<br>
				{{$v['size']}}<br>
				
				</td>
				<td style="border:1px solid #c8c8c8" align="center">{{$v['qty']}} </td>
				<td style="border:1px solid #c8c8c8" align="center">{{$v['selling']}} </td>
				<td style="border:1px solid #c8c8c8" align="center">{{$v['total']}} </td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<br><br>

		<h3>付款資訊</h3>
		配送方式：{{ $ship['name'] }}<br>
		訂單編號：{{ $order_number }}<br>
		商品小計：{{ $bill['subtotal'] }}<br>
		運費：{{ $bill['freight'] }}<br>
		
		
		折扣金額：{{ $bill['discount'] }}<br>
		商品總額：{{ $bill['total'] }}<br>
		<br>
		<br>
		<h3>收件人資訊</h3>
		姓名：{{ $to_name }}<br>
		性別：{{ $to_gender }}<br>
		E-Mail：{{ $to_email }}<br>
		連絡電話：{{ $to_phone }}<br>
		收件地址：{{ $to_address }}<br>
		<br>
		<br>
	
		<!--
		<h3>匯款資訊</h3>
		行別：褒忠郵局 700<br>
		戶名：章碧瓊<br>
		局號：0301286<br>
		帳號：0089795<br>
-->
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