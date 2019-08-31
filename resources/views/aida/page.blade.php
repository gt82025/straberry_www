<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zh-Hant">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>AiDA.Sherlock | Content Management System</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <!-- BEGIN GLOBAL MANDATORY STYLES 
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        -->
        <link href="../../../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <!-- VUE switch 載入
        <link href="../../../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        -->
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../../../../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
		

        <!-- date picker -->
        <link href="../../../../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- color picker -->
        <link href="../../../../assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/jquery-minicolors/jquery.minicolors.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap select -->
        <link href="../../../../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap tags -->
        <link href="../../../../assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap upload -->
        <!-- bootstrap-toastr -->
        <link href="../../../../assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
		
		<!-- multiple select -->
		<link href="../../../../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/jquery-multi-select/css/multi-select.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../../../../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../../../../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../../../../assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css" />

        <link href="../../../../assets/layouts/layout/css/themes/darkblue.min.css" rel="stylesheet" type="text/css" id="style_color">
        <link href="../../../../assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-fixed">
        <!-- BEGIN HEADER -->
        <div id="loading"></div>
        <div id="app">
            
            <!-- BEGIN HEADER INNER -->
            <my-header></my-header>
            <!-- END HEADER INNER -->
            
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container form">
            <!-- BEGIN SIDEBAR -->
            <my-sider></my-sider>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <form  class="form-horizontal form-bordered" action="api/post" method="POST" role="form" id="form">
            {{csrf_field()}}
            <router-view></router-view>
            </form>
            <!-- END CONTENT -->
            
            <!-- BEGIN QUICK SIDEBAR --><!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <my-footer></my-footer>
       
        <!-- END FOOTER -->
        </div>
        <!--[if lt IE 9]>
        <script src="../../../../../../assets/global/plugins/respond.min.js"></script>
        <script src="../../../../../../assets/global/plugins/excanvas.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../../../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
  
        <script src="../../../../assets/global/plugins/tinymce/tinymce.min.js"></script>
        <script src="../../../../assets/global/plugins/tinymce/plugins/moxiemanager/js/moxman.loader.min.js"></script> 
        <!--BEGIN VUE DATEE PICKER is not a function-->
        <script src="../../../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!--END VUE DATEE PICKER is not a function-->
        <!--END DATEE PICKER is not a function -->
        <script src="{{ url('/assets/aida/js/pages.js') }}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS-->

        <script src="../../../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/scripts/app.min.js" type="text/javascript"></script>
        
        <script src="../../../../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <script>
            setTimeout(function() {
               $('#loading').fadeOut(); 
            }, 1000);
        </script>
        <!--
        <script src="../../../../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../../../../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/scripts/haschange.js" type="text/javascript"></script>
        <script src="../../../../assets/global/scripts/common.js" type="text/javascript"></script>
         -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.min.js"></script>
    </body>

</html>

