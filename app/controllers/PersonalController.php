<?php

namespace app\controllers;

use fw\Db;
use app\models\User;
use app\models\Customers;
use fw\base\View;
 

class PersonalController extends AppController
{
    public $user;
    public $model;

    public function __construct($route)
    {
        parent::__construct($route); //сначало выполняем        
        $model = new User();
        //проверка переменной из сессии при авторизации    
        if (!$this->isUserLog($this->route['action'], $this->route['controller'])) {
            redirect(PATH.'/user/login');
        } else {

            //поолучили log user и Customer из сессии
            $logUser = $this->logUser();
            $idUser=$this->idUser();
                 
             

            // [user] => Array
            // (
            //     [id] => 2
            //     [login] => user1
            //     [fio] => Виолета
            //     [mail] => ViolDlMejG@mail.ru
            //     [phone] => 89287795858
            //     [role] => user
            //     [data_reg] => 2023-06-02
            // )
        }
    }
    /**
     * главный экран страницы Личный кабинет
     * вывод информации пользователя
     */
    public function indexAction()
    {
        $this->setTitle('Личный кабинет'); //установка заголовка
        

         $customer = $this->model->getUserRow($this->idUser());

        if ($customer) {
            $this->setData(compact('customer'));
        }
    }
}
