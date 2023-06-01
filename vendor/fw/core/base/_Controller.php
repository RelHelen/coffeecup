<?php

/**базовый класс контроллера
 *  определяет, какой вид будет для метода конторллера
 *  передается из $contrObj=new $controller(self::$route); 
 */

namespace fw\base;

use fw\base\View;

abstract class Controller
{

  /** 
   *  массив с текущим маршрут и парметры (controller,action,params)
   *  @var array
   */
  public $route = [];

  /** 
   *  текущий вид  
   *  @var string
   */
  public $view;
  /** 
   *  текущий контроллер  
   *  @var string
   */
  public $controller;
  public $model;
  /** 
   *  текущий  шаблон
   *  @var string
   */
  public $layout;

  /** Пользовательские данные
   *  обмен переменными
   *   @var array   
   */
  public  $vars = [];
  public  $data = [];
  /** 
   *  мета данные
   *  @var array
   */
  public  $meta = [
    'title' => '',
    'desc' => '',
    'keywords' => ''
  ];
  public $title = 'Просмотр данных';
  public $prefix;
   public $titleAdmin;
   
  public function __construct($route)
  {
    $this->route = $route;
    $this->controller = $route['controller'];
    $this->view = $route['action'];
    $this->model = $route['controller'];   
    $this->prefix = $route['prefix'];

    //include APP."/views/{$route['controller']}/{$route['action']}.php"; 
  }
//получаем вид из View
//вызывается в Router
  public function getView()
  {
    //объект вида
    $vObj = new View($this->route, $this->layout, $this->view, $this->meta, $this->title, $this->titleAdmin);
    $vObj->render($this->vars);
  }

  /**
   * метод передачи переменных из контроллеров в виды
   */
  public function setData($vars)
  {
    $this->vars = $vars;
  }
  
  //Устанавливает метаданные
  public function setMeta($title = '', $desc = '', $keywords = '')
  {
    $this->meta['title'] = $title;
    $this->meta['desc'] = $desc;
    $this->meta['keywords'] = $keywords;
  }

  /**
   * метод установки Заголоквка на странице
   */
  public function setTitle($title)
  {
    return $this->title = $title;
  }

  /**
   * метод установки Заголоквка на странице в админке
   */
  public function setAdminTitle($titleAdmin)
  {
    return $this->titleAdmin = $titleAdmin;
  }

  /**
   * метод чтения Заголокка на странице
   */
  public function getTitle()
  {

    return $this->title;
  }

  /**
   * проверка что пришел ajax запрос
   */
  public function isAjax()
  {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
  }

  /**Подключаем вид при Ajax запросе
   * принимает вид $view, который должны подключить (Main/test)
   * $vars - параметры при подключения
   * 
   */
  public function loadView($view, $vars = [])
  {
    //извлекаем из массива переменные
    extract($vars);

    require APP . "/views/{$this->route['prefix']}{$this->route['controller']}/{$view}.php";
    die;
  }
}
