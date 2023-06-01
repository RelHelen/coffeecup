<?php

namespace app\models;

use fw\core\base\Model;
use app\models\User;
use fw\core\Db;
//use JetBrains\PhpStorm\Internal\ReturnTypeContract;

class Booking extends Model
{
  public $table = 'order_u';
  // public $pk = 'contr_id_cust';
  public $pk = 'id';
  public $user;
  public $customers;
  public $contracts;
  public $contract;
  public $uslugi;
  public  $idUser;

  public function getContracts($start, $perpage)
  {
    // $contacts = $this->findSql(
    //   "SELECT * FROM order_u ORDER BY status, DATA_VISIT  LIMIT {$start} ,{$perpage}"
    // );
    $contacts = $this->findSql(
      "SELECT  order_u.ID_O, 
       order_u.num ,
       order_u.ID_U,
       order_u.status,        
       order_u.DATA_VISIT ,
       order_u.DATA_F, 
       order_u.DATA_S,      
       ROUND(SUM(detali_o.PRICE),2) AS COST,
       order_st.NAME,
       users.ID,       
       users.FIO, users.PHONE  
       FROM order_u 
      JOIN users ON order_u.ID_U=users.ID
      JOIN  order_st   ON order_u.status=order_st.ID_s
      LEFT JOIN  detali_o ON order_u.ID_O=detali_o.ID_O
      GROUP BY order_u.ID_O ORDER BY status, DATA_VISIT  LIMIT {$start} ,{$perpage}"
    );

    // $contra = $this->findSql("SELECT *, ROUND(SUM(detali_o.PRICE),2) AS COST  FROM order_u 
    // JOIN  order_st as st ON order_u.status=st.ID_s
    // LEFT JOIN  detali_o ON order_u.ID_O=detali_o.ID_O
    // WHERE order_u.ID_U=:id  GROUP BY order_u.ID_O", $param);

    foreach ($contacts  as $kay => $value) {
      $contactsAll[$kay] = $value;
    }
   // debug($contactsAll);
    return  $contactsAll;
  }



