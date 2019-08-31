@extends('layouts.home')

@section('title', '聯繫客服 - ')

@section('css')
<link type="text/css" rel="stylesheet" href="{{url('dist/css/cart.min.css')}}">

@endsection


@section('content')
<section class="projecttop"></section>
  <section class="cart_content">
    <div class="cartcenter">
      <h2 class="member_pagename">聯繫客服</h2>
      <h5 class="member_pagetext pc">您好，感謝您對我們的支持，有任何產品相關問題，<br>請填寫以下表格，我們會盡速回覆您，謝謝!</h5>
      <h5 class="member_pagetext mo">您好，感謝您對我們的支持，有任何產品相關問題，請填寫以下表格，我們會盡速回覆您，謝謝!</h5>
      <div class="member_center">
        <form accept-charset="UTF-8" action="{{url('contact')}}"  method="post">
        {!! csrf_field() !!}
        @if (session('error'))
        <div class="alert alert-danger">
            <strong> {{ session('error') }} </strong>
        </div>
        @endif

        @if (session('status'))
        <div class="alert alert-success">
            <strong> {{ session('status') }} </strong>
        </div>
        @endif
        <div class="guestarea note">
          <h6 class="note">( <span>*</span> 欄位為必填 )</h6>
        </div>
        <div class="guestarea noline">
          <div class="guest_msg helf">
            <h6 class="msgtitle"><span>*</span> 聯絡人 Your Name</h6>
            <input class="msgtext" type="text" name="name" required>
          </div>
          <div class="guest_msg helf right">
            <h6 class="msgtitle">性別 Gender</h6>
            <label class="radiobox">
              <input type="radio" name="gender">
              <h6>男性</h6>
            </label>
            <label class="radiobox">
              <input type="radio" name="Gender">
              <h6>女性</h6>
            </label>
          </div>
          <div class="guest_msg helf">
            <h6 class="msgtitle">手機號碼 Mobile</h6>
            <input class="msgtext" type="text" name="phone" >
          </div>
          <div class="guest_msg helf right">
            <h6 class="msgtitle">連絡信箱 E-mail</h6>
            <input class="msgtext" type="text" name="email" >
          </div>
          <div class="guest_msg helf">
            <h6 class="msgtitle"><span>*</span> 聯絡事項 Subject</h6>
            <select class="msgtext" name="subject" >
              <option value="聯繫客服">聯繫客服</option>
           
            </select>
          </div>
          <div class="guest_msg helf right">
            <h6 class="msgtitle">標題 Title</h6>
            <input class="msgtext" type="text" name="title" >
          </div>
        </div>
        <div class="guestarea textarea">
          <div class="guest_msg">
            <h6 class="msgtitle"><span>*</span> 內容 Message</h6>
            <textarea class="msgtext" name="" cols="30" rows="10" name="message" required></textarea>
          </div>
        </div>
        <div class="guestarea">
          <div class="guest_msg helf">
            <h6 class="msgtitle"><span>*</span> 驗證碼 Verification code</h6>
            <input class="txtCode msgtext" id="Text3" type="text" name="code" required>
            <input type="hidden" name="digi" class="digi">
          </div>
          <div class="guest_msg helf right">
            <h6 class="msgtitle"> </h6>
            <canvas id="canvas" width="120" height="45"></canvas>
            <p id="randomword"><i class="randomicon be-icon be-icon-random"></i>換一組</p>
          </div>
        </div>
        <div class="cart_buttonbox">
          <input class="linkbutton" type="reset"  value="取消重填">
          <!--
          <a class="linkbutton" href=""><i class="buttonicon be-icon be-icon-closeicon"></i>
            <p>取消重填</p>
          </a>
          -->
          <input class="linkbutton" type="submit"  value="完成送出">
          <!--
          <a class="linkbutton" href="index.html">
            <p>完成送出</p><i class="buttonicon be-icon be-icon-cartstep4"></i>
          </a>
-->
        </div>
        </form>



      </div>
    </div>
  </section>
  <section class="mapbox">
    <iframe
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.44972820871!2d121.1071079150059!3d25.01880748397937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468266e8ed867c1%3A0xf88eb1084efb10a7!2zMzI45qGD5ZyS5biC6KeA6Z-z5Y2A6YeR5qmL6Lev6IKy5LuB5q61MTIy6Jmf!5e0!3m2!1szh-TW!2stw!4v1564915913484!5m2!1szh-TW!2stw"
      frameborder="0" style="border:0" allowfullscreen></iframe>
  </section>
@endsection

