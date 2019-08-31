<table class="table table-bordered">
    <tr>
        <!--
        <th>圖片</th>
        -->
        <th>訂單編號</th>
        <th>付款狀態/(後五碼)</th>

        <th>訂購人姓名</th>
        <th>訂購人eMail</th>
        <th>訂購人電話</th>
        <th>訂購人地址</th>

        <th>收件人姓名</th>
        <th>收件人eMail</th>
        <th>收件人電話</th>
        <th>收件人地址</th>
        <th>收件時間</th>
        <th>備註</th>
       
        <th>商品資訊/數量</th>
        <th>商品小計</th>
        <th>商品折扣</th>
        <th>商品總計</th>

        <th>運送方式</th>
    </tr>

    @foreach($cellData as $k => $v)
        <tr>
            <!--
            <td> <img src="{{$v[0]}}" height="80"></td>
            -->
            <td valign="middle">{{ $v->order_number }}</td>
            <td valign="middle">{{ $v->RtnCode }} / {{ $v->MerchantTradeNo }}</td>
            
            <td valign="middle">{{ $v->name }}</td>
            <td width="20" valign="middle">{{ $v->email }}</td>
            <td valign="middle">{{ $v->phone }}</td>
            <td valign="middle">{{ $v->address }}</td>

            <td valign="middle">{{ $v->to_name }}</td>
            <td width="20" valign="middle">{{ $v->to_email }}</td>
            <td valign="middle">{{ $v->to_phone }}</td>
            <td valign="middle">{{ $v->to_address }}</td>
            <td valign="middle">{{ $v->ship_time }}</td>
            <td valign="middle">{{ $v->remark }}</td>

            <td valign="middle" width="40">
                @foreach($v->detail as $k2 => $v2)
                    @if($k2>0)<br>@endif{{ $v2->name }}/{{ $v2->spec->size }} * {{$v2->qty}}
                @endforeach
            </td>
            <td valign="middle">{{ $v->subtotal }}</td>
            <td valign="middle">{{ $v->discount }}</td>
            <td valign="middle">{{ $v->total }}</td>
            <td width="20" valign="middle">
                @if($v->shipping_fee > 0)
                常溫宅配<br>
                @endif
                @if($v->shipping_fee_temp > 0)
                低溫宅配
                @endif
            </td>
        </tr>
    @endforeach
</table>  
             