<?php

namespace App\Http\Controllers\Aida;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Aida\AppsController;
use Illuminate\Support\Facades\Auth;


class DatasController extends Controller
{
    public function __construct(){
        //中介層驗證Heimdallr
        //$this->middleware('Heimdallr');
    }
	
	
    public function unusual($model, $id = null)
    {
        //$data = '\App\Model\\'.$model;
        //$data = new $data;
        switch ($model) {

            case 'Admin': 
                $data = [];
                $data['options'] = \App\Model\OptionCategory::with('options')->get();
                $options = [];
                $admin = Auth::guard('heimdallr')->user();
                foreach($data['options'] as $k => $v){
                    if($v->model){
                        $v->input='group_id';
                        array_push($options,$v);
                    }
                    foreach($v->options as $k2 =>$v2){
                       if($v2->model){
                        $v2->input='option_id';
                        array_push($options,$v2); 
                       }
                    } 
                }

                foreach($options as $k => $v){
                    $options[$k]['per_id'] = null;
                    $options[$k]['published'] = 0;
                    $options[$k]['admin_id'] = $admin->id;
                    $options[$k]['group_id'] = '';
                    $options[$k]['option_id'] = '';
                    if($v['input'] == 'group_id')$options[$k]['group_id'] = $v->id;
                    if($v['input'] == 'option_id')$options[$k]['option_id'] = $v->id;
                
                }
                $data['options'] = $options;
                //$data->fuck = '幹';
            break;
            
        
            default:
                $data = $id?$data::find($id):'';
            break;
        }
        //$data = $id?$data::find($id):$data::all();
        return $data;
    }