@section('script')
<script type="text/javascript">
    document.getElementById("Text3").addEventListener("change", defined);
    //給輸入驗證碼的input添加監聽事件，當輸入框的值改變的時候，觸發defined()函數。
    var code = " ";
    function defined() {
      var text = document.getElementById("Text3").value.toUpperCase();
      //獲取輸入框的值，並用toUpperCase()將其轉化為大寫。
      function clearAndUpdate() {
        //定義clearAndUpdate()函數。用於在驗證碼錯誤的情況下刷新驗證碼和清空輸入框的值。
        document.getElementById("Text3").value = '';
        //清空輸入框的值。
        drawPic();
        //調用drawPic()，刷新驗證碼。
      }
      //對驗證碼進行驗證。
      if (text.length < 0) {//判斷為空的情況，彈出提示框。
        alert("請輸入驗證碼");
      } else if (text.length !== 4) {//判斷驗證碼位數不等於4的情況。
        alert("請輸入正確格式的驗證碼");
        clearAndUpdate();
      } else if (text == code) {//比較驗證碼
        alert("通過驗證");
      } else {
        alert("驗證碼錯誤");//其他情況
        clearAndUpdate();
      }
    }
    //下面是生成驗證碼的代碼，是利用畫布生成類似圖片的驗證碼。
    //生成一個隨機數
    function randomNum(min, max) {
      return Math.floor(Math.random() * (max - min) + min);//在max和min之間生成隨機數。
    }
    //生成一個隨機色
    function randomColor(min, max) {//採用rgb顏色，注意顏色是0-255。
      var r = randomNum(min, max);
      var g = randomNum(min, max);
      var b = randomNum(min, max);
      return "rgb(" + r + "," + g + "," + b + ")";
    }
    drawPic();
    //點擊驗證碼，則刷新驗證碼
    document.getElementById("randomword").onclick = function (e) {
      e.preventDefault();
      drawPic();
    };
    //繪製驗證碼圖片
    function drawPic() {
      var canvas = document.getElementById("canvas");//獲取畫布容器
      var width = canvas.width;//分別獲取畫布的寬和高。
      var height = canvas.height;
      var ctx = canvas.getContext('2d');//獲取該canvas的2D繪圖環境對象
      ctx.textBaseline = 'bottom';//設置文本基線是畫布的底部。
      //繪製背景色
      ctx.fillStyle = randomColor(200, 240); //顏色若太深可能導致看不清
      ctx.fillRect(0, 0, width, height);//畫出矩形，要記得ctx.fillStyle放在ctx.fillRect哦。
      //繪製文字
      var str = 'ABCEFGHJKLMNPQRSTWXY123456789';//選擇全部大寫字母和數字，這下知道為啥要把獲取的值轉化為大寫了吧。
      code = "";//定義一個變量code用於存儲生成的驗證碼。
      for (var i = 0; i < 4; i++) {//這裡i<4是生成4位數的驗證碼。
        var txt = str[randomNum(0, str.length)];//隨機獲取str的一個元素。
        code += txt;//將元素加入到code里。
        ctx.fillStyle = randomColor(50, 160); //隨機生成字體顏色
        ctx.font = randomNum(15, 30) + 'px SimHei'; //隨機生成字體大小
        var x = 10 + i * 25;//元素在水平方向上的位置。
        var y = randomNum(25, 35);//元素在豎直方向上的位置，儘量保持在中間，防止部分元素在畫布外。
        var deg = randomNum(-45, 45);//隨機生成旋轉角度。
        //修改坐標原點和旋轉角度
        ctx.translate(x, y);//平移元素
        ctx.rotate(deg * Math.PI / 180);//旋轉元素
        ctx.fillText(txt, 0, 0);
        //恢復坐標原點和旋轉角度
        ctx.rotate(-deg * Math.PI / 180);
        ctx.translate(-x, -y);
      }
      //繪製干擾線
      for (var i = 0; i < 2; i++) {
        ctx.strokeStyle = randomColor(40, 180);//干擾線顏色。
        ctx.beginPath();//開始繪製。
        ctx.moveTo(randomNum(0, width), randomNum(0, height));//起點位置
        ctx.lineTo(randomNum(0, width), randomNum(0, height));//終點位置
        ctx.stroke();
      }
      /**繪製干擾點**/
      for (var i = 0; i < 50; i++) {
        ctx.fillStyle = randomColor(0, 255);
        ctx.beginPath();
        ctx.arc(randomNum(0, width), randomNum(0, height), 1, 0, 2 * Math.PI); // 繪製點，下面說arc函數。
        ctx.fill();
      }
      $('.digi').val(code);
    }
    $(document).ready(function () {

    });
  </script>
<script src="{{url('assets/js/common.js')}}"></script>
@endsection
