<?php

namespace app\models;

use fw\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Order extends AppModel {

    //сохраняет заказ в таблицу order
    public static function saveOrder($data){
        //куда выгружаем данные
        $order = \R::dispense('order');
        //формируем атрибуты -это поля таблицы
        $order->user_id = $data['id_user'];
        $order->note = $data['comment'];
        //$order->currency = 'руб.';
        $order->sum = $_SESSION['cart.sum'];
//сохраняет запись и возвращает id этой записи
        $order_id = \R::store($order);
        self::saveOrderProduct($order_id);
        return $order_id;
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
//отправка письма менеджере магазина и клиенту
    public static function mailOrder($order_id, $user_email){
        // Create the Transport
        try{
            $transport = (new Swift_SmtpTransport(App::$app->getProperty('smtp_host'), App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
            ->setUsername(App::$app->getProperty('smtp_login'))
            ->setPassword(App::$app->getProperty('smtp_password'))
        ;
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        ob_start();
        require APP.'/views/mail/mail_order.php';
        $body = ob_get_clean();

        $message_client = (new Swift_Message("Вы совершили заказ №{$order_id} на сайте " . App::$app->getProperty('shop_name')))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo($user_email)
            ->setBody($body, 'text/html')
        ;

        $message_admin = (new Swift_Message("Сделан заказ №{$order_id}"))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
            ->setTo(App::$app->getProperty('admin_email'))
            ->setBody($body, 'text/html')
        ;

        // Send the message
        $result = $mailer->send($message_client);
        $result = $mailer->send($message_admin);

        }catch (\Exception $e){

        }
    //     debug($_SESSION ,true);
    //    debug($_SESSION['cart'],true);
        unset($_SESSION['cart']);
        unset($_SESSION['cart.qty']);
        unset($_SESSION['cart.sum']);
        unset($_SESSION['cart.currency']);
        $_SESSION['success'] = 'Ваш заказ №'.$_SESSION['payment']['id'].'
         В ближайшее время с Вами свяжется менеджер для согласования заказа';
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

}