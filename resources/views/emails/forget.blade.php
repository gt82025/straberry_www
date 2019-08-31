<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>會員忘記密碼</h2>
        <p>
        	親愛的{{ $name }}：<br>
        	請使用下列密碼登入重設您的新密碼<br>
			<b>新密碼：</b>{{ $password }}<br>
			<a href="{{ $link = url('login')}}" >會員登入</a>	
        </p>
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