    public function pageData($model, $id = null)
    {
        $data = '\App\Model\\'.$model;
        $data = new $data;
        switch ($model) {
            case 'Product':
                $category = \App\Model\ProductCategory::all();
                $picks = \App\Model\Product::all();
                $insides = \App\Model\Product::all();
                if($id){
                    $data = $data::with(['category','orders' => function($query){
                        $query->with('order')->orderBy('order_date','desc');
                    }])->find($id);
                    if(!isset($data))return '';
                    
                    foreach($category as $k => $v){
                        if($v->id == $data->category->id)
                        $category[$k]->select = 'select';
                    } 

                    foreach($picks as $k => $v){
                        $picks[$k]['text'] = $v->name.'-'.$v->size;
                        $insides[$k]['text'] = $v->name.'-'.$v->size;

                        foreach (explode(',', $data->pick)  as $k2 => $v2) {
                            # code...
                            if($v->id == $v2)
                            $picks[$k]->select = 'select';
                        }

                        foreach (explode(',', $data->inside)  as $k3 => $v3) {
                            # code...
                            if($v->id == $v3)
                            $insides[$k]->select = '111';
                        }
                        
                    }

                }else{
                    $data = new \App\Model\Product;
                    $columns = DB::getSchemaBuilder()->getColumnListing($data->getTable());
                    foreach($columns as $k => $v){
                        $data[$v] = null;
                    } 
                }
                $data['categorys'] = $category;
                $data['picks'] = $picks;
                $data['insides'] = $insides;
            break;

            case 'ProductSpec':
                $category = \App\Model\Product::all();
                if($id){
                    $data = $data::with('product')->find($id);
                    if(!isset($data))return '';
                    foreach($category as $k => $v){
                        if($v->id == $data->product_id)
                        $category[$k]->select = 'select';
                    } 
                }else{
                    //$data = new \App\Model\Product;
                    $columns = DB::getSchemaBuilder()->getColumnListing($data->getTable());
                    foreach($columns as $k => $v){
                        $data[$v] = null;
                    } 
                }
                $data['categories'] = $category;
            break;

            case 'Post':
                $category = \App\Model\PostCategory::all();
                if($id){
                    $data = $data::with('category')->find($id);
                    if(!isset($data))return '';
                    foreach($category as $k => $v){
                        if($v->id == $data->category_id)
                        $category[$k]->select = 'select';
                    } 
                }else{
                    //$data = new \App\Model\Product;
                    $columns = DB::getSchemaBuilder()->getColumnListing($data->getTable());
                    foreach($columns as $k => $v){
                        $data[$v] = null;
                    } 
                }
                $data['categories'] = $category;
            break;

            case 'Book': case 'BookDetail':
                $category = \App\Model\BookCategory::all();
                if($id){
                    $data = $data::with('category')->find($id);
                    if(!isset($data))return '';
                    foreach($category as $k => $v){
                        if($v->id == $data->category_id)
                        $category[$k]->select = 'select';
                    } 
                }else{
                    //$data = new \App\Model\Product;
                    $columns = DB::getSchemaBuilder()->getColumnListing($data->getTable());
                    foreach($columns as $k => $v){
                        $data[$v] = null;
                    } 
                }
                $data['categories'] = $category;
            break;

            

            case 'Ship':
                $category = \App\Model\ShipCategory::all();
                $picks = \App\Model\Product::all();
                if($id){
                    $data = $data::with('category')->find($id);
                    if(!isset($data))return '';
                    foreach($category as $k => $v){
                        if($v->id == $data->category_id)
                        $category[$k]->select = 'select';
                    } 

                    foreach($picks as $k => $v){
                        $picks[$k]['text'] = $v->name.'-'.$v->size;
                        $insides[$k]['text'] = $v->name.'-'.$v->size;

                        foreach (explode(',', $data->pick)  as $k2 => $v2) {
                            # code...
                            if($v->id == $v2)
                            $picks[$k]->select = 'select';
                        }

                        foreach (explode(',', $data->inside)  as $k3 => $v3) {
                            # code...
                            if($v->id == $v3)
                            $insides[$k]->select = '111';
                        }
                        
                    }

                }else{
                    //$data = new \App\Model\Product;
                    $columns = DB::getSchemaBuilder()->getColumnListing($data->getTable());
                    foreach($columns as $k => $v){
                        $data[$v] = null;
                    } 
                }
                $data['picks'] = $picks;
                $data['categories'] = $category;
            break;

            case 'Design':
                $category = \App\Model\DesignCategory::all();
                if($id){
                    $data = $data::with('category')->find($id);
                    if(!isset($data))return '';
                    foreach($category as $k => $v){
                        if($v->id == $data->category_id)
                        $category[$k]->select = 'select';
                    } 
                }else{
                    //$data = new \App\Model\Product;
                    $columns = DB::getSchemaBuilder()->getColumnListing($data->getTable());
                    foreach($columns as $k => $v){
                        $data[$v] = null;
                    } 
                }
                $data['categories'] = $category;
            break;

            case 'User':
                $category = \App\Model\UserCategory::all();
                if($id){
                    $data = $data::with(['category','orders' => function($query){
                        $query->orderBy('order_date','desc');
                    }])->find($id);
                    if(!isset($data))return '';
                    
                    foreach($category as $k => $v){
                        if($v->id == $data->category->id)
                        $category[$k]->select = 'select';
                    } 
                }else{
                    //$data = new \App\Model\Product;
                    $columns = DB::getSchemaBuilder()->getColumnListing($data->getTable());
                    foreach($columns as $k => $v){
                        $data[$v] = null;
                    } 
                }
                $data['categories'] = $category;
            break;

            case 'Admin': 
                $data = $id?$data::with('permission')->find($id):'';
                $data->options = \App\Model\OptionCategory::with(['options' => function($query){
                    $query->where('published',1);
                }])->get();
                $options = [];
                $admin = Auth::guard('heimdallr')->user();
                foreach($data->options as $k => $v){
                    if($v->model){
                        $v->input='group_id';
                        array_push($options,$v);
                    }
                    foreach($v->options as $k2 =>$v2){
                       if($v2->model){
                        $v2->input='option_id';
                        array_push($options,$v2); 
                       }
                    } 
                }

                foreach($options as $k => $v){
                    $options[$k]['per_id'] = null;
                    $options[$k]['published'] = 0;
                    $options[$k]['admin_id'] = $admin->id;
                    $options[$k]['group_id'] = '';
                    $options[$k]['option_id'] = '';
                    if($v['input'] == 'group_id')$options[$k]['group_id'] = $v->id;
                    if($v['input'] == 'option_id')$options[$k]['option_id'] = $v->id;
                    
                    foreach($data->permission as $k2 =>$v2){
                        
                        if($v['input'] == 'group_id' && $v2->group_id == $v['id']){
                            $options[$k]['per_id'] = $v2->id;
                            $options[$k]['published'] = $v2->published;
                            $options[$k]['admin_id'] = $v2->admin_id;
                        }elseif($v['input'] == 'option_id' && $v2->option_id == $v['id']){
                            $options[$k]['per_id'] = $v2->id;
                            $options[$k]['published'] = $v2->published;
                            $options[$k]['admin_id'] = $v2->admin_id;
                        }
                    } 
                }
                $data->options = $options;
                //$data->fuck = '幹';
            break;

            case 'Order':
               //$ships = \App\Model\Ship::all();
                $users = \App\Model\User::all();
                $categories = \App\Model\OrderCategory::all();
                if($id){
                    $data = $data::with(['category','detail' => function($query){
                        $query->with('product')->get();
                    }])->find($id);
                    if(!isset($data))return '';
                    
                    //foreach($ships as $k => $v){
                    //    if($v->id == $data->ship->id)
                    //    $ships[$k]->select = 'select';
                    //} 

                    foreach($categories as $k => $v){
                        if($v->id == $data->category_id)
                        $categories[$k]->select = 'select';
                    } 

                     foreach($users as $k => $v){
                        $users[$k]->name = $v->email.' ( '.$v->name.' )';
                        if($v->id == $data->user_id)
                        $users[$k]->select = 'select';
                    } 

                    
                    foreach($data->detail as $k => $v){
                        if($data->detail[$k]->detail){
                            $data->detail[$k]->detail = json_decode($data->detail[$k]->detail);
                            $detail = [];
                            foreach($data->detail[$k]->detail as $k2 => $v2){
                                //\App\Model\Product::where('id', $v2->inside0->id)->first();
                                $result =  [
                                    array(
                                        'id'=> $v2->inside0->id,
                                        'qty'=> $v2->inside0->qty,
                                        'info'=> \App\Model\Product::where('id', $v2->inside0->id)->first(),
                                    ),
                                    array(
                                        'id'=> $v2->inside1->id,
                                        'qty'=> $v2->inside1->qty,
                                        'info'=> \App\Model\Product::where('id', $v2->inside1->id)->first(),
                                    ),
                                    array(
                                        'id'=> $v2->inside2->id,
                                        'qty'=> $v2->inside2->qty,
                                        'info'=> \App\Model\Product::where('id', $v2->inside2->id)->first(),
                                    ),
                                    array(
                                        'id'=> $v2->inside3->id,
                                        'qty'=> $v2->inside3->qty,
                                        'info'=> \App\Model\Product::where('id', $v2->inside3->id)->first(),
                                    )
                                ];
                                array_push($detail,$result);
                
                            }
                           
                            $data->detail[$k]->content = $detail;
                        }
                
                    }

                    /*
                    if(!$data->allpay_logistics_id){
                        //$users = \App\Model\User::all();
                        include(app_path() . '/Http/Controllers/AioSDK/CreateShippingOrder.php'); //建立物流單
                        $shipOrder = createShippingOrder($data);

                        if(isset($shipOrder['ErrorMessage']))return 'ErrorMessage';
                        $data->allpay_logistics_id = $shipOrder['AllPayLogisticsID'];
                        //$data->tracking_code = $shipOrder['AllPayLogisticsID'];
                        $data->logistics_status = $shipOrder['RtnCode'];
                        $data->save();
                    }
                    */

                    if($data->logistics_status){
                        $app = new AppsController;
                        $LogisticsStatus = $app->checkLogisticsInfo($data->allpay_logistics_id);
                        $data['logistics_status'] = $app->checkLogisticsStatu($LogisticsStatus);
                        //$data['test'] = $LogisticsStatus;
                    }



 
                }else{
                    $columns = DB::getSchemaBuilder()->getColumnListing($data->getTable());
                    $column = [];
                    foreach($columns as $k => $v){
                        $column[$v] = null;
                    }
                    $data = $id?$data::find($id):$column;
                }
                //$data['ships'] = $ships;
                $data['users'] = $users;
                $data['categories'] = $categories;
            break;

            case 'Bonus':
                $users = \App\Model\User::all();
                $categories = \App\Model\OrderCategory::all();
                if($id){
                    $data = $data::with('user')->find($id);
                    if(!isset($data))return '';
                    
                    foreach($users as $k => $v){
                        $users[$k]->name = $v->email.' ( '.$v->name.' )';
                        if($v->id == $data->user->id)
                        $users[$k]->select = 'select';
                    } 

                }else{
                    $columns = DB::getSchemaBuilder()->getColumnListing($data->getTable());
                    $column = [];
                    foreach($columns as $k => $v){
                        $column[$v] = null;
                    }
                    $data = $id?$data::find($id):$column;
                }
                $data['users'] = $users;
             
            break;
        
            default:
                $columns = DB::getSchemaBuilder()->getColumnListing($data->getTable());
                $column = [];
                foreach($columns as $k => $v){
                    $column[$v] = null;
                    if($v == 'published')$column['published'] = 0;
                } 
                $data = $id?$data::find($id):$column;
                
            break;
        }
        //$data = $id?$data::find($id):$data::all();
        return $data;
    }

