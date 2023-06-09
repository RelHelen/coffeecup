<?php

namespace app\models;

use fw\base\Model;
use fw\Db;

class Customers extends Model
{
   // public $table = 'customers';
   public $table = 'users';
    // клиенты и пользователи
    public function getCustomersUser($start, $perpage)
    {
         
        $contacts = $this->findSql(
            "SELECT * FROM users  WHERE role='user' ORDER BY FIO LIMIT {$start} ,{$perpage}"
        );
        // $contacts = $this->findSql(
        //     "SELECT customers.ID , customers.FIO, customers.PHONE,customers.mail, users.ID AS ID_U, users.login,users.password FROM customers 
        //     LEFT JOIN users ON customers.ID_U=users.ID
        //     ORDER BY customers.FIO   LIMIT {$start} ,{$perpage}"
        // );
       
        foreach ($contacts  as $kay => $value) {
            $contactsAll[$kay] = $value;
        }
       
        return  $contactsAll;
    }
    
    // клиенты 
    public function getCustomers($start, $perpage)
    {
        $contacts = $this->findSql(
            "SELECT * FROM customers ORDER BY FIO   LIMIT {$start} ,{$perpage}"
        );

        foreach ($contacts  as $kay => $value) {
            $contactsAll[$kay] = $value;
        }
        return  $contactsAll;
    }
    /**персонал */
    public function getPesonals($start, $perpage)
    {
        $contacts = $this->findSql(
            "SELECT * FROM persons ORDER BY FIO   LIMIT {$start} ,{$perpage}"
        );

        foreach ($contacts  as $kay => $value) {
            $contactsAll[$kay] = $value;
        }
        return  $contactsAll;
    }
    /**персонал сгруппирован по услугам с выводом имени услуги*/
    public function getPersonSevices()
    {

        $data = $this->findSql(
            "SELECT masser.ID_P,masser.ID_G, grup_u.NAME_GR FROM masser  
            JOIN grup_u ON grup_u.ID_GR=masser.ID_G"
        );

        foreach ($data  as $kay => $value) {
            $person[$kay] = $value;
        }
        //debug($person);
        return $person;
    }
    /**персонал сгруппирован по услугам с выводом имени мастера*/
    public function getPersonName()
    {
        // $data = $this->findSql(
        //     "SELECT masser.ID_P,masser.ID_G, persons.FIO FROM masser  
        //      JOIN persons ON persons.ID_P=masser.ID_P"
        // );
        $data2 = $this->findSql(
            "SELECT masser.ID_P,masser.ID_G, persons.FIO, uslugi.ID, uslugi.ID_GR,uslugi.USLUGA FROM masser  
             JOIN persons ON persons.ID_P=masser.ID_P
             JOIN uslugi ON uslugi.ID_GR=masser.ID_G"
        );

        // foreach ($data  as $kay => $value) {
        //     $person[$kay] = $value;
        // }
        foreach ($data2  as $kay => $value) {
            $persons2[$kay] = $value;
        }
        //debug($persons2);
        //debug($person);
        return $persons2;
    }
    /**персонал сгруппирован по услугам с выводом имени мастера поском по ID услуги*/
    public function getPersonNameId($id)
    {
        $param = [
            'id' => $id
        ];

        $data2 = $this->findSql(
            "SELECT masser.ID_P,masser.ID_G, persons.FIO, uslugi.ID, uslugi.ID_GR,uslugi.USLUGA FROM masser  
             JOIN persons ON persons.ID_P=masser.ID_P
             JOIN uslugi ON uslugi.ID_GR=masser.ID_G
             WHERE masser.ID_G=:id
             ",
            $param
        );

        foreach ($data2  as $kay => $value) {
            $persons2[$kay] = $value;
        }
        //debug($persons2);
        //debug($person);
        return $persons2;
    }

    /**
     * получение id клиента по id пользователю
     */
    public  function getIdCustomer($id)
    {
        $customersParam = [
            'id' => $id
        ];
        $customers = $this->getAssocArr("SELECT * FROM customers WHERE ID_U=:id LIMIT 1", $customersParam);

        if ($customers) {
            return $customers['ID'];
        }
        return false;
    }

    /**
     * получение   клиента по id 
     */
    public  function getCustomer($id)
    {
        $customersParam = [
            'id' => $id
        ];
        $customers = $this->getAssocArr("SELECT * FROM users WHERE ID=:id LIMIT 1", $customersParam);
        if ($customers) {
            return $customers;
        }
        return false;
    }

    /**
     * получение   клиента по id клиента
     */
    public  function getCustomerRow($id)
    {
        $customersParam = [
            'id' => $id
        ];
        $customers = $this->getAssocArr("SELECT * FROM customers WHERE id=:id LIMIT 1", $customersParam);
        if ($customers) {
            return $customers;
        }
        return false;
    }


    /**
     * детали по клиенту
     *  
    
     */
    public function getDetal($id)
    {
        $param = [
            'id' => $id
        ];
//debug($id,true);
        // $data = $this->findSql(
        //     "SELECT customers.ID , customers.FIO, customers.PHONE,customers.mail, users.ID AS ID_U, users.login,users.password,users.data_reg, order_u.ID_O, order_u.DATA_VISIT,  order_u.DATA_F,order_u.status FROM ((customers 
        //     LEFT JOIN users ON customers.ID_U=users.ID)
        //     JOIN order_u ON customers.ID_U=order_u.ID_U)
        //     WHERE  customers.ID=:id",
        //     $param
        // );
        // $data = $this->findSql(
        //     "SELECT customers.ID , customers.FIO, customers.PHONE,customers.mail, users.ID AS ID_U, users.login,users.password,users.data_reg FROM (customers 
        //     LEFT JOIN users ON customers.ID_U=users.ID)          
        //     WHERE  customers.ID=:id LIMIT 1",
        //     $param
        // );
        $data = $this->findSql(
            "SELECT * FROM users         
            WHERE  ID=:id LIMIT 1",
            $param
        );
       // debug($data,true);
        foreach ($data  as  $value) {
            $customer  = $value;
        }

        return  $customer;
    }
}
