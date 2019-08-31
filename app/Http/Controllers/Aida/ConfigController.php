<?php

namespace App\Http\Controllers\Aida;

use App\Http\Controllers\Controller;


class ConfigController extends Controller
{
    //選單項目
    public function setup(){

		$result[] = array(
            'table' => 'sliders', 
            'title' => '輪播圖管理',
            'language_id' => '1',
            'group_id' => '2',
            'field' => 'published,image_file,published_at,title',
            'input' => array(
                array("field" => 'published',"header" => "顯示","width" => 60,"renderer" => 1,"editor" => "checked"),
                array("field" => 'sort',"header" => "排序","width" => 20,"renderer" => 1,"editor" => "input"),
                array("field" => 'published_at',"header" => "發佈日期","width" => 100,"renderer" => 1,"editor" => "datepicker"),
                array("field" => 'image_file',"header" => "圖片","width" => 100,"renderer" => 1,"editor" => "images"),
                array("field" => 'title',"header" => "標題","renderer" => 1,"editor" => "input"),
				array("field" => 'subtitle',"header" => "副標題","width" => 250,"renderer" => 1,"editor" => "input"),
				array("field" => 'button',"header" => "按鈕名稱","width" => '',"renderer" => 1,"editor" => "input"),
				["field" => 'url',"header" => "連結網址","width" => '',"renderer" => 1,"editor" => "url"],
				 
              ),
            'conditions' => '1',
            'category' => false
        );
		
		$result[] = array(
            'table' => 'contacts', 
            'title' => '線上表單管理',
            'language_id' => '1',
            'group_id' => '2',
            'field' => 'published,reply,send_at,name,phone,email',
            'input' => [
                ["field" => 'published',"header" => "顯示","width" => 60,"renderer" => 1,"editor" => "checked"],
				["field" => 'reply',"header" => "回覆","width" => 50,"renderer" => 1,"editor" => "checked"],
                ["field" => 'send_at',"header" => "寄件日期","width" => 120,"renderer" => 1,"editor" => "readonly"],
				["field" => 'name',"header" => "姓名","width" => 100,"renderer" => 1,"editor" => "readonly"],
				["field" => 'phone',"header" => "電話","width" => 100,"renderer" => 1,"editor" => "readonly"],
				["field" => 'email',"header" => "電子郵件","renderer" => 1,"editor" => "mailto"],
				["field" => 'demand_date',"header" => "需求日期","width" => 100,"renderer" => 1,"editor" => "readonly"],
				["field" => 'subject',"header" => "標題","width" => 100,"renderer" => 1,"editor" => "readonly"],
				["field" => 'message',"header" => "問題內容","width" => 100,"renderer" => 1,"editor" => "editor"],
              ],
            'conditions' => '1',
            'category' => false
        );
	
        $result[] = array(
            'table' => 'product_categories', 
            'title' => '商品類別管理',
            'language_id' => '1',
            'group_id' => '3',
            'field' => 'published,sort,in_menu,in_header,banner,name,subtitle',
            'input' =>[
                ["field" => 'published',"header" => "顯示","width" => 60,"renderer" => 1,"editor" => "checked"],
				["field" => 'in_menu',"header" => "商品目錄","width" => 10,"renderer" => 1,"editor" => "checked"],
				["field" => 'in_header',"header" => "上方選單","width" => 60,"renderer" => 1,"editor" => "checked"],
                ["field" => 'sort',"header" => "排序","width" => 20,"renderer" => 1,"editor" => "input"],
				["field" => 'banner',"header" => "上方背景圖(1920x850)","width" => 100,"renderer" => 1,"editor" => "images"],
				["field" => 'icon',"header" => "ICON(400x?)","width" => 100,"renderer" => 1,"editor" => "images"],
                ["field" => 'name',"header" => "類別名稱","width" => 100,"renderer" => 1,"editor" => "input"],
				["field" => 'subtitle',"header" => "副標題","renderer" => 1,"editor" => "input"],
                ["field" => 'intro',"header" => "類別簡介","renderer" => 1,"editor" => "editor"],
              ],
            'conditions' => '1',
            'category' => true,
        );
		
		$result[] = array(
            'table' => 'products', 
            'title' => '商品資訊管理',
            'language_id' => '1',
            'group_id' => '3',
            'field' => 'published,category_id,published_at,cover,name,intro',
            'input' =>[
                ["field" => 'published',"header" => "顯示","width" => 60,"renderer" => 1,"editor" => "checked"],
				["field" => 'published_at',"header" => "發佈日期","width" => 80,"renderer" => 1,"editor" => "datepicker"],
				["field" => 'category_id',"header" => "類別名稱","width" => 80,"renderer" => 1,"editor" => "select","with" => "product_categories"],
                ["field" => 'ship_id',"header" => "運送方式","renderer" => 1,"editor" => "select","with" => "ships"],

                
				["field" => 'name',"header" => "商品名稱","width" => 120,"renderer" => 1,"editor" => "input"],
                ["field" => 'intro',"header" => "商品介紹","renderer" => 1,"editor" => "editor"],
				["field" => 'spec',"header" => "商品規格","renderer" => 1,"editor" => "spec","with" => "product_specs",
					"with_header" => "規格,原價,特價,運送單位","with_field" => "size,price,on_sale,unit"
				],
				//["field" => 'price',"header" => "原價","renderer" => 1,"editor" => "currency"],
				//["field" => 'on_sale',"header" => "特價","renderer" => 1,"editor" => "currency"],
				["field" => 'cover',"header" => "商品封面(500x500)","width" => 100,"renderer" => 1,"editor" => "images"],
				["field" => 'album',"header" => "商品相簿(545x315)","renderer" => 1,"editor" => "images"],
                ["field" => 'tag',"header" => "標籤","renderer" => 1,"editor" => "multiple","with" => "tags"]
				//["field" => 'unit',"header" => "運送單位","renderer" => 1,"editor" => "input"]
              ],
            'conditions' => '1',
            'category' => true,
        );
		
		$result[] = array(
            'table' => 'product_specs', 
            'title' => '商品規格管理',
            'language_id' => '1',
            'group_id' => '3',
            'field' => 'published,product_id,sort,size',
            'input' =>[
                ["field" => 'published',"header" => "顯示","width" => 60,"renderer" => 1,"editor" => "checked"],
				["field" => 'sort',"header" => "排序","width" => 50,"renderer" => 1,"editor" => "datepicker"],
				["field" => 'product_id',"header" => "類別名稱","width" => 120,"renderer" => 1,"editor" => "select","with" => "products"],
				["field" => 'size',"header" => "尺寸規格","renderer" => 1,"editor" => "input"],
                ["field" => 'intro',"header" => "商品介紹","renderer" => 1,"editor" => "editor"],
				["field" => 'price',"header" => "原價","renderer" => 1,"editor" => "currency"],
				["field" => 'on_sale',"header" => "特價","renderer" => 1,"editor" => "currency"],
				["field" => 'cover',"header" => "商品封面(500x500)","width" => 100,"renderer" => 1,"editor" => "images"],
				["field" => 'album',"header" => "商品相簿(545x315)","renderer" => 1,"editor" => "images"],
				["field" => 'unit',"header" => "運送單位","renderer" => 1,"editor" => "input"]
      
              ],
            'conditions' => '1',
            'category' => true,
        );

        $result[] = array(
            'table' => 'tags', 
            'title' => '標籤資訊管理',
            'language_id' => '1',
            'group_id' => '3',
            'field' => 'published,name',
            'input' =>[
                ["field" => 'published',"header" => "顯示","width" => 60,"renderer" => 1,"editor" => "checked"],
                ["field" => 'name',"header" => "標籤名稱","renderer" => 1,"editor" => "input"],
              
              ],
            'conditions' => '1',
            'category' => true,
        );
		
		$result[] = array(
            'table' => 'ships', 
            'title' => '運費資訊管理',
            'language_id' => '1',
            'group_id' => '4',
            'field' => 'published,sort,name',
            'input' =>[
                ["field" => 'published',"header" => "顯示","width" => 60,"renderer" => 1,"editor" => "checked"],
				["field" => 'sort',"header" => "排序","width" => 20,"renderer" => 1,"editor" => "input"],
				["field" => 'name',"header" => "運送方式","renderer" => 1,"editor" => "input"],
                //["field" => 'intro',"header" => "宅配介紹","renderer" => 1,"editor" => "editor"],
				//["field" => 'price',"header" => "運費","renderer" => 1,"editor" => "currency"]
              ],
            'conditions' => '1',
            'category' => true,
        );

        $result[] = array(
            'table' => 'order_categories', 
            'title' => '訂單狀態管理',
            'language_id' => '1',
            'group_id' => '6',
            'field' => 'published,sort,name',
            'input' =>[
                ["field" => 'published',"header" => "顯示","width" => 60,"renderer" => 1,"editor" => "checked"],
                ["field" => 'sort',"header" => "排序","width" => 20,"renderer" => 1,"editor" => "input"],
                ["field" => 'name',"header" => "類別名稱","renderer" => 1,"editor" => "input"],
				
              ],
            'conditions' => '1',
            'category' => true,
        );

        $result[] = array(
            'table' => 'orders', 
            'title' => '訂單資訊管理',
            'language_id' => '1',
            'group_id' => '6',
            'field' => 'published,category_id,order_date,order_number,merchant_trade,name,phone,total',
            'input' =>[
                ["field" => 'published',"header" => "顯示","width" => 60,"renderer" => 1,"editor" => "checked"],
				["field" => 'category_id',"header" => "類別名稱","width" => 80,"renderer" => 1,"editor" => "select","with" => "order_categories"],
                ["field" => 'order_date',"header" => "下單時間","width" => 120,"renderer" => 1,"editor" => "readonly"],
                ["field" => 'order_number',"header" => "訂單編號","width" => 120,"renderer" => 1,"editor" => "readonly"],
                ["field" => 'name',"header" => "收件人","width" => 120,"renderer" => 1,"editor" => "readonly"],     
                ["field" => 'email',"header" => "電子郵件","renderer" => 1,"editor" => "mailto"],    
                ["field" => 'phone',"header" => "電話","width" => 120,"renderer" => 1,"editor" => "readonly"],    
                ["field" => 'address',"header" => "地址","renderer" => 1,"editor" => "readonly"],    
                ["field" => 'remark',"header" => "備註","renderer" => 1,"editor" => "readonly"], 
                ["field" => 'ship_time',"header" => "寄送時間","renderer" => 1,"editor" => "readonly"],
                ["field" => 'spec',"header" => "商品規格","renderer" => 1,"editor" => "orderDetail","with" => "order_details",
					"with_header" => "品名,單價,數量,小計","with_field" => "name,price,qty,total"
				],
                ["field" => 'payment_code',"header" => "付款結果","renderer" => 1,"editor" => "readonly"],
                ["field" => 'payment_type',"header" => "付款方式","renderer" => 1,"editor" => "readonly"],
                ["field" => 'payment_date',"header" => "付款時間","renderer" => 1,"editor" => "readonly"],
                ["field" => 'merchant_trade',"header" => "歐付寶編號","renderer" => 1,"editor" => "readonly"],
                ["field" => 'trade_amt',"header" => "付款金額","renderer" => 1,"editor" => "readonly"],
                ["field" => 'subtotal',"header" => "小計","renderer" => 1,"editor" => "readonly"],
                ["field" => 'shipping_re',"header" => "冷藏運費","renderer" => 1,"editor" => "readonly"],
                ["field" => 'shipping_fr',"header" => "冷凍運費","renderer" => 1,"editor" => "readonly"],
                ["field" => 'total',"header" => "總計","width" => 120,"renderer" => 1,"editor" => "readonly"],
				["field" => 'tracking_code',"header" => "運送單位","renderer" => 1,"editor" => "tracking"]
				
              ],
            'conditions' => '1',
            'category' => true,
        );

        return $this->json($result);
    }
    
    //選單群組
    public function groups()
    {
        $result = array(
            array('id' => '1' , 'name' => '管理員權限管理'),
            array('id' => '2' , 'name' => '網站服務管理'),
			array('id' => '3' , 'name' => '產品資訊管理'),
			array('id' => '4' , 'name' => '購物資訊管理'),
            array('id' => '5' , 'name' => '部落格管理'),
            array('id' => '6' , 'name' => '訂單資訊管理'),
        );
        return $this->json($result);
    }

    //語言
    public function languages()
    {
        $result = array(
            array('id' => '1' , 'name' => '中文繁體' , 'route' => 'zh'), 
            array('id' => '2' ,'name' => 'English' , 'route' => 'en')
        );
        return $this->json($result);
    }

    public function json($results)
    {
        return json_decode(json_encode($results)); 
    }

}
