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
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../../../../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
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
        <link href="../../../../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

        <!-- summernote upload -->
        <link href="../../../../assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
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
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white page-sidebar-fixed">
        <!-- BEGIN HEADER
        <div id="loading"></div>
         -->
        {{csrf_field()}}
        <div id="app">
            
            <!-- BEGIN HEADER INNER -->
            <my-header></my-header>
            <!-- END HEADER INNER -->
            <router-view></router-view>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <my-sider></my-sider>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                
                    
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Managed Datatables
                        <small>Content Management System</small>
                    </h3>
                    <!-- END PAGE TITLE-->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <form id="form" action="/AIDA/AJAXTABLE">
                                            <div style="float:left" class="input-group input-large date-picker input-daterange float-left"  data-date-format="yyyy-mm-dd">
                                            <input type="text" class="form-control" name="start_date" value="{{$start_date}}">
                                                <span class="input-group-addon"> to </span>
                                            <input type="text" class="form-control" name="end_date" value="{{$end_date}}"> 
                                            </div>
                                            <button style="float:left;margin-left:5px;" class="btn btn-sm green table-group-action-submit float-left">
                                                                    <i class="fa fa-check"></i> Submit</button>
                                        </form>
                                    </div>
                                    <div class="actions">
                                        @if(count($product))
                                        <a title="匯出" class="btn btn-circle btn-icon-only btn-default" target="_blank" href="{{url('AIDA/EXPORTORDER')}}?start_date={{$start_date}}&end_date={{$end_date}}">
                                            <i class="fa fa-file-excel-o"></i>
                                        </a>
                                        @endif
                                        <!--
                                        <a title="列印" class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="fa fa-print"></i>
                                        </a>
                                        -->
                                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title="全螢幕"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    
                                    <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                        <thead>
                                            <tr>
                                                <!--
                                                <th width="50">
                                                    <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" />
                                                </th>
                                                -->
                                                <th width="100">
                                                    商品編號
                                                </th>
                                                <th width="100">
                                                    圖片
                                                </th>
                                                <th>
                                                    商品名稱
                                                </th>
                                                <th>
                                                    尺寸
                                                </th>
                                                <th>
                                                    訂單數量
                                                </th>
                                                <!--
                                                <th>
                                                    庫存參考
                                                </th>
                                                <th>
                                                    庫存參考
                                                </th>
                                                -->
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($product as $k =>$v)
                                            <tr class="odd gradeX">
                                                <!--
                                                <td width="50">
                                                    <input type="checkbox" class="checkboxes" name="id" /> 
                                                </td>
-->                                                
                                                <td><b>{{$v->number}}</b></td>
                                                <td><img src="{{url($v->product->cover)}}" width="100"></td>
                                                <td><b>{{$v->product->name}}</b></td>
                                                <td><b>{{$v->size}} / {{$v->color}}</b></td>
                                                <td><b>{{$v->total->qty}}</b></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
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
        
        <script src="{{ url('assets/aida/js/ajaxTables.js') }}" type="text/javascript"></script>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <!--
        <script src="../../../../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../../../../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        
        -->
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../../../../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS 
        <script src="../../../../assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
        -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../../../../assets/layouts/layout/scripts/layout.min.js" type="text/javascript"></script>
        <!--
        <script src="../../../../assets/layouts/layout/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../../../../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../../../../assets/global/scripts/haschange.js" type="text/javascript"></script>
        <script src="../../../../assets/global/scripts/common.js" type="text/javascript"></script>
        -->
        <script src="../../../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
       <script>
           $('.date-picker').datepicker({
            //rtl: App.isRTL(),
            orientation: "left",
            autoclose: true
        });
       
       </script>
       
        
    </body>

</html>