    public function copy(request $request,$model)
    {   
        $request = $request->all()['form'];
        $data = '\App\Model\\'.$model;
        $data = new $data;

        switch ($model) {

            case 'Admin': 
                $data = $data::find($request['id']);
                //驗證密法是否需要重新加密';
                $request['password'] = Hash::needsRehash($request['password']) ? Hash::make($request['password']):$request['password'];
                //$request->email = $request->email.'(複製)';
            break;
            
        
            default:
                $data = $data::find($request['id']);
            break;
        }

        $keys = DB::getSchemaBuilder()->getColumnListing($data->getTable());
        

        foreach($keys as $k => $v){
            if(isset($request[$v]))
            $data->$v = $request[$v];
        }
        //$data->email = $data->email.'(複製)';
        if(isset($data->name))$data->name = $data->name.'(複製)';
        if(isset($data->title))$data->title = $data->name.'(複製)';
        
        $data = $data->replicate();
        $data->save();
        return $data;
    }

    public function multipleCopy(request $request,$model)
    {   
        $request = $request->all()['form'];
        $route = '\App\Model\\'.$model;
       

        foreach($request['id'] as $k =>$v){
            $data = new $route;
            switch ($model) {

                case 'Admin': 
                    $data = $data::find($v);
                    $data->email = $data->email.'(複製)';
                break;
                
            
                default:
                    $data = $data::find($v);
                break;
            }

            if(isset($data->name))$data->name = $data->name.'(複製)';
            if(isset($data->title))$data->title = $data->name.'(複製)';
            $data = $data->replicate();
            $data->save();
        }
        
        return $data;
    }

