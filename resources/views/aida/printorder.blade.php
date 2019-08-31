<!DOCTYPE html>
<!--[if IE 8]> <html lang="zh-Hant" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="zh-Hant" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-Hant">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>AiDA.Minerva | Content Management System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
        <style type="text/css">
	body{
		border-top: none;
		border-bottom: none;
		font-size:12px;
	}
	.print_info td{
		border: 1px solid #000;
		text-align:left;
		padding:6px;
	 }
	 .print_info{
		width:32%;
		margin-left:10px;
	 }
	 .print_cart{
		width:66%;
	 }
	 .bg_gray{
		background-color:#eaeaea;
		font-weight:bold;
		padding:8px;
		font-size:14px;
	 }
	 .print_cart td{
		border: 1px solid #c8c8c8;
		text-align:left;
		padding:8px;
	 }
	 .frame{
		overflow:hidden;
	 }
	 textarea{
		border:none;
		width:600px;
		border-bottom:2px dashed #000;
     }
     .product_status{
         color:red;
     }
	 .show_image img{
		 float:left;
	 }
	 .print_detail{
		 font-size:14px;
	 }
	 .fill{
		width:100px;
		height:20px;
		border:1px solid #000;
		margin-bottom:10px;
	 }
	</style>

        </head>
    <!-- END HEAD -->
    <body>
		<div class="frame">
		<table class="print_cart" align="left">
				<tbody><tr>
					<td colspan="5" class="bg_gray" style="padding:0px;">
						<table width="100%">
							<tbody><tr>
								<td>訂單編號: {{$order->order_number}} {{$order->order_date}}</td>
								<td>付款方式：{{$order->RtnCode}} ({{$order->MerchantTradeNo}})</td>
							</tr>
						
							<tr>
								
								<td  colspan="2">運送方式：
								@if($order->shipping_fee > 0) 常溫宅配 @endif
								@if($order->shipping_fee_temp > 0) 低溫宅配 @endif
								</td>

							</tr>
	 
							<tr>
								<td>商品小計：NT$ {{number_format($order->subtotal)}}</td>
								<td>折扣金額：NT$ {{number_format($order->discount_total)}}</td>
								
							</tr>
						
							<tr>
								
								<td  colspan="2">結帳金額：NT$ {{number_format($order->total)}}</td>

							</tr>
				
						</tbody>
					</table>
					</td>
				</tr>

					<tr>
						<td colspan="2" style="text-align:left;">商品資訊</td>
						<td width="40" style="text-align:center;">單價</td>
						<td width="40" style="text-align:center;">數量</td>
						<td width="40" style="text-align:center;">金額</td>
					</tr>
                    @foreach ($order->detail as $k => $v)
                    <tr>
                        <td width="120" class="text-left">
							
						<a href="{{url($v->spec->product->cover)}}" data-fancybox="show" class="show_image">
							<img src="{{url('assets/thumbs/timthumb.php?src=')}}{{url($v->spec->product->cover)}}&h=200&w=200&zc=1&q=90&a=t'" width="120">
						</a>
                        </td>
                        <td class="text-left">
							{{$v->spec->product->name}} {{$v->spec->product->subtitle}}<br>
							<span class="product_status">{{$v->spec->name}} {{$v->spec->size}}</span>
							<br>
							{{$v->spec->product->taste}}
							@if($v->detail)
							@foreach ($v->content as $k2 => $v2)
							<hr>
							<span class="product_status">第{{$k2+1}}盒</span><br>
								@foreach ($v2 as $k3 => $v3)
								{{$v3['info']['name']}} x {{$v3['qty']}}<br>
								@endforeach
								<br>
							@endforeach
							@endif
                        </td>
                        <td style="text-align:center;">{{number_format($v->selling)}}</td>
                        <td style="text-align:center;">{{$v->qty}}</td>
                        <td style="text-align:center;">{{number_format($v->total)}}</td>
                    </tr>
                    @endforeach
						
							</tbody></table>
			<!--商品明細 end-->
            <!--寄件人明細 end-->
			<table border="0" cellspacing="0" cellpadding="0" class="print_info" align="left">
				  <tbody>
                      <!--
                    <tr>
					<td colspan="4" class="bg_gray">訂購人資訊</td>
				  </tr>
				  <tr>
					<td width="70">寄件人</td>
					<td colspan="3">陳姵妤</td>
				  </tr>
				  <tr>
					<td>e-Mail</td>
					<td colspan="3">nuan913@gmail.com</td>
					
				  </tr>
				  <tr>
					
					<td>手機</td>
					<td colspan="3">0938682091</td>
				  </tr>
				  				  				  <tr>
					<td>備註</td>
					<td colspan="3"><p>商品今天寄出</p></td>
				  </tr>
					-->  
					




				<tr>
					<td colspan="4" class="bg_gray">寄件人資訊</td>
				</tr>
				<tr>
					<td>寄件人</td>
					<td colspan="3">{{$order->name}} </td>
				</tr>
				<tr>
					<td>稱謂</td>
					<td colspan="3">{{$order->title}} </td>
				</tr>
				<tr>
					<td>email</td>
					<td colspan="3">{{$order->email}} </td>
				</tr>
				<tr>
					<td>市話</td>
					<td colspan="3">{{$order->tel}}</td>
				</tr>
				<tr>
					<td>手機</td>
					<td colspan="3">{{$order->phone}} </td>
				</tr>
				<tr>
					<td>地址</td>
					<td colspan="3">{{$order->address}}</td>
				</tr>
	
                <tr>
					<td colspan="4" class="bg_gray">收件人資訊</td>
				</tr>
				<tr>
					<td>收件人</td>
					<td colspan="3">{{$order->to_name}}</td>
				  </tr>
				<tr>
					<td>稱謂</td>
					<td colspan="3">{{$order->to_title}} </td>
				</tr>
				
				<tr>
					<td>市話</td>
					<td colspan="3">{{$order->to_tel}}</td>
				</tr>
				<tr>
					<td>手機</td>
					<td colspan="3">{{$order->to_phone}} </td>
				</tr>
				<tr>
					<td>地址</td>
					<td colspan="3">{{$order->to_address}}</td>
				</tr>
				  <tr>
					<td>配送時間</td>
					<td colspan="3">{{$order->ship_time}}</td>
				  </tr>
	 			<!--
				<tr>
					<td colspan="4" class="bg_gray">發票資訊</td>
				</tr>
				<tr>
					<td>收件方式</td>
					<td colspan="3">{{$order->invoice}}</td>
				  </tr>
				<tr>
				<tr>
					<td>統一編號</td>
					<td colspan="3">{{$order->invoice_number}}</td>
				  </tr>
				<tr>
					<td>名稱</td>
					<td colspan="3">{{$order->invoice_name}} </td>
				</tr>
				
				<tr>
					<td>地址</td>
					<td colspan="3">{{$order->invoice_address}}</td>
				</tr>
				-->
				</tbody></table>
		</div>
	
		
        <!--
		<p>
		1.	商品售出除瑕疵恕無法退換<br>
		2.	若遇瑕疵商品請在收到商品7日內通知小幫手(超過7日恕無法辦理退換)<br>
		3.	因黑貓宅急便更改營業時間至8/28起調整服務時間， 週日停止集貨/配送包裹服務
		<br>
		<br>
		
		口、斷貨商品已發出EMAIL通知.請查收並回覆唷<br>
		口、尚有商品追加中還未到貨.到貨後會馬上補寄出唷

		</p>
		-->
		
			
		<script src="{{url('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
    </body>
</html>