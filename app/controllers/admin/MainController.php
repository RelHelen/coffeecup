<?php

namespace app\controllers\admin;
use app\models\Order;
class MainController extends AppController {

    public function indexAction(){
        $model=new Order;
        $model->updateDateRead();
        $countNewOrders = \R::count('menedger');
        $countUsers = \R::count('users');
        $countProducts = \R::count('product');
        $countCategories = \R::count('category');
        
        $points = \R::getAll("SELECT `mappoint`.* FROM `mappoint`");  
 
 
        $orders = \R::getAll("SELECT `order`.`id`, `order`.`id_adres` FROM `order`"            
        );
 

         $ordersNew = \R::getAll("SELECT  `order`.`id`, `order`.`id_adres` 
         FROM `order`  
         WHERE  `order`.`status` = '1' ");

         $ordersready = \R::getAll("SELECT  `order`.`id`, `order`.`id_adres` 
         FROM `order`  
         WHERE  `order`.`status` = '2' ");

        $ordersClose = \R::getAll("SELECT  `order`.`id`, `order`.`id_adres` 
        FROM `order`  
        WHERE  `order`.`status` = '4' ");



        $this->setMeta('Панель управления');
        $this->set(compact('points','countNewOrders', 'countCategories', 'countProducts', 'countUsers','orders','ordersNew','ordersready','ordersClose'));
    }

}