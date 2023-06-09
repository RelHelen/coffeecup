<?php

namespace app\controllers\admin;


use fw\libs\Pagination;
use app\models\Map;
use app\models\Main;
use app\models\Catalog;
class MapController extends AppController {
    
    public $model;
    public function __construct($route){
       
        parent::__construct($route);
        // debug($route);
       
        $model = new Catalog;
        $pointersMap = $model->getPointers();       
       
       }

    public function indexAction(){
        $model=new Map;
       
        //пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('mappoint');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        //         $orders = \R::getAll("SELECT `order`.`id`, `order`.`id_user`, `order`.`status`, `order`.`date`, `order`.`date_read`, `order`.`date_update`, `users`.`fio`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
        //   JOIN `users` ON `order`.`id_user` = `users`.`id`
        //   JOIN `order_product` ON `order`.`id` = `order_product`.`id_order`
        //   GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT $start, $perpage");
        $points = \R::getAll("SELECT `mappoint`.* FROM `mappoint` ORDER BY `mappoint`.`name`  LIMIT $start, $perpage");
 
        $this->setMeta('Список адресов ');
        $this->set(compact('points', 'pagination', 'count'));
    }

    public function viewAction(){
        $model=new Map;       
        $point_id = $this->getRequestID();
        $point = \R::getRow("SELECT `mappoint`.* FROM `mappoint`  WHERE `mappoint`.`id` = ? ",[$point_id]);       
        //debug($point_id);
        //debug($points);
        $orders = \R::getAll("SELECT `order`.`id`, `order`.`id_user`, `order`.`status`, `order`.`date`, `order`.`date_read`, `order`.`date_update`, `users`.`fio`,`status`.`content` as `st_content`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order` 
        JOIN `users` ON `order`.`id_user` = `users`.`id`
        JOIN `status` ON `order`.`status` = `status`.`id`
        JOIN `order_product` ON `order`.`id` = `order_product`.`id_order`
        WHERE  `order`.`id_adres` = ?
        GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` ",[$point_id]);

        //$orders = \R::find('order', 'id_adres = ?', [$point_id]);
        //  debug( $orders );die; 

        if(!$orders){
            throw new \Exception('Страница не найдена', 404);
        }
        // $order_products = \R::findAll('order_product', "id_order = ?", [$order_id]);
       
      //  $status=$model->getStatus($order['status']);
       // debug($status);
        $this->setMeta("Точка №{$point_id}");
        $this->set(compact('orders', 'point' ));
    }
    public function mapAction(){
        $this->layout='layoutajax';
        $model = new Catalog;
        $modelMap=new Map;  

        $point_id = $this->getRequestID();
        $point = \R::getRow("SELECT `mappoint`.* FROM `mappoint`  WHERE `mappoint`.`id` = ? ",[$point_id]);
                
        $json = json_encode($point); 
        $this->setData(compact('json'));    
       if ($this->isAjax()) {                 
            $this->setData(compact('json')); 
           }
    }
    public function index12Action(){
        $model=new Map;
       
        //пагинация
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('mappoint');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        //         $orders = \R::getAll("SELECT `order`.`id`, `order`.`id_user`, `order`.`status`, `order`.`date`, `order`.`date_read`, `order`.`date_update`, `users`.`fio`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
        //   JOIN `users` ON `order`.`id_user` = `users`.`id`
        //   JOIN `order_product` ON `order`.`id` = `order_product`.`id_order`
        //   GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT $start, $perpage");
        $points = \R::getAll("SELECT `mappoint`.* FROM `mappoint` ORDER BY `mappoint`.`name`  LIMIT $start, $perpage");
        
        $this->setMeta('Список адресов ');
        $this->set(compact('points', 'pagination', 'count'));
 }

    public function editAction(){
        $model=new Map;       
        $point_id = $this->getRequestID();
        $point = \R::getRow("SELECT `mappoint`.* FROM `mappoint`  WHERE `mappoint`.`id` = ? ",[$point_id]);
        //debug($point_id);
        //debug($points);       
        $this->setMeta("Точка №{$point_id}");
        $this->set(compact('point'));
    }
         
    public function changeAction(){
        $order_id = $this->getRequestID();
        $order = \R::load('mappoint', $order_id);       
    
        if(!$order){
            throw new \Exception('Страница не найдена', 404);
        }        
       
        \R::store($order);
        $_SESSION['success'] = 'Изменения сохранены';
        debug($order); 
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
    
    public function addAction(){
        if(!empty($_POST)){
            $model=new Map;   
            $data = $_POST;
            $model->load($data);
            $model->attributes['view'] ? '1' : '0';           
            $model->getImg();
            if(!$model->validate($data)){
                $model->getErrors();               
                redirect();
            }     
               
                
            if($id = $model->save('mappoint')){
                
                $cat = \R::load('mappoint', $id);
                
                \R::store($cat);
                $_SESSION['success'] = 'Точка добавлена';
            }
            redirect();
        }
        $this->setMeta('Новая точка');
    }
    public function orderpointAction(){
        
        $model=new Map;       
        $point_id = $this->getRequestID();
        $point = \R::getRow("SELECT `mappoint`.* FROM `mappoint`  WHERE `mappoint`.`id` = ? ",[$point_id]);       
        //debug($point_id);
        //debug($points);
        $orders = \R::getAll("SELECT `order`.`id`, `order`.`id_user`, `order`.`status`, `order`.`date`, `order`.`date_read`, `order`.`date_update`,`order`.`pay`, `users`.`fio`,`status`.`content` as `st_content`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
        JOIN `users` ON `order`.`id_user` = `users`.`id`
        JOIN `status` ON `order`.`status` = `status`.`id`
        JOIN `order_product` ON `order`.`id` = `order_product`.`id_order`
        WHERE  `order`.`id_adres` = ?
        GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` ",[$point_id]);
 

         $ordersNew = \R::getAll("SELECT `order`.`id`, `order`.`id_user`, `order`.`status`, `order`.`date`, `order`.`date_read`, `order`.`date_update`,`order`.`pay`, `users`.`fio`,`status`.`content` as `st_content`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`  JOIN `users` ON `order`.`id_user` = `users`.`id`
         JOIN `status` ON `order`.`status` = `status`.`id`
         JOIN `order_product` ON `order`.`id` = `order_product`.`id_order`
         WHERE  `order`.`status` = '1' AND `order`.`id_adres` = ?
         GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` ",[$point_id]);

         $ordersready = \R::getAll("SELECT `order`.`id`, `order`.`id_user`, `order`.`status`, `order`.`date`, `order`.`date_read`, `order`.`date_update`,`order`.`pay`, `users`.`fio`,`status`.`content` as `st_content`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`  JOIN `users` ON `order`.`id_user` = `users`.`id`
          JOIN `status` ON `order`.`status` = `status`.`id`
          JOIN `order_product` ON `order`.`id` = `order_product`.`id_order`
          WHERE  `order`.`status` = '2' AND `order`.`id_adres` = ?
          GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` ",[$point_id]);

$ordersClose = \R::getAll("SELECT `order`.`id`, `order`.`id_user`, `order`.`status`, `order`.`date`, `order`.`date_read`, `order`.`date_update`,`order`.`pay`, `users`.`fio`,`status`.`content` as `st_content`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`  JOIN `users` ON `order`.`id_user` = `users`.`id`
JOIN `status` ON `order`.`status` = `status`.`id`
JOIN `order_product` ON `order`.`id` = `order_product`.`id_order`
WHERE  `order`.`status` = '4' AND `order`.`id_adres` = ?
GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` ",[$point_id]);

 //$ordersNew  = \R::find( 'order', ' status = 1 ');
 //$ordersready  = \R::find( 'order', ' status = 2 ');
 //$ordersClose  = \R::find( 'order', ' status = 4 ');
  
        //$orders = \R::find('order', 'id_adres = ?', [$point_id]);
        //  debug( $orders );die; 

        if(!$orders){
            throw new \Exception('Страница не найдена', 404);
        }
        // $order_products = \R::findAll('order_product', "id_order = ?", [$order_id]);
       
      //  $status=$model->getStatus($order['status']);
       // debug($status);
        $this->setMeta("Точка №{$point_id}");
        $this->set(compact('orders', 'point','ordersNew','ordersready','ordersClose' ));
    }

}