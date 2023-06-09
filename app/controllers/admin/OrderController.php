<?php

namespace app\controllers\admin;


use fw\libs\Pagination;
use app\models\Order;
use app\models\Main;

class OrderController extends AppController {
    
    public $model;
    public function indexAction(){
        $model=new Order;
        //обновление даты выдачи заказа
        $model->updateDateRead();
        //пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('order');
         $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $orders = \R::getAll("SELECT `order`.`id`, `order`.`id_user`, `status`.`content` as `st_content`,`order`.`status`, `order`.`date`, `order`.`date_read`, `order`.`date_update`, `users`.`fio`,`users`.`phone`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
  JOIN `users` ON `order`.`id_user` = `users`.`id`
  JOIN `order_product` ON `order`.`id` = `order_product`.`id_order`
  JOIN `status` ON `order`.`status` = `status`.`id`
  GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT $start, $perpage");
 
        $this->setMeta('Список заказов');
        $this->set(compact('orders', 'pagination', 'count'));
    }

    public function viewAction(){
        $model=new Order;
       
        $order_id = $this->getRequestID();
        $order = \R::getRow("SELECT `order`.*, `users`.`fio`,`users`.`phone`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
  JOIN `users` ON `order`.`id_user` = `users`.`id`
  JOIN `order_product` ON `order`.`id` = `order_product`.`id_order`
  WHERE `order`.`id` = ?
  GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT 1", [$order_id]);
        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }
        $order_products = \R::findAll('order_product', "id_order = ?", [$order_id]);
        // $tpl_status=$this->tpl_status =  APP . "/views/inc/satus.php";
        $status=$model->getStatus($order['status']);
       // debug($status);
        $this->setMeta("Заказ №{$order_id}");
        $this->set(compact('order', 'order_products','status'));
    }

    public function changeAction(){
        $order_id = $this->getRequestID();
        $order = \R::load('order', $order_id);
        $status = $_GET['status']  ;
        $pay = $_GET['pay'];
       // debug( $pay);
       // debug( $status);  
    
        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }
        $order->status = $status;
        $order->pay = $pay;
        $order->date_update = date("Y-m-d H:i");
       
        \R::store($order);
        $_SESSION['success'] = 'Изменения сохранены';
        //debug($order); 
        //die; 
        redirect(); 
    }

    public function deleteAction(){
        $order_id = $this->getRequestID();
        $order = \R::load('order', $order_id);
        \R::trash($order);
        $_SESSION['success'] = 'Заказ удален';
        redirect(ADMIN . '/order');
    }

}