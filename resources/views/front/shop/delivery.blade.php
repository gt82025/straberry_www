@extends('layouts.page')

@section('title', '填寫資料')

@section('css')
<style >

.nextStep input[type="submit"]{
    position:relative;
}
#twzipcode1>div,#twzipcode2>div,#twzipcode3>div{
    float:left;
}

#recipient-add_detail,#Uniform-add_detail{
    margin-top:0px!important;
}
.uniform-hide{
    display:none!important;
}
.uniform-hide.uniform-show{
    display:block!important;
    display:flex!important;
}
</style>
@endsection

@section('content')
<article class="checkout">
    <div class="stepContainer step2">
        <div class="step active" step-title="商品確認">
            1
        </div>
        <div class="step active" step-title="付款方式">
            2
        </div>
        <div class="step active" step-title="填寫資料">
            3
        </div>
        <div class="step" step-title="確認訂單">
            4
        </div>
        <div class="step" step-title="完成訂單">
            5
        </div>
    </div>
    <h2>填寫資料</h2>
    <form method="post" action="{{ url('checkDelivery') }}">
        {!! csrf_field() !!}
        <section class="orderInfo">
            <h4>訂購人資料</h4>
            <div class="formContainer ">
                <div class="left">
                    <div class="box">
                        <div class="title">
                            <label for="fullName" class="text-right middle"><i>*</i>姓名</label>
                        </div>
                        <div class="content">
                            <input type="text" id="fullName" name="name"  value="{{$user->name}}" aria-describedby="mailHelpText" required>
                        </div>
                    </div>
                    <div class="box">
                        <div class="title">
                            <label for="title" class="text-right middle"><i>*</i>稱謂</label>
                        </div>
                        <div class="content">
                            <select id="title" name="title">
                                <option value="{{$user->title}}">{{$user->title}}</option>
                                <option value="先生">先生</option>
                                <option value="小姐">小姐</option>
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        <div class="title">
                            <label for="address" class="text-right middle"><i>*</i>地址</label>
                        </div>
                        <div class="content" id="twzipcode1">
                                <div data-role="county" data-style="city" data-name="city"></div>
                                <div data-role="district" data-style="district" data-name="area"></div>
                            <br>
                            <input type="text" id="add_detail" placeholder="" value="{{$order['address']}}" aria-describedby="mailHelpText" name="address" required>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="box">
                        <div class="title">
                            <label for="phoneNumber" class="text-right middle"><i>*</i>聯絡電話</label>
                        </div>
                        <div class="content">
                            <input type="text" id="areaNumber" placeholder="區碼" name="tel_area" aria-describedby="mailHelpText" required>
                            <input type="text" id="phoneNumber" placeholder="市話" name="tel" value="{{$order['tel']}}" aria-describedby="mailHelpText" required>
                            <p class="notice">(範例：02-12345678)</p>
                        </div>
                        <div class="title">
                            <label for="mobilePhone" class="text-right middle"></label>
                        </div>
                        <div class="content">
                            <input type="text" id="mobilePhone" placeholder="行動電話號碼" name="phone" value="{{$user->phone}}" aria-describedby="mailHelpText" >
                            <p class="notice">(手機為選填)</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="title">
                            <label for="Email" class="text-right middle">E-mail</label>
                        </div>
                        <div class="content">
                            <input type="text" id="Email" placeholder="E-mail" name="email" value="{{$user->email}}" aria-describedby="mailHelpText" required>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="recipient">
            <h4>收件人資料</h4>
            <div class="formContainer ">
                <div class="left">
                    <div class="box" id="copyform">
                        <input id="above" type="checkbox" >
                        <label for="above" >同訂購人資料 </label>
                    </div>
                    <div class="box">
                        <div class="title">
                            <label for="recipient-fullName" class="text-right middle"><i>*</i>姓名</label>
                        </div>
                        <div class="content">
                            <input type="text" id="recipient-fullName" name="to_name" placeholder="" value="{{$order['to_name']}}" aria-describedby="mailHelpText" required>
                        </div>
                    </div>
                    <div class="box">
                        <div class="title">
                            <label for="recipient-title" class="text-right middle"><i>*</i>稱謂</label>
                        </div>
                        <div class="content">
                            <select id="recipient-title" name="to_title">
                                <option value="">請選擇</option>
                                <option value="先生">先生</option>
                                <option value="小姐">小姐</option>
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        <div class="title">
                            <label for="recipient-address" class="text-right middle"><i>*</i>地址</label>
                        </div>
                        <div class="content" >
                            <!--
                        <div class="content" id="twzipcode2">
                                <div data-role="county" data-style="recipient-city" data-name="to_city"></div>
                                <div data-role="district" data-style="recipient-district" data-name="to_area"></div>
                                <br>
                            -->
                            
                            <input type="text" id="recipient-add_detail" name="to_address" value="{{$order['to_address']}}" placeholder="" aria-describedby="mailHelpText" required>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="box">
                        <div class="title">
                            <label for="recipient-phoneNumber" class="text-right middle"><i>*</i>聯絡電話</label>
                        </div>
                        <div class="content">
                            <input type="text" id="recipient-areaNumber" placeholder="區碼" name="to_tel_area" aria-describedby="mailHelpText" required>
                            <input type="text" id="recipient-phoneNumber" placeholder="市話" name="to_tel" value="{{$order['to_tel']}}" aria-describedby="mailHelpText" required>
                            <p class="notice">(範例：02-12345678)</p>
                        </div>
                        <div class="title">
                            <label for="recipient-mobilePhone" class="text-right middle"></label>
                        </div>
                        <div class="content">
                            <input type="text" id="recipient-mobilePhone" placeholder="行動電話號碼" name="to_phone" value="{{$order['to_phone']}}" aria-describedby="mailHelpText" >
                            <p class="notice">(手機為選填)</p>
                        </div>
                    </div>
                    <div class="box">
                        <div class="title">
                            <label for="recipient-Email" class="text-right middle">E-mail</label>
                        </div>
                        <div class="content">
                            <input type="text" id="recipient-Email" placeholder="收件人E-mail" name="to_email" value="{{$order['to_email']}}" aria-describedby="mailHelpText" required>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="final">
            <section class="freight">
                <h4>
                    貨運時間
                </h4>
                <div class="formContainer ">
                    <div class="left">
                        <!--<div class="box">
                            <div class="title">
                                <label for="date-delivery" class="text-right middle"><i>*</i>到貨日期</label>
                            </div>
                            <div class="content">
                                <select id="date-delivery">
                                    <option value="husker">請選擇</option>
                                </select>
                            </div>
                        </div> -->
                        <div class="box">
                            <div class="title">
                                <label for="time-delivery" class="text-right middle"><i>*</i>到貨時間</label>
                            </div>
                            <div class="content">
                                <select id="time-delivery" name="ship_time">
                                    <option value="不指定">不指定</option>
                                    <option value="下午13:00前">下午13:00前</option>
                                    <option value="14時~18時(最晚配送時段)">14時~18時(最晚配送時段)</option>
                                </select>
                            </div>
                        </div>
                        <ul class="notice">
                            <li>貨運公司因每日貨量、交通或突發天候因素，有延遲送達的情況，敬請見諒。</li>
                            <li>離島及偏遠地區配送，依貨運公司安排，可能延遲1~2天。</li>
                        </ul>
                    </div>
                    <div class="cf"></div>
                </div>
            </section>
            <section class="invoice">
                <h4>
                    發票地址
                </h4>
                <div class="formContainer ">
                    <div class="left">
                        <fieldset class="">
                            <input id="radio_1" type="radio" onclick="closeBox();" value="發票隨貨附(同收件人)" name="invoice" checked>
                            <label for="radio_1" onclick="closeBox();">發票隨貨附(同收件人)</label>
                            <br class="mobileShow">
                            <input id="radio_2" type="radio" value="發票另寄" name="invoice" onclick="openBox();">
                            <label for="radio_2" onclick="openBox();">發票另寄</label>
                        </fieldset>
                        <div class="box ">
                            <div class="title">
                                <label for="Uniform2" class="text-right middle">公司抬頭</label>
                            </div>
                            <div class="content">
                                <input type="text" id="Uniform2" placeholder="" name="uniform_title" aria-describedby="mailHelpText">
                            </div>
                        </div>
                        <div class="box ">
                            <div class="title">
                                <label for="Uniform" class="text-right middle">統一編號</label>
                            </div>
                            <div class="content">
                                <input type="text" id="Uniform" placeholder="" name="uniform" aria-describedby="mailHelpText">
                            </div>
                        </div>
                        
                        <!---->
                        <div class="box uniform-hide">
                            <div class="title">
                                <label for="Uniform-name" class="text-right middle">收件人姓名</label>
                            </div>
                            <div class="content">
                                <input type="text" id="Uniform-name" name="uniform_name" placeholder="" aria-describedby="mailHelpText">
                            </div>
                        </div>
                        <div class="box uniform-hide">
                            <div class="title">
                                <label for="Uniform-address"  class="text-right middle">地址</label>
                            </div>
                            
                            <div class="content">
                                <!--
                                     <div class="content" id="twzipcode3">
                                <div data-role="county" data-style="Uniform-city" data-name="country"></div>
                                <div data-role="district" data-style="Uniform-district" data-name="area"></div>
                                <br>
                                -->
                                <input type="text" id="Uniform-add_detail" name="uniform_address" placeholder="" aria-describedby="mailHelpText">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="cf"></div>
            </section>
        
            
        
        </div>

        <section class="recipient">
            <h4>特殊需求備註</h4>
            <div class="formContainer ">
            <textarea rows="3" name="remark"></textarea>
            </div>
        </section>

        <div class="btnContainer">
            <a href="{{url('cart')}}" class=" prevStep btnbox">上一步
                        <span class="line1">  </span>
            <span class="line2">  </span></a>
            <a class="btnbox nextStep" href="javascript:;">
            <input  class="send btnbox" tabindex="3" type="submit" value="下一步">
            <span class="line1">  </span>
            <span class="line2">  </span>
        </a>
        </div>
        <br>
    </form>
