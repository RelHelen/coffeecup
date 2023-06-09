<?php

namespace app\controllers\admin;

use app\models\User;
use app\models\Order;
use fw\libs\Pagination;
use app\models\AppModel;
use fw\App;

class MenedgerController extends AppController {

    public function indexAction(){
       
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 10;
        $count = \R::count('users');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $users = \R::findAll('users', "role='menedger'");

        

        $this->setMeta('Список пользователей');
        $this->set(compact('users', 'count'));
    }

    public function addAction(){
        $mappoints = \R::findAll('mappoint');
        $this->setMeta('Новый Менеджер');
        $this->set(compact('mappoints'));
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $user = new \app\models\admin\User();
            $data = $_POST;
            $user->load($data);
            if(!$user->attributes['password']){
                unset($user->attributes['password']);
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                redirect();
            }
            if($user->update('users', $id)){
                $_SESSION['success'] = 'Изменения сохранены';
            }
            redirect();
        }

        $user_id = $this->getRequestID();
        $user = \R::load('users', $user_id);

        // $orders = \R::getAll("SELECT `order`.`id`, `order`.`id_user`, `order`.`status`, `order`.`date`, `order`.`date_update`, `order`.`date_read`,`status`.`content` as `st_content`, ROUND(SUM(`order_product`.`price`), 2) AS `sum` FROM `order`
        // JOIN `order_product` ON `order`.`id` = `order_product`.`id_order`
        // JOIN `status` ON `order`.`status` = `status`.`id`
        // WHERE id_user = {$user_id}       
        // GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id`");

        $mappoints = \R::findAll('mappoint');
       

        $points=\R::getAll("SELECT `menedger`.*,`mappoint`.*  
        FROM `menedger` JOIN `mappoint` ON `mappoint`.`id` =`menedger`.`id_map` WHERE id_user = {$user_id} GROUP BY `menedger`.`id_user`  ORDER BY `menedger`.`id_map` ");
        //    debug($user);
        //   debug($points);die;
 

        $this->setMeta('Редактирование профиля пользователя');
        $this->set(compact('user', 'points','mappoints'));
    }

    public function loginAdminAction(){
        debug($_SESSION);
         
        if(!empty($_POST)){
            $user = new User();
            debug( $_POST);
           
            if(!$user->isLogin(true)){
                $_SESSION['error'] = 'Логин/пароль введены неверно';
            }
            if(User::isAdmin()){
                redirect(ADMIN);
            }else{
                redirect();
            }
        }
        $this->layout = 'login';
    }

}