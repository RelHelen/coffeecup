<?php

namespace app\controllers;


use fw\App;
use fw\base\Controller;
use fw\base\Model;
use fw\Cache;
use fw\Db;
use app\models\Main;
//use app\models\User;

use app\models\AppModel;
class AppController extends Controller{
    public $menu;
  public $meta = [];
  public $model;
  public $user;
  public $namesite;
  public function __construct($route)
  {
    parent::__construct($route); //сначало выполняем родительский конструктор
    //$this->destSession();
    //debug($route);
    //создали модель 
    new AppModel();   
    if ($_SESSION) {
        // debug($_SESSION, true);
    };
    $model = new Main;
    $setings = $model->getSettings();
    //сохраним настройки сайта в кеш
    $cache = Cache::instance();
    $dataSetings=$cache->get('setings');
    if(!$dataSetings){
    $cache->set('setings',$setings,3600);
    }
    foreach ($dataSetings as $set) {
       if($set['option']=='sitename'){$this->namesite=$set['value'];}
    }
     //"Кафейня Чашка кофе"
    $this->setMeta($this->namesite,"Кафейня Чашка кофе","кофе, пить кофе");
    $this->setTitle($this->namesite); 
    // $this->setMeta("Кафейня Чашка кофе","Кафейня Чашка кофе","кофе, пить кофе");
    // $this->setTitle("Кафейня Чашка кофе");   
    $this->layout = 'default';
    
}
/**
   * проверка, что пользовтаель авторизован и имеет доступ к странице
   */
  public  function isUserLog($action, $controller)
  {
    if ($this->user::isUser() && $this->route['action'] == $action && $this->route['controller'] == $controller) {
      return true;
    }
  }
  /**
   * удаление сессий
   */
  public  function destSession()
  {
    session_destroy();
  }

  /**
   * 
   * вернет login user из сессии
   */
  public static function logUser()
  {
    return $logUser = isset($_SESSION['user']['login']) ? hsc($_SESSION['user']['login']) : null;
  }
  /**
   * 
   * вернет id клиента из сессии
   */
  public static function idCustomer()
  {
    return $idCustomer = isset($_SESSION['customer']['id']) ? hsc($_SESSION['customer']['id']) : null;
  }


}