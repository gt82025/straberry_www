<?php

namespace App\Http\Controllers\Aida;

use Illuminate\Http\Request;
use DB;


use App\Http\Controllers\Controller;
use App\Http\Controllers\Aida\AppsController;
use App\Http\Controllers\Aida\ConfigController;
use App\Http\Controllers\Aida\ExtensionController;
use Illuminate\Support\Facades\Auth;


class CommonController extends Controller
{
    public function __construct(){
        //中介層驗證Heimdallr
        //$this->middleware('Heimdallr');
    }

    public function ajaxTable()
    {
        

        $start_date = isset($_GET['start_date'])?$_GET['start_date']:'';
        $end_date = isset($_GET['end_date'])?$_GET['end_date']:'';
        $from = $start_date.' 00:00:00';
        $to = $end_date.' 23:59:59';

        $orders = new \App\Model\Order;
        $orders = $orders::whereBetween('order_date', [$from, $to])
        ->where('payment_code','成功')
        ->orWhere('payment_code','刷卡成功')
        ->whereBetween('order_date', [$from, $to])
        ->orderBy('id','desc')
        ->get();

        $order_id = [];
        foreach ($orders as $key => $value) {
            # code...
            array_push($order_id,$value->id);
        }

        $details = new \App\Model\OrderDetail;
        $group = $details::whereIn('order_id', $order_id)
        ->selectRaw('sum(qty) AS qty, spec_id')
        ->groupBy('spec_id')
        ->get();
        //return $group;
        $ids = [];
        foreach ($group as $key => $value) {
            # code...
            array_push($ids,$value->spec_id);
        }
        $product = new \App\Model\ProductSpec;
       
        $product = $product::whereIn('id', $ids)
            ->with('product')
            ->get();

        foreach ($product as $k => $v) {
            # code...
            foreach ($group as $k2 => $v2) {
                # code...
                if($v->id == $v2->spec_id)
                $product[$k]->total = $v2;
            }
        }
        //return $product;
        return view('aida.ajaxtable',[
            'product' => $product,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);

    }
    
    public function pages()
    {
        return view('aida.page');
    }

    public function dataTable()
    {
        return view('aida.datatable');
    }

    public function sideNavs()
    {
        $app = new AppsController;
        $navs = $app->menu();
        return $navs;
    }

    public function dataTables($model)
    {
        //$app = new AppsController;
        //return $app->tableReads($table);
        //$table = DB::table($table)->get();
        //$table = "Post";
        $model = '\App\Model\\'.$model;
        $model = new $model;
        $model = $model::all();
        return $model;
    }

    public function websiteAssets($language = 'zh')
    {
      
        $app = new AppsController;
        $navs = $app->menu($language);
        $datas = '';

        return view('aida.manage',[
            'navs' => $navs,
            'datas' => $datas 
        ]);
    }


    

    public function index(Request $request)
    {
        $app = new AppsController;

        switch ($request->postType) {
            case 'tableRead':
                return $app->tableRead($request->language,$request->table);
            break;

            case 'tableEdit':
                return $app->tableEdit($request->language,$request->table,$request->id);
            break;
        
            default:
                # code...
                break;
        }
        
    }

    public function switchChange(Request $request)
    {
        $data = $request->all();
        $data['updated_at'] = date("Y-m-d H:i:s");
        $model = DB::table($request->table)->where('id', $request->id)->update($data);

        return $data;
    }

    public function multipleCopy(Request $request)
    {
        $id = explode(',', $request->id);  
        $query = DB::table($request->table)->whereIn('id', $id)->get();

        $result = array();
        foreach ($query as $key => $value) {
            $data = json_encode($query[$key]);
            $data = json_decode($data,true);
            $data['id'] = '';
            $test = DB::table($request->table)->insertGetId($data);
            array_push($result, $test);
        }
        return $result; 
    }

    public function multipleDestroy(Request $request)
    {
        
        $id = explode(',', $request->id);
        $result = DB::table($request->table)->whereIn('id', $id)->delete();
        return $result;
    }

    public function destroy(Request $request)
    {

        return DB::table($request->table)->where('id', $request->id)->delete();
    }

    public function store(Request $request)
    {
        
        if($request->id){
          
            $data = $request->all();
            $data['updated_at'] = date("Y-m-d h:i:s");
			unset($data['spec_id']);
			
            $model = DB::table($request->table)->where('id', $request->id)->update($data);
            return $model;

        }else{

            $data = $request->all();
            $data['created_at'] = date("Y-m-d h:i:s");
			unset($data['spec_id']);
			
            $id = DB::table($request->table)->insertGetId($data);
            $model = DB::table($request->table)->where('id', $id)->get();
            return $model;

        }

    }

    
}
