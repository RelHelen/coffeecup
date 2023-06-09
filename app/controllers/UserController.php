<?php

namespace app\controllers;

use fw\Db;
use fw\Model;
use app\models\User;
use app\models\Customers;
use app\models\Booking;
use fw\base\View;
use app\widgets\menudev\Menudev;

class UserController extends AppController
{
    public function __construct($route)
    {
        parent::__construct($route); //сначало выполняем
 
        // if (!$this->isUserLog($this->route['action'], $this->route['controller']) && $route['action'] != 'login' && $route['controller'] != 'User') {
        //     // $this->destSession();
        //     redirect(PATH.'/user/login');
        // }
    }
    //регистрация
    public function singupAction()
    {
        // $this->setMeta('Регистрация');
        $this->setTitle('');
        //unset($_SESSION);
         // debug($_SESSION);

        if (!empty($_POST)) {
            //  debug($_POST);
            //создаем объект модели
            $user = new User();
              
            $data = $_POST;
            $user->load($data);
           
          //  $table = $user->table; //'users'
            
          //  $user->loadAtr($data, $table); //для формирования [] атрибуттов из полей формы

            // debug($user);
            // debug($_POST);
            //не валидны
            if (!$user->validate($data) || !$user->checkUnique()) {
                //получили ошибки
                $user->getErrors();
                //запоминаем, что вводил пользователь
                $_SESSION['form_data'] = $data;
                redirect();
            }
           
            //если данные валидны кодируем пароль
            $user->attributes['password'] = password_hash(
                $user->attributes['password'],
                PASSWORD_DEFAULT
            );      

           

            //если данные валидны вставляем строку в таблицу
             if ($user->insertSingleRow('users') > 0) {       
                        
                $_SESSION['success'] = "Вы успешно зарегестрировались";
            } else {
                $_SESSION['error'] = "Ошибка! Попробуйте позже";
            }
              
            // debug($user,true);
             //die;
            redirect();


            // debug($user);

        }
    }

    //авторизация
    public function loginAction()
    {
        //$this->setMeta('Авторизация');
        $this->setTitle('');
        //если данные пришли POST то проверяем их
        if (!empty($_POST)) {
            //удаляем старые сессии
            if (isset($_SESSION['user'])) {
                $this->destSession();
            }
            //куки просмотров
            // if (!empty($_COOKIE['recentlyViewed'])) {
            //     unset($_COOKIE['recentlyViewed']);
            //     setcookie('recentlyViewed', null, -1, '/');
            // }
            //создаем объект модели
            $user = new User();
            if ($user->isLogin()) {
                $_SESSION['success'] = "Вы успешно авторизованы";
                redirect(PATH.'/');  //сделать переход на страницу                 
            } else {
                $_SESSION['error'] = "Логин/пароль введены неверено";
                // unset($_SESSION['error']);
                redirect();
            }
        }
    }
    //выход
    public function logoutAction()
    {
        $this->destSession();
        redirect(PATH . '/user/login');
    }

    //просмотр заказов для пользователя
    public function BookingAction(){  
        // if($_SESSION['user']['role']) {
        // debug($_SESSION['user']);
        // redirect(PATH . '/');  //сделать переход на страницу   
       
        // } 
           
         
        
        $user = $_SESSION['user'];
         // debug( $user);die;   
         $orders = \R::getAll("SELECT `order`.`id`, `order`.`id_user`, `order`.`status`, `order`.`date`, `order`.`date_read`, `order`.`date_update`,`order`.`pay`, `order`.`comment`,`users`.`fio`,`status`.`content` as `st_content`,`mappoint`.`descriptions`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
         JOIN `users` ON `order`.`id_user` = `users`.`id`
         JOIN `mappoint` ON `order`.`id_adres` = `mappoint`.`id`
         JOIN `status` ON `order`.`status` = `status`.`id`
         JOIN `order_product` ON `order`.`id` = `order_product`.`id_order`
         WHERE  `order`.`id_user` = ?
         GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` ",[$user['id']]); 

       // $orders = \R::findAll('order', "id_user = ?", [$user['id']]);





        foreach( $orders as  $order){
        $order_products = \R::findAll('order_product', "id_order = ?", [$order['id']]);}
         // debug( $orders);
          //die;
         
         
        $this->setTitle('Ваши заказы');
        $this->setData(compact('orders','order_products' ));
    }
    //просмотр заказов по 
    public function PersonalAction()
    {
        $model = new Customers;
        $modelBook = new Booking;
        $user = $_SESSION['user'];
        //debug($user);
        $customer = $model->getCustomer($user['id']);


        //debug($customer);
        // debug($_SESSION);
        
        $this->setTitle('Ваши заказы');
        $this->setData(compact('customer', 'user'));
    }
 // возвращает true для пользователя .проверка авторизован ли пользователь
 public static function checkAuth(){
    return isset($_SESSION['user']);
}
}