  /**
   * получение договора  по id договора
   * из БД
   */
  public function getContractSql($num)
  {
    $contractParam = [
      'num' => $num
    ];
    
   // $contract = $this->getAssocArr("SELECT * FROM order_u WHERE ID_O=:num  LIMIT 1", $contractParam);
   $contract = $this->getAssocArr("SELECT  
   order_u.ID_O, 
   order_u.num ,
   order_u.ID_U,
   order_u.status,        
   order_u.DATA_VISIT ,
   order_u.DATA_F, 
   order_u.DATA_S,      
   ROUND(SUM(detali_o.PRICE),2) AS COST,
   order_u.COMMENT,
   order_st.NAME,
   users.ID,       
   users.FIO, users.PHONE  
   FROM order_u 
  JOIN users ON order_u.ID_U=users.ID
  JOIN  order_st   ON order_u.status=order_st.ID_s
  LEFT JOIN  detali_o ON order_u.ID_O=detali_o.ID_O   
   WHERE order_u.ID_O=:num LIMIT 1 ", $contractParam);
//debug($contract );

    if ($contract) {
      return  $contract;
    } else {
      return false;
    }

  }
  /**
   * получение всех групп услуг   по номеру услуги
   * из БД
   */
  public function getSerByNum($id)
  {

    $param = [
      'id' => $id
    ];
    $contract = $this->findSql("SELECT ID,ID_GR FROM uslugi WHERE ID=:id", $param);

    foreach ($contract  as $kay => $value) {
      $serv[$kay] = $value;
    }

    if ($serv) {

      return  $serv;
    } else {
      return false;
    }
  }

  /**
   * получение договора по id  пользователя
   *  
   */
  public function getSerUser($id)
  {

    $param = [
      'id' => $id
    ];
    $contract = $this->findSql("SELECT * FROM order_u WHERE ID_U=:id", $param);

    foreach ($contract  as $kay => $value) {
    
      $serv[$kay] = $value;
     
    }
    if(isset($serv)) {
      return  $serv;
    } else {
      return false;
    }
  }
  /**
   * получение договора по клиенту  
   *  
   */
  public function getSerCustomer($id)
  {
    $param = [
      'id' => $id
    ];
     $contracts = $this->findSql("SELECT *, ROUND(SUM(detali_o.PRICE),2) AS COST  FROM order_u 
     JOIN  order_st as st ON order_u.status=st.ID_s
     LEFT JOIN  detali_o ON order_u.ID_O=detali_o.ID_O
     WHERE order_u.ID_U=:id  GROUP BY order_u.ID_O", $param);
    // $contract = $this->findSql("SELECT order_u.ID_O,order_u.num, order_u.DATA_VISIT, order_u.DATA_F, order_u.COMMENT,order_u.status,  ROUND(SUM(detali_o.PRICE),2) AS COST   FROM (order_u 
    //  JOIN detali_o ON order_u.ID_O=detali_o.ID_O)
    // WHERE order_u.ID_U=:id GROUP BY order_u.ID_O", $param);

    foreach ($contracts  as $kay => $value) {
      $contract[$kay] = $value;
    }
   
    if(isset($contract)) {
      return  $contract;
    } else {
      return false;
    }
  }


  /**
   * получение списка деталей по договору
   *  
   */

  public function getDetal($num)
  {
    $contractParam = [
      'num' => $num
    ];
    $data = $this->findSql("SELECT * FROM detali_o  WHERE ID_O=:num ", $contractParam);
     
    $uslugi = [];
    foreach ($data  as $kay => $value) {
      $numer = $value['ID_U'];
      $param = [
        'numer' =>  $numer
      ];
      $uslugi = $this->getAssocArr("SELECT * FROM uslugi  WHERE ID=:numer ", $param);
      foreach ($value as $kay => $val) {
        if ($kay == 'ID_U') {
          $list[$kay] = $val;
          $list['USLUGA'] = $uslugi['USLUGA'];
        } else {
          $list[$kay] = $val;
        }
      }
      $lists[] = $list;
    }
    if (isset($lists)) {
      return  $lists;
    } else {
      return false;
    }
  }
// установка номера договора для пользователя
  public function getNumContruct($idUser){
    if($this->getSerUser($idUser)){
      return count($this->getSerUser($idUser));
    }
    else {
      return 0;
    }    
  }
  public function getMonth($month){
    $k=0;
    $months = [
      'Январь',
      'Февраль',
      'Март',
      'Апрель',
      'Май',
      'Июнь',
      'Июль',
      'Август',
      'Сентябрь',
      'Октябрь',
      'Ноябрь',
      'Декабрь',
     ];
      foreach ($months as $key => $value) {
        if($value == $month){
         $k=$key;
         break;
        }
      }  
    return $k+1;

}
  public function setContruct($idUser,$NumContruct,$order){
    //вернет число месяц
   $mouth = $this->getMonth((string)$order[0]['mouth']);
   $date = (string)$order[0]['year'].'-'.(string) $mouth.'-'.(string)$order[0]['date'].' '.(string)$order[0]['time'].':0:0'; 
  
     $date_v = date('Y-m-d H:00', strtotime($date));
     $id_o=$this->insertOrderU($idUser,$NumContruct,$date_v);
   // debug($id_o);
    foreach ($order[1] as $ordervdate){
      debug($ordervdate);
      $this->insertOrderDet($id_o,$ordervdate['id'],$ordervdate['price']);
    }        
  
  }
  //обновление статауса в договоре
public function updateOrderStatus($id, $status){
  $sql = "UPDATE order_u SET status  =  $status  WHERE id_o = $id";
 
  $res = $this->pdo->execute($sql);
  $contract= $this->getContractSql($id); 
  return $contract; 
}

  //вставка строки в таблицу order_u
  public function insertOrderU($id_u,$num,$data_v)
  {     
      $sql = "INSERT INTO order_u (              
               num,
               ID_U,
               DATA_VISIT,                
               DATA_F,            
               status
          )
          VALUES (              
               :num,
               :ID_U,
               :DATA_VISIT,                
               :DATA_F,            
               :status             
          )";

      $params = [         
          'num' => $num,
          'ID_U' => $id_u,
          'DATA_VISIT' => $data_v,
          'DATA_F' => date("Y-m-d H:i"), 
          'status' => 1,         
      ];
      $res = $this->pdo->execute($sql, $params);     
      $id_o = $this->pdo->lastInsertId(); //номер последнего индекса
       
    return $id_o;      
  }
  //вставка строки в таблицу order_u
  public function insertOrderDet($id_o,$id_u,$price)
  {     
      $sql = "INSERT INTO detali_o (              
               ID_O,
               ID_U,
               PRICE             
          )
          VALUES (              
              :ID_O,
              :ID_U,
              :PRICE             
          )";

      $params = [         
          'ID_O' => $id_o,
          'ID_U' => $id_u,
          'PRICE' => $price        
      ];

      $res = $this->pdo->execute($sql, $params);       
      return $res;

     
  }
  public function getViewed()
  {
    if (!empty($_COOKIE['recentlyViewed'])) {
      $recentlyViewed = $_COOKIE['recentlyViewed'];
      $recentlyViewed = explode('.', $recentlyViewed);
      // return array_slice($recentlyViewed, -3);
      return $recentlyViewed;
    }
    return false;
  }

  public function getAllViewed()
  {
    if (!empty($_COOKIE['recentlyViewed'])) {
      return $_COOKIE['recentlyViewed'];
    }
    return false;
  }

   //удалить  заказ
   public function deleteOrder($id){
    $param = [
      'id' => $id
    ];
    
    $sql = "DELETE from order_u  WHERE ID_O=$id";
 
    $res = $this->pdo->execute($sql);
     
    return $res; 
   }
}
