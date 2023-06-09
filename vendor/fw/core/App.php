<?php

namespace fw;

use fw\ErrorHandler as CoreErrorHandler;
use fw\Registry;
use fw\ErrorHandler;
use fw\Router;

class App
{
	public static $app;
	// $app - контейнер чтобы положить свойства и взять
	public function __construct(){
		 //запрос от пользователя
		 //обрезаем в конце слеш
		 $query = trim($_SERVER['QUERY_STRING'], '/');
		 session_start();
		 self::$app = Registry::instance();
		 new ErrorHandler();
		 Router::dispatch($query);
		 self::getParams();
    }

    protected function getParams(){
        $params = require_once CONF . '/params.php';
        if(!empty($params)){
            foreach($params as $k => $v){
                self::$app->setProperty($k, $v);
            }
        }
    }
}
