<?php

namespace app\models\admin;

class User extends \app\models\User {

    public $attributes = [
        'login' => '',
        'password' => '',
        'fio' => '',
        'mail' => '',
        'phone' => '',        
        'role' => '',
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
            ['password', 6],
        ],
    ];

    public function checkUnique(){
        $user = \R::findOne('user', '(login = ? OR mail = ?) AND id <> ?', [$this->attributes['login'], $this->attributes['mail'], $this->attributes['id']]);
        if($user){
            if($user->login == $this->attributes['login']){
                $this->errors['unique'][] = 'Этот логин уже занят';
            }
            if($user->email == $this->attributes['mail']){
                $this->errors['unique'][] = 'Этот email уже занят';
            }
            return false;
        }
        return true;
    }

}