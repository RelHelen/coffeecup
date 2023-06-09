<?php

namespace app\models;

use fw\base\Model;
use fw\Db;

class User extends Model
{
    public $table = 'users';
    public $pk = 'id';
    //поля ожидаем из формы для регистрации
    public $attributes = [
        'login' => '',
        'password' => '',
        'mail' => '',
        'phone' => '',
        'fio' => '',
        'role' => '',
        'data_reg' => ''

    ];

    public $rules = [
        'required' => [
            ['login'],
            ['password'],
            ['phone'],
        ],
        'email' => [
            ['mail'],
        ],
        'lengthMin' => [
            ['pass', 6],
        ],
    ];


    /**
     *получение id пользователя из users по логину
     */
    public  function getIdUserByLogin($login)
    {
        $usersParam = [
            'login' => $login
        ];
        $user  = $this->getAssocArr("SELECT id FROM users WHERE login=:login LIMIT 1", $usersParam);
        return $user['id'];
    }

    /**
     * проверка уникальности логина-почты
     */
    public  function checkUnique()
    {

        $params = [
            'login' => $this->attributes['login'],
            'mail' => $this->attributes['mail'],
            'phone' => $this->attributes['phone'],
        ];
        $users = $this->findBySql('SELECT * FROM users WHERE login =:login OR MAIL = :mail OR PHONE = :phone ', $params);
        // debug($users);
        if ($users) {
            foreach ($users as  $user) {
                // проверка на совпадение логина
                if ($user['login'] == $this->attributes['login']) {
                    // debug($user['login']);
                    $this->errors['unique'][] = 'Этот логин уже занят';
                    return false;
                }
                // проверка на совпадение почты
                elseif ($user['MAIL'] == $this->attributes['mail']) {
                    //  debug($user['MAIL']);
                    $this->errors['unique'][] = 'Эта почта уже используется';
                    return false;
                }
                // проверка на совпадение телефона
                elseif ($user['PHONE'] == $this->attributes['phone']) {
                    // debug($user['PHONE']);
                    $this->errors['unique'][] = 'Этот телефон уже используется';
                    return false;
                }
            }
        }
        return true;
    }
    /**
     * Вставка строки в таблицу user 
     * @return
     */
    public function insertSingleRow($table)
    {
        $this->attributes['data_reg'] = date("Y-m-d H:i:s");
        $sql = "INSERT INTO $table ( 
                 login,
                 password,
                 fio,
                 mail,                
                 phone,
                 role,
                 data_reg                         
            )
            VALUES (
                 :login,
                 :password,
                 :fio,
                 :mail,                
                 :phone,
                 :role,
                 :data_reg              
            )";

        $params = [
            'login' => $this->attributes['login'],
            'password' => $this->attributes['password'],
            'mail' => $this->attributes['mail'],
            'fio' => $this->attributes['fio'],            
            'phone' => $this->attributes['phone'],
            'role' => $this->attributes['role'],
            'data_reg' => $this->attributes['data_reg']
        ];

        // debug($this->attributes['users_data_reg']);
        // foreach ($params as $value) {
        //     echo gettype($value), "\n";
        // }
        // die;
        $res = $this->pdo->execute($sql, $params);
        return $res;
        //$id_u = $this->pdo->lastInsertId(); //номер последнего индекса


        // if ($this->insertSingleRowCust('customers', $id_u) > 0) {
        //     return $res;
        // }
    }
    /**
     * Вставка строки в таблицу customer
     * @return
     */
    public function insertSingleRowCust($table, $id_u)
    {

        $sql = "INSERT INTO $table (ID_U,FIO)
            VALUES (
                 :id_u,
                 :fio 
            )";

        $params = [
            'id_u' => $id_u,
            'fio' => $this->attributes['fio']
        ];

        // debug($this->attributes['users_data_reg']);
        // foreach ($params as $value) {
        //     echo gettype($value), "\n";
        // }
        // die;
        $res = $this->pdo->execute($sql, $params);

        $this->pdo->lastInsertId(); //номер последнего индекса
        return $res;
    }

    /**
     * логин
     * @param bool $isLogin     
     * проверка  логина с бд при авторизации
     */
    public  function isLogin($isAdmin = false)
    {
        // debug($_POST);
        $login = !empty(trim($_POST['login']))
            ? filter_var(trim($_POST['login']), FILTER_UNSAFE_RAW)
            : null;
        $pass = !empty(trim($_POST['password']))
            ? filter_var(trim($_POST['password']), FILTER_UNSAFE_RAW)
            : null;

        if ($login && $pass) {

            $params = [
                'login' => $login
            ];
            if ($isAdmin) {
                //авторизация админа для админки
                if (isset($_SESSION['user'])) {
                    unset($_SESSION['user']);
                };
                $params = [
                    'login' => $login,
                    'role' => 'admin'
                ];
                $user = $this->getAssocArr('SELECT * FROM users WHERE login=:login AND role=:role LIMIT 1', $params);
            } elseif($isMenedger){
                //авторизация админа для админки
                if (isset($_SESSION['user'])) {
                    unset($_SESSION['user']);
                };
                $params = [
                    'login' => $login,
                    'role' => 'menedger'
                ];
                $user = $this->getAssocArr('SELECT * FROM users WHERE login=:login AND role=:role LIMIT 1', $params);
            }
            else {
                //авторизация обычного пользователя
                //из таблицы users получаем запись по  логину 
                $user =  $this->getAssocArr('SELECT * FROM users WHERE login=:login  LIMIT 1', $params);
                // debug($user);
            }
            if ($user) {
                // debug($user);
                //сравниваем пароль с hash паролем из бд таблицы users и создаем сессию
                if (password_verify($pass, $user['password'])) {
                    foreach ($user as $key => $val) {
                        $_SESSION['user'][$key] = $val;
                        //debug($_SESSION);
                        //ключ - название полей таблицы
                        if ($key == 'login' || $key == 'role') {
                            //$_SESSION['user'][$key] = $val;

                        }
                        if (!$isAdmin) {
                            //поиск клиента
                            $modelCustomers = new Customers;
                            //debug($user['id']);
                            $idCustomers = $modelCustomers->getIdCustomer($user['ID']);
                            //debug($idCustomers);
                            if ($idCustomers) {
                                $_SESSION['customer']['id'] = $idCustomers;
                            }

                            //  $_SESSION['user']['admin'] = 'admin';
                        }
                    }
                    return true;
                }
            }
        }
        return false;
    }


    //проверка что пользователь авторизован как admin
    public static function isAdmin()
    {
        //если существует в сессии пользователь
        //и он является  администратором
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin');
    }
    //проверка что пользователь авторизован как менеджер
    public static function isMenedger()
    {
        //если существует в сессии пользователь
        //и он является  менеджер
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'menedger');
    }
    //проверка что пользователь авторизован как user
    public static function isUser()
    {
        return (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'user');
    }
}
