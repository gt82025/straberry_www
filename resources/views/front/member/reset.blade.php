@extends('layouts.home')

@section('title', '修改密碼 - ')



@section('content')
<section class="container-fluid mt-50">
    <div class="categories-nav categories-list">
        <ul class="text-center row">
            <li class="col-sm-3"><a href="member" >修改資料</a></li>
            <li class="col-sm-3"><a href="record">訂單紀錄</a></li>
            <li class="col-sm-3"><a href="password" class="active">修改密碼</a></li>
            <li class="col-sm-3"><a href="logout">會員登出</a></li>
        </ul>
        <div class="dropdown">
            <button class="dropbtn">修改密碼 <i class="arrow icon down"></i></button>
            <div class="dropdown-content">
                <a href="member">修改資料</a>
                <a href="record">訂單紀錄</a>
                <a href="{{url('logout')}}">會員登出</a>
            </div>
        </div>
    </div>
    <div class="row login">
        <div class="col-md-8 col-md-offset-2">
        @if (count($errors) >0)
        <div class="alert alert-danger">
          
          @if ($errors->has('password'))
          <strong>{{ $errors->first('password') }}</strong>
          @endif
          
        </div>
        @endif
        <form accept-charset="UTF-8" action="{{url('reset')}}" class="main-form" id="new_spree_user" method="post">
        {!! csrf_field() !!}
            <div class="bg">
                <div class="form-group">
                    <label for="exampleInput8">新密碼</label>
                    <input type="password" class="form-control" id="exampleInput8" >
                </div>

                <div class="form-group">
                    <label for="exampleInput6">確認新密碼</label>
                    <input type="password" class="form-control" id="exampleInput6" >
                </div>
                
                
                <div class="form-group login-submit">
                    <input class="btn btn-default " name="commit" tabindex="3" type="submit" value="變更密碼">
                    
                </div>
                
            </div>
        </form>
        </div>
    </div>

</section>

@endsection
