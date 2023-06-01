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
        if($_SESSION['user']['role']) {
        debug($_SESSION['user']);
        redirect(PATH . '/');  //сделать переход на страницу   
       
        } 
           
        $model = new Customers;
        $modelBook = new Booking;
        $user = $_SESSION['user'];
        $detals = array();
        // debug($user);
           
        $customer = $model->getCustomer($user['ID']);
        // debug($customer);
        $contracts = $modelBook->getSerUser($user['ID']);
        //debug($contracts[0]['ID_O']);
        //debug($contracts);
        foreach ($contracts as $kay => $value) {
            //debug($kay);
            array_push($detals,$modelBook->getDetal($contracts[$kay]['ID_O']));
           
        }
        //debug($detals);       
         
        $this->setTitle('Ваши заказы');
        $this->setData(compact('contracts', 'detals', 'customer'));
    }
    //просмотр заказов по 
    public function PersonalAction()
    {
        $model = new Customers;
        $modelBook = new Booking;
        $user = $_SESSION['user'];
        //debug($user);
        $customer = $model->getCustomer($user['ID']);


        //debug($customer);
        // debug($_SESSION);
        
        $this->setTitle('Ваши заказы');
        $this->setData(compact('customer', 'user'));
    }
}