    public function multipleDestroy(request $request,$model)
    {   
        $request = $request->all()['form'];
        $route = '\App\Model\\'.$model;
      
        foreach($request['id'] as $k =>$v){
            $data = new $route;
            switch ($model) {

                case 'Admin': 
                    $deletedRows = \App\Model\AdminPermission::where('admin_id', $v)->delete();
                break;
                
                case 'User': 
                    $orders = \App\Model\Order::where('user_id', $v)->get();
                    foreach ($orders as $k2 => $v2) {
                        # code...
                        $deletedRows = \App\Model\OrderDetail::where('order_id', $v2->id)->delete();
                    }
                    $deletedRows = \App\Model\Order::where('user_id', $v)->delete();
                    $deletedRows = \App\Model\SocialAccount::where('user_id', $v)->delete();
                    //$deletedRows = \App\Model\AdminPermission::where('admin_id', $v)->delete();
                break;

                case 'Order': 
                    $deletedRows = \App\Model\OrderDetail::where('order_id', $v)->delete();
                    //$deletedRows = \App\Model\Bonus::where('order_id', $v)->delete();
                    //$deletedRows = \App\Model\AdminPermission::where('admin_id', $v)->delete();
                break;

                //case 'Product': 
                    //$deletedRows = \App\Model\ProductSpec::where('product_id', $v)->delete();
                    //$deletedRows = \App\Model\AdminPermission::where('admin_id', $v)->delete();
                //break;

                default:
                    //$data = $data::find($request['id']);
                break;
            }
            $data::destroy($v);
           
        }
        return $data;
    }

    public function destroy(request $request,$model)
    {   
        $request = $request->all()['form'];
        $data = '\App\Model\\'.$model;
        $data = new $data;

        //記錄毀滅者
        $user = Auth::guard('heimdallr')->user();
        $destroyer = $data::find($request['id']);
        $destroyer->editor_id = $user->id;
        $destroyer->save();

        switch ($model) {

            case 'Admin': 
                 $deletedRows = \App\Model\AdminPermission::where('admin_id', $request['id'])->delete();
            break;
            
			 case 'Order': 
				$deletedRows = \App\Model\OrderDetail::where('order_id', $request['id'])->delete();
				//$deletedRows = \App\Model\Bonus::where('order_id', $request['id'])->delete();
				//$deletedRows = \App\Model\AdminPermission::where('admin_id', $v)->delete();
			break;
			
            default:
                //$data = $data::find($request['id']);
            break;
        }

        $data::destroy($request['id']);
        return $data;
    }

