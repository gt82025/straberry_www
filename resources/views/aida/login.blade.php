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
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ url('/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ url('/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ url('/assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="{{ url('/assets/pages/css/login-4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style type="text/css">
            h1{
                color: #fff;
                font-weight: normal;
                font-size: 26px;
            }
            h1 b{
                color: #ff3db4;
                font-weight: normal;
            }
            .login .content .form-actions .btn{
                width: 100%;
                margin-top: 60px;
                margin-bottom: 20px;         
                background-color: #ff3db4;
                border-color: #ff3db4;
            }
            .login .content{
                width: 400px;
                margin: 0 auto;
                padding: 20px 40px 70px;

            }
            .login .copyright{
                text-align:left;
                padding:0px;
            }
            .login .content label, .login .content p{
                margin-top:0px;
            }
            @media (max-width: 480px){
                
                .login .content {
                    padding: 30px;
                    width: 92%;
                }
            }
            
        </style>

        </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <h1> AiDA.<b>Minerva</b></h1>
            
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" role="form" method="POST" action="{{ url('/AIDA/login') }}">
                {!! csrf_field() !!}
                <h3 class="form-title">Login to your account</h3>
                @if (session('message'))
                <div class="alert alert-danger">
                    <span> {{ session('message') }}  </span>
                </div>
                @endif
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="username" /> </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" /> </div>
                </div>
                <div class="form-actions">
                    
                    <button type="submit" class="btn blue-hoki pull-right"> Login </button>
                </div>
                
                <div class="forget-password">
                    <h4>Forgot your password ?</h4>
                    <p> no worries, click 
                        <a title="美珍設計" href="https://www.messenger.com/t/tgderdesign/" target="_blank"> here </a> to reset your password. </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
            <!-- BEGIN COPYRIGHT -->
            <div class="copyright"> 
                2017 &copy; Majors Design - <br>
                Artificial Intelligence Digital Assistant. Minerva.221b. 
            </div>
            <!-- END COPYRIGHT -->
        </div>
        <!-- END LOGIN -->
        <!--[if lt IE 9]>
        <script src="../assets/global/plugins/respond.min.js"></script>
        <script src="../assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{ url('/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ url('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
        <script src="{{ url('/assets/global/plugins/backstretch/jquery.backstretch.min.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ url('/assets/pages/scripts/login-4.min.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>
</html>