</article>

@endsection

@section('script')
<script src="{{url('js/page/checkout.js')}}"></script>
<script src="{{url('js/jquery.twzipcode-1.7.14.js')}}"></script>
<script>
    function openBox(){
        $('.uniform-hide').addClass('uniform-show');
    } 
    function closeBox(){
        $('.uniform-hide').removeClass('uniform-show');
    } 

    $('#twzipcode1').twzipcode({
        'detect': true ,
        'zipcodeIntoDistrict':true
    });

    

    $('#copyform').click(function(){
        $('#recipient-fullName').val($('#fullName').val());
        $('#recipient-areaNumber').val($('#areaNumber').val());
        $('#recipient-phoneNumber').val($('#phoneNumber').val());
        $('#recipient-mobilePhone').val($('#mobilePhone').val());
        $('#recipient-Email').val($('#Email').val());
        $('#recipient-add_detail').val($('#city').val()+$('#district').val()+$('#add_detail').val());
        //$('#recipient-city').val($('#city').val());
        //$('#recipient-district').val($('#district').val());
        //$('#recipient-title option').attr("selected",false);
        //console.log($('#title').val());
        $("#recipient-city").find("option[value='"+$('#city').val()+"']").attr("selected",true);
        //$("#recipient-district").find("option[value='"+$('#district').val()+"']").attr("selected",true);
        $("#recipient-title").find("option[value='"+$('#title').val()+"']").attr("selected",true);
    })

 </script>

@endsection