    public function publishChange(request $request,$model)
    {   
        $request = $request->all()['o'];
       
        $data = '\App\Model\\'.$model;
        $data = new $data;
        $data = $data::find($request['id']);
        $data->published = $request['published'];
        $data->save();
        return $data;
    }

    public function store(request $request,$model)
    {   
        $request = $request->all()['form'];
        
        $data = '\App\Model\\'.$model;
        $data = new $data;
        $keys = DB::getSchemaBuilder()->getColumnListing($data->getTable());
        $user = Auth::guard('heimdallr')->user();
        switch ($model) {
            case 'Order':
            
                $data = isset($request['id'])?$data::find($request['id']):$data;
                foreach($keys as $k => $v){
                    //if(isset($request[$v]))
                    if(array_key_exists($v, $request))
                    $data->$v = $request[$v];
                }
                $data->save();
                
				//$app = new AppsController;
                //$sendStatus = $app->sendStatus($data);
				

                foreach($request['orderdetails'] as $k => $v){
                    //if(isset($request[$v]))
                    $detail = \App\Model\OrderDetail::find($v['id']);
                    $detail->status = $v['status'];
                    $detail->save();
                }
                

                return $data;
            break;

            case 'Admin': 
                $data = isset($request['id'])?$data::find($request['id']):$data;
                //驗證密法是否需要重新加密';
                $request['password'] = Hash::needsRehash($request['password']) ? Hash::make($request['password']):$request['password'];
                foreach($keys as $k => $v){
                    if(array_key_exists($v, $request))
                    $data->$v = $request[$v];
                }
                $data->save();
                $pRoute = '\App\Model\AdminPermission';
                $permission = new $pRoute;
                $pKey = DB::getSchemaBuilder()->getColumnListing($permission->getTable());
                foreach($request['permission'] as $k => $v){
                    $item = $v['id']?$permission::find($v['id']):new $pRoute;
                    $item->published = $v['published'];
                    $item->admin_id = $v['admin_id']?$v['admin_id']:$data->id;
                    $item->option_id = $v['option_id'];
                    $item->group_id = $v['group_id'];
                    $item->save();
                }
                return $data;
            break;
            /*
            case 'Product': 
                $data = isset($request['id'])?$data::find($request['id']):$data;
                foreach($keys as $k => $v){
                    if(array_key_exists($v, $request))
                    $data->$v = $request[$v];
                }
                $data->save();
                //規格
                $pRoute = '\App\Model\ProductSpec';
                $spec = new $pRoute;
                $pKey = DB::getSchemaBuilder()->getColumnListing($spec->getTable());
                //先撈出現有資料對比刪除
                $oldSpec = $spec::where('product_id', $data->id)->get();
                $deleteSpec = [];
            
                if(count($oldSpec)){
                    foreach($oldSpec as $k => $v){
                        $has = false;
                        foreach($request['spec'] as $k2 => $v2){
                            
                            if($v->id == $v2['id'] || !$v2['id']){
                                $item = $v2['id']?$spec::find($v2['id']):new $pRoute;
                                $item->product_id = $data->id;
                                $item->name = $v2['name'];
                                $item->size = $v2['size'];
                                $item->price = $v2['price'];
                                
                                $item->save();
                                $request['spec'][$k2]['id'] = $item->id;
                                $has = true;
                            } 
                        }
                        if(!$has)$deleteSpec = \App\Model\ProductSpec::destroy($v['id']);
                    }
                }else{
                    foreach($request['spec'] as $k2 => $v2){  
                        $item = $v2['id']?$spec::find($v2['id']):new $pRoute;
                        //return $data;
                        $item->product_id = $data->id;
                        $item->name = $v2['name'];
                        $item->size = $v2['size'];
                        $item->price = $v2['price'];
                        //$item->price = $v2['price'];
                        //$item->on_sale = $v2['on_sale'];
                        $item->save();
                        $request['spec'][$k2]['id'] = $item->id;
                    }
                }
                
                //庫存
                /*
                $sRoute = '\App\Model\ProductStock';
                $stock = new $sRoute;
                $pKey = DB::getSchemaBuilder()->getColumnListing($stock->getTable());
                //先撈出現有資料對比刪除
                $oldStock = $stock::where('product_id', $data->id)->get();
                $deleteSpec = [];
                if(count($oldStock)){
                    foreach($oldStock as $k => $v){
                        $has = false;
                        foreach($request['stock'] as $k2 => $v2){
                            if($v->id == $v2['id'] || !$v2['id']){
                                $item = $v2['id']?$stock::find($v2['id']):new $sRoute;
                                $item->product_id = $data->id;
                                $item->purchase_at = $v2['purchase_at'];
                                $item->spec_id = $v2['spec_id'];
                                $item->qty = $v2['qty'];
                                //$item->pre_qty = $v2['pre_qty'];                           
                                $item->save();
                                $request['stock'][$k2]['id'] = $item->id;
                                $has = true;
                            } 
                        }
                        if(!$has)$deleteSpec = \App\Model\ProductStock::destroy($v['id']);
                    }
                }else{
                    foreach($request['stock'] as $k2 => $v2){
                        $item = $v2['id']?$stock::find($v2['id']):new $sRoute;
                        $item->product_id = $data->id;
                        $item->purchase_at = $v2['purchase_at'];
                        $item->spec_id = $v2['spec_id'];
                        $item->qty = $v2['qty'];
                        //$item->pre_qty = $v2['pre_qty'];                           
                        $item->save();
                        $request['stock'][$k2]['id'] = $item->id;
                        $has = true;
                       
                    }
                }
                /////////
                //return $deleteSpec;
                //$data = $data::with('spec','stock')->find($data->id);
                return $data;
            break;
            */
            case 'Coupon':
            
                $data = isset($request['id'])?$data::find($request['id']):$data;
                foreach($keys as $k => $v){
                    //if(isset($request[$v]))
                    if(array_key_exists($v, $request))
                    $data->$v = $request[$v];
                    if($v == 'name' && !$data->name)
                    $data->$v = date('Y-m-d').'優惠專案';

                    if($v == 'discount' && !$data->discount)
                    $data->$v = 100;

                    if($v == 'discount_cash' && !$data->discount_cash)
                    $data->$v = 0;
                }
                if(isset($request['id'])){
                    $data->editor_id = $user->id;
                }else{
                    $data->added_id = $user->id;
                }
                $data->save();
                
				//$app = new AppsController;
                //$sendStatus = $app->sendStatus($data);
                

                return $data;
            break;
            
            default:
                $data = isset($request['id'])?$data::find($request['id']):$data;
                foreach($keys as $k => $v){
                    //if(isset($request[$v]))
                    if(array_key_exists($v, $request))
                    $data->$v = $request[$v];
                }
                if(isset($request['id'])){
                    $data->editor_id = $user->id;
                }else{
                    $data->added_id = $user->id;
                }
                $data->save();
                return $data;
            break;
        }
        
        //$data = isset($request['id'])?$data::find($request['id']):$data::first();
        //$toArray = $data;
        //$keys = array_keys($data->toArray()); 
       // $data = isset($request['id'])?$data:new $data; //判定為新增or修改

        
    }

    public function sideOptions()
    {
        $admin = Auth::guard('heimdallr')->user();
       
        $options = \App\Model\OptionCategory::orderBy('sort','asc')->where('published',1)->with(['options' => function($query){
            $query->where('published',1)->orderBy('sort','asc'); //排序
        }])->get();
        $permissions = \App\Model\Admin::with(['permission' => function($query){
            $query->orderBy('id'); //排序
        }])->find($admin->id);
    
        foreach($options as $k => $v){
            
            foreach($permissions->permission as $k2 => $v2){
                if($v2->group_id && $v2->group_id == $v->id && $v2->published == 0)
                unset($options[$k]);
            }
            foreach($v->options as $k3 =>$v3){
                foreach($permissions->permission as $k4 => $v4){
                    if($v4->option_id && $v4->option_id == $v3->id && $v4->published == 0)
                    unset($options[$k]->options[$k3]);
                }
            } 
        }
       
        $options = array_values(json_decode($options,true));
        
        return $options;   
    }
    

    public function tableDatas($model)
    {
        //需要的欄位內容
        $option = \App\Model\OptionCategory::where('model','=', $model)->first();
        
        if($option){
            $column = json_decode($option->column,true);
        }else{
            $option = \App\Model\Option::where('model','=', $model)->first();
            $column = json_decode($option->column,true);
        };
        //return $option;

        //需要的資料內容
        $datas = '\App\Model\\'.$model;
        $datas = new $datas;
        $datas = $datas::orderBy('id','desc')->get();

        $data2 = array();
        $header = array();
        $id = array();
        $table = [];



        foreach ($datas as $k => $v) {
            $data = array();
            
            foreach ($column as $k2 => $v2) {
                # code...
                switch ($v2['field']) {

                    //case 'payment_code': 
                        //array_push($data, $datas[$k][$v2['field']]?'成功':'未付款');
                    //break;


                    case 'content': case 'intro':
                        array_push($data, mb_substr(strip_tags($datas[$k][$v2['field']]),0,50,"UTF-8"));
                    break;
                    //顯示圖片
                    case 'front_image':
                    case 'image_file': case 'banner': case 'icon': case 'image': case 'thumbnail': case 'cover': case 'thumb':
                        array_push($data, '<img src="'.$datas[$k][$v2['field']].'" height="100">');
                    break;
                    
                    case 'reply': case 'in_menu': case 'in_header': case 'home_show': case 'on_sale': case 'opening':
                        $datas[$k][$v2['field']] = ($datas[$k][$v2['field']] == 1)?'是':'否';
                        array_push($data, $datas[$k][$v2['field']]);
                    break;
                    
                    case 'user_id':
                        $user= \App\Model\User::find($datas[$k][$v2['field']]);
                        $name = isset($user->name)?$user->name:$datas[$k][$v2['field']];
                        array_push($data,$name);
                    break;
                    case 'category_id': case 'product_id':

                         switch ($model) {
                            case 'Order':
                            $category = \App\Model\OrderCategory::find($datas[$k][$v2['field']]);
                                # code...
                                $name = isset($category->name)?$category->name:$datas[$k][$v2['field']];
                            array_push($data,$name);
                            break;

                            case 'ProductSpec':
                            $category = \App\Model\Product::find($datas[$k][$v2['field']]);
                                # code...
                                $name = isset($category->name)?$category->name:$datas[$k][$v2['field']];
                                array_push($data,$name);
                            break;

                            case 'BookDetail':
                            $category = \App\Model\BookCategory::find($datas[$k][$v2['field']]);
                                # code...
                                $name = isset($category->name)?$category->name:$datas[$k][$v2['field']];
                            array_push($data,$name);
                            break;
                           
                            default:
                                # code...
                                $category = "\App\Model\\".$model."Category";
                                $category = $category::find($datas[$k][$v2['field']]);
                                # code...
                                if($category){
                                    array_push($data,$category->name);
                                }else{
                                    array_push($data,$datas[$k][$v2['field']]);
                                }
                                

                                break;
                         }
                        //$category = json_encode($item);
                        //$category = json_decode($category,true);
                    //     foreach ($category['input'] as $k2 => $v2) {
                            # code...
                    //     if($v2['field'] == 'category_id' || $v2['field'] == 'product_id')
                    //     $v[$value] = DB::table($v2['with'])->find($v[$value]);
                            //選出當前表單的config
                    // }
                    // $v[$value] = $v[$value]->name;
                        //array_push($data, $v[$value]);
                    break;
                
                    default:
                        array_push($data,$datas[$k][$v2['field']]);
                    break;
                }
            }
            array_push($id,$v['id']);
            array_push($data2,$data);
           
        }
        /*
        foreach ($field as $key => $value) {
            # code...
            foreach ($item->input as $key2 => $value2) {
                if($value == $value2->field){
					$width = isset($value2->width)?$value2->width:'';
					$field[$key] = array('header' => $value2->header , 'width'=> $width);
				}
                
            }
        }
        return $model;
        */
        $results = array(
            'field' => $column , 
            //'item' => array('row' => $data2 , 'id' => $id) ,
            //'title' => $item->title,
            //'group_id' => $item->group_id,
            //'from' => $item->input,
            'id' => $id,
            'datas' => $data2
        );
        return $results;
      
        //return $data2;
    }
}
