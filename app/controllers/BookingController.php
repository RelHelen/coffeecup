<?php

/** Главная страница 
 */
namespace app\controllers;

use app\models\Cart;
use app\models\Order;
use app\models\User;
use fw\App;

class BookingController extends AppController
{

    public function __construct($route)
    {
        parent::__construct($route);
        $this->layout = 'default';
    }
    public function indexAction()
    {
       
       
    }
    public function addAction(){
        
        $cart = new Booking();
        $cart->addToCart($product, $qty, $mod);
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        // var_dump($_SESSION['cart']);
        redirect();
    }

    public function showAction(){
        $this->loadView('cart_modal');
    }

    public function deleteAction(){
        $id = !empty($_GET['id']) ? $_GET['id'] : null;
        if(isset($_SESSION['cart'][$id])){
            $cart = new Cart();
            $cart->deleteItem($id);
        }
        if($this->isAjax()){
            $this->loadView('cart_modal');
        }
        redirect();
    }

    public function clearAction(){
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);
        $this->loadView('cart_modal');
    }

    public function viewAction(){
        $this->setMeta('Корзина');
    }
    public function checkoutAction(){
        if(!empty($_POST)){
            //если пользователь не авторизован , то регистрация пользователя
            if(!User::checkAuth()){
                $user = new User();
                $data = $_POST;
                $user->load($data);
                if(!$user->validate($data) || !$user->checkUnique()){
                    $user->getErrors();
                    $_SESSION['form_data'] = $data;
                    redirect();
                }else{
                    $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                    if(!$user_id = $user->save('users')){
                        $_SESSION['error'] = 'Ошибка!';
                        redirect();
                    }
                }
            }

            // сохранение заказа
            $data['id'] = isset($user_id) ? $user_id : $_SESSION['user']['id'];
                      
            
            $order_id = Order::saveOrder($data);

            
            


            
        }
        redirect();
    }
}
