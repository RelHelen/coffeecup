<?php

namespace app\models;

use fw\App;


class Map extends AppModel {
    public $attributes = [
        
        'id' => '',
        'name' => '',
        'descriptions' => '',           
        'img' => '', 
        'cx' => '',
        'cy' => '',  
        'point' => '',
        'view' => '',
        'tel' => '',
        'foto' => '',
        'hint' => '',
        'dop' => '',
    ];

    public $rules = [
        'required' => [
            ['name'],            
        ]        
    ];
    //сохраняет заказ в таблицу 
    public static function saveOrder($data){
        //куда выгружаем данные
        //$order = \R::dispense('map');
//формируем атрибуты -это поля таблицы
        // $order->user_id = $data['user_id'];
        // $order->note = $data['comment'];
        // $order->currency = 'руб.';
        // $order->sum = $_SESSION['cart.sum'];
//сохраняет запись и возвращает id этой записи
        // $order_id = \R::store($order);
        // self::saveOrderProduct($order_id);
        // return $order_id;
    }
//сохраняет заказ в таблицу order_product согласн номеру заказа $order_id
    public static function saveOrderProduct($order_id){
        $sql_part = '';
        foreach($_SESSION['cart'] as $product_id => $product){
            $product_id = (int)$product_id;
            $sql_part .= "($order_id, $product_id, {$product['qty']}, '{$product['title']}', {$product['price']}),";
        }
        $sql_part = rtrim($sql_part, ',');
        \R::exec("INSERT INTO order_product (id_order, id_product, qty, title, price) VALUES $sql_part");
    }


    public static function getStatus($id){
       // echo $id;
      $status = \R::findOne('status', '`id` = ?',[$id]);
      //debug($status);
      return $status->content;
    }  
    public function updateDateRead(){       
        $orders= \R::findAll('order', "date_read = ?", ['0000-00-00']);      
       foreach($orders as  $order){
       
        $order->date_read=date("Y-m-d H:i", strtotime("+20 minute", strtotime($order->date)));  
         $idd= \R::store($order);        
          $order_id=null;  
       }
        
      //  die;
  
    }
    public function getImg(){
        if(!empty($_SESSION['single'])){
            $this->attributes['img'] = $_SESSION['single'];
            unset($_SESSION['single']);
        }
    }

}