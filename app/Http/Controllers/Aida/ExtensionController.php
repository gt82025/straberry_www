<?php

namespace App\Http\Controllers\Aida;

use Illuminate\Http\Request;
use DB;
//use App\Http\Controller;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Aida\AppsController;
use App\Http\Controllers\Aida\CommonController;
use App\Http\Controllers\Aida\ConfigController;

//use App\Task;

class ExtensionController extends Controller
{
    public function from($editor,$datas,$id)
    {

        foreach ($datas as $key => $value) {
            # code...
            if($value->id == $id)
            $result = json_decode(json_encode($value),true);
        }

        $datas = "";

        foreach ($editor as $key => $value) {
            if(!$id)$result[$value->field] ='';

            if(isset($value->with)){
				switch ($value->editor) {
					case 'select':
						$select = DB::table($value->with)->where('published', 1)->get();
					break;

                    case 'multiple':
                        $select = DB::table($value->with)->where('published', 1)->get();
                    break;
					
					case 'spec': 
						$table = DB::table($value->with)->where('product_id', $id)->get();
						$header = explode(',',$value->with_header);
						$field = explode(',',$value->with_field);
					break;

                    case 'orderDetail':
						$table = DB::table($value->with)->where('order_id', $id)->get();
						$header = explode(',',$value->with_header);
						$field = explode(',',$value->with_field);
					break;
					
					default:
				}
			
			}
            //$result[$value->field] = DB::table($value->with)->where('published', 1)->get();
            

            switch ($value->editor) {

                //輸入筐
                case 'input':
                    $datas .= 
                    '<div class="form-group">'.
                        '<label class="col-md-2 control-label">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<div class="input-icon left">'.
                                '<i class="fa fa-edit"></i>'.
                                '<input type="text" class="form-control" name="'.$value->field.'" value="'.$result[$value->field].'">'.
                            '</div>'.
                        '</div>'.
                    '</div>';
                break;
				//輸入筐
                case 'currency':
                    $datas .= 
                    '<div class="form-group">'.
                        '<label class="col-md-2 control-label">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<div class="input-icon left">'.
                                '<i class="fa fa-usd"></i>'.
                                '<input type="text" class="form-control" name="'.$value->field.'" value="'.$result[$value->field].'">'.
                            '</div>'.
                        '</div>'.
                    '</div>';
                break;
				//連結輸入框
                case 'url':
                    $datas .= 
                    '<div class="form-group">'.
                        '<label class="col-md-2 control-label">'.$value->header.'</label>'.
                        '<div class="col-md-8 ">'.
							'<div class="input-group">'.
							'<input type="text" class="form-control" name="'.$value->field.'" value="'.$result[$value->field].'">'.
							'<span class="input-group-btn">'.
								'<a href="'.$result[$value->field].'" class="btn green" target="_blank">'.
									'<i class="fa fa-link"></i> 預覽連結 </a>'.
							'</span>'.
							'</div>'.
                        '</div>'.
                    '</div>';
                break;

                //禁止輸入筐
                case 'readonly':
                    $datas .=
                    '<div class="form-group">'.
                        '<label class="col-md-2 control-label">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<input type="text" class="form-control" readonly name="'.$value->field.'" value="'.$result[$value->field].'" >'. 
                        '</div>'.
                    '</div>';
                break;
				//規格欄位
				case 'spec':
					$th = '';
                    foreach ($header as $k => $v) {
						$th .= "<th> {$v} </th>";
                    };
					
					$td = '';
					$table = json_decode(json_encode($table),true);
                    foreach ($table as $key => $val) {
						$td .= "<tr>";
						foreach ($field as $k => $v) {
							$td .= "<td> {$table[$key][$v]} </td>";
							            
						}
						$td .= '<td><a class="edit" href="javascript:;"> Edit </a></td>';
                        $td .= '<td><a class="delete" href="javascript:;"> Delete </a>
									<input type="hidden" name="spec_id" value="'.$table[$key]['id'].'"></td>';     
						$td .= "</tr>";
                    };
					
                    $datas .=
                    '<div class="form-group">'.
                        '<label class="col-md-2 control-label">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<div class="portlet-body">
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                    <button id="sample_editable_1_new" class="btn green"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                        <thead>
                                            <tr>'
											.$th.
											'<th> 編輯 </th>
											<th> 刪除 </th>
											</tr>
											
                                        </thead>
                                        <tbody>
                                           
												'.$td.'
                                            
                                        </tbody>
                                    </table>
                                </div>'. 
                        '</div>'.
                    '</div>';
                break;

                //商品清單
                case 'orderDetail':
					$th = '';
                    foreach ($header as $k => $v) {
						$th .= "<th> {$v} </th>";
                    };
					
					$td = '';
					$table = json_decode(json_encode($table),true);
                    foreach ($table as $key => $val) {
						$td .= "<tr>";
						foreach ($field as $k => $v) {
							$td .= "<td> {$table[$key][$v]} </td>";
							            
						}
						
                    };
					
                    $datas .=
                    '<div class="form-group">'.
                        '<label class="col-md-2 control-label">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<div class="portlet-body">
                                    
                                    <table class="table table-striped table-hover table-bordered" >
                                        <thead>
                                            <tr>'
											.$th.
											'</tr>
											
                                        </thead>
                                        <tbody>
											'.$td.'
                                        </tbody>
                                    </table>
                                </div>'. 
                        '</div>'.
                    '</div>';
                break;
				
				 //郵件回覆
				case 'mailto':
                    $datas .= 
                    '<div class="form-group">'.
                        '<label class="col-md-2 control-label">'.$value->header.'</label>'.
                        '<div class="col-md-8 ">'.
							'<div class="input-group">'.
							'<input type="text" class="form-control" name="'.$value->field.'" value="'.$result[$value->field].'" readonly>'.
							'<span class="input-group-btn">'.
								'<a href="mailto:'.$result[$value->field].'" class="btn green">'.
									'<i class="fa fa-paper-plane"></i> 郵件回覆 </a>'.
							'</span>'.
							'</div>'.
                        '</div>'.
                    '</div>';
                break;

                 //黑貓查詢
				case 'tracking':
                    $datas .= 
                    '<div class="form-group">'.
                        '<label class="col-md-2 control-label">'.$value->header.'</label>'.
                        '<div class="col-md-8 ">'.
							'<div class="input-group">'.
							'<input type="text" class="form-control" name="'.$value->field.'" value="'.$result[$value->field].'">'.
							'<span class="input-group-btn">'.
								'<a href="http://www.t-cat.com.tw/Inquire/Trace.aspx?no='.$result[$value->field].'" class="btn green" target="_blank">'.
									'<i class="fa fa-truck"></i> 包裹查詢 </a>'.
							'</span>'.
							'</div>'.
                        '</div>'.
                    '</div>';
                break;

                //確認筐
                case 'checked':
                    $checked = $result[$value->field]?'checked':'';
                    $datas .=
                    '<div class="form-group">'.
                        '<label class="control-label col-md-2">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            "<input name=\"".$value->field."\" type=\"checkbox\" class=\"make-switch\" data-on-color=\"success\" data-off-color=\"danger\" data-on-text=\"<i class='fa fa-check'></i>\" data-off-text=\"<i class='fa fa-times'></i>\"".$checked.">".
                        '</div>'.     
                    '</div>';
                break;

                //TAG筐
                case 'tags':
                    $datas .= 
                    '<div class="form-group">'.
                        '<label class="control-label col-md-2">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<input type="text" name="'.$value->field.'" value="'.$result[$value->field].'" data-role="tagsinput">'. 
                        '</div>'.
                    '</div>';
                break;

                //顏色選擇
                case 'rgb':
                    $datas .=
                    '<div class="form-group">'.
                        '<label class="col-md2 control-label">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<input type="text" id="hue-demo" class="form-control demo" data-control="hue" name="'.$value->field.'" value="'.$result[$value->field].'">'.
                        '</div>'.
                    '</div>';
                break;

                //日期選擇
                case 'datepicker':
                    $datas .=
                    '<div class="form-group">'.
                        '<label class="control-label col-md-2">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<div class="input-icon left">'.
                                '<i class="fa fa-calendar"></i>'.
                                '<input class="form-control form-control-inline date-picker" size="16" type="text" name="'.$value->field.'" value="'.$result[$value->field].'" readonly />'.
                            '</div>'.
                        '</div>'.
                    '</div>';
                break;

                //日期區間
                case 'dateRange':
                    $datas .=
                    '<div class="form-group">'.
                        '<label class="control-label col-md-2">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">'.
                                '<input type="text" class="form-control" name="from" >'.
                                '<span class="input-group-addon"> to </span>'.
                                '<input type="text" class="form-control" name="to"> </div>'.
                        '</div>'.
                    '</div>';
                break;
				
				case 'radio':
                    $datas .=
                    '<div class="form-group">
						<label>Inline Radio</label>
						<div class="radio-list">
							<label class="radio-inline">
								<div class="radio" id="uniform-optionsRadios4"><span class="checked"><input type="radio" name="optionsRadios" id="optionsRadios4" value="option1" checked=""></span></div> 是 </label>
							<label class="radio-inline">
								<div class="radio" id="uniform-optionsRadios5"><span class=""><input type="radio" name="optionsRadios" id="optionsRadios5" value="option2"></span></div> 是 </label>
						</div>
					</div>';
                break;

                //下拉單選
                case 'select':
                    $option = '';
                    foreach ($select as $k => $v) {
                        if($result[$value->field] == $v->id){
                            $option .= '<option value="'.$v->id.'" selected>'.$v->name.'</option>';
                        }else{
                           $option .= '<option value="'.$v->id.'">'.$v->name.'</option>';     
                        }
                        
                    };
                    $datas .=
                    '<div class="form-group">'.
                        '<label class="control-label col-md-2">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<select class="bs-select form-control" data-live-search="true" data-size="8" name="'.$value->field.'">'.
                                $option.
                            '</select>'.
                        '</div>'.
                    '</div>';
                break;

                //下拉多選
                case 'multiple':
                    $op = array();
					$ops = '';
					$selected = explode(',',$result[$value->field]);
					
                    foreach ($select as $k => $v) {
						$op[$k] ='<option value="'.$v->id.'">'.$v->name.'</option>';
						foreach ($selected as $k2 => $v2) {
							if($v->id  == $v2)
							$op[$k] ='<option value="'.$v->id.'" selected>'.$v->name.'</option>';					
						}  
                    };
					foreach ($op as $k => $v) {
						$ops .= $v;
					}

                    $datas .=
                    '<div class="form-group">'.
                        '<label class="control-label col-md-2">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.             
                            '<select multiple="multiple" class="multi-select" id="my_multi_select1" name="'.$value->field.'">'.
                                $ops.
                            '</select>'.
                        '</div>'.
                    '</div>';
                break;

                case 'editor':
                    $datas .=
                    '<div class="form-group">'.
                        '<label class="control-label col-md-2">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<textarea name="'.$value->field.'">'.$result[$value->field].'</textarea>'.
                        '</div>'.
                    '</div>';
                    
                break;
				
				

                case 'editors':
                    $datas .=
                    '<div class="form-group">'.
                        '<label class="control-label col-md-2">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<div name="summernote" id="summernote_1">'.$result[$value->field].' </div>'.
                        '</div>'.
                    '</div>';
                break;
				
				

                //禁止輸入筐
                case 'images':
                    $array = explode(',', $result[$value->field]);
                    $image = '';
					if(count($array) > 0)
                    foreach ($array as $k => $v) {
                        $image .= '<img height="100" src="'.$v.'" onclick="moxman.view({path: \''.$v.'\'});">';
                    };
                    $datas .=
                    '<div class="form-group">'.
                        '<label class="col-md-2 control-label">'.$value->header.'</label>'.
                        '<div class="col-md-8">'.
                            '<div class="input-icon left">'.
                                '<i class="fa fa-file-image-o"></i>'.
                                '<input type="text" class="form-control absurl" value="'.$result[$value->field].'">'.
                                '<input type="hidden" name="'.$value->field.'" class="image_file" value="'.$result[$value->field].'">'.
                            '</div>'.
                            //' <a href="javascript:void(0)" onclick="moxman();">GE</a>'.
                            '<div class="input-image">'.$image.'</div>'.
                        '</div>'.
                    '</div>';
                break;


                default:
                    # code...
                break;
            }
        }
        
        return $datas;

    }
}

