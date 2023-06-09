<?php

namespace fw\base;
use fw\base\View;
abstract class Controller{
/** 
   *  текущий маршрут и парметры (controller,action,params)
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
   
    public $model;     
    public $prefix;     
    public $data = [];
     

    public function __construct($route){
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function getView(){
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta, $this->title);
        $viewObject->render($this->vars);
    }

    public function setData($vars){
        $this->vars = $vars;
    }
    public function set($vars){
      $this->vars = $vars;
  }

    public function setMeta($title = '', $desc = '', $keywords = ''){
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