<?php

namespace fw;

class Router{

    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = []){
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes(){
        return self::$routes;
    }

    public static function getRoute(){
        return self::$route;
    }

    public static function matchRoute($url)
    {
        // debug($url, true);
        foreach (self::$routes as $pattern => $route) {
            //если соответствие маршрутов найдено
            //то формируется $route
            //$matches 
            if (preg_match("#$pattern#i", $url, $matches)) {
               //debug($matches);
                //$route- хранит контроллер и метод
                foreach ($matches as $key => $val) {
                    if (is_string($key)) {
                        $route[$key] = $val;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                };

                //prefix для контроллера admin
                if (!isset($route['prefix'])) {
                    //если префикса не существует для пользовательской части
                    $route['prefix'] = '';
                } else {
                    $route['prefix'] = $route['prefix'].'\\'; //добавили слеш в конец
                }

                $route['controller'] = self::upperCamelCase($route['controller']);
                self::$route = $route; //текущий маршрут буде равен $route [controller] => Posts [action] => add )
                //debug($route, true); //хранит контроллер и метод
                return true; //адрес  найден 
            }
        }
        return false;  //адрес не найден     
    }

    /**метод: перенаправляет url по корректному маршруту $controller
     * вызывает конторлер если маршрут найден (matchRoute - true)   
     * @param string $url - входящий url
     * return  void - ничего не возвращате
     * */
    public static function dispatch($url)
    { //var_dump($url);
        $url = self::removeQueryString($url);
       
        if (self::matchRoute($url)) {
            //в  $controller помещаем реззульат контроллера
            //$controller=self::$route['controller'];

            $control = self::$route['prefix'].self::$route['controller'];

            $controller = 'app\controllers\\'.self::$route['prefix'].self::$route['controller'].'Controller';


            if (class_exists($controller)) {
                $contrObj = new $controller(self::$route);
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';


                //если метод  $action сущекствует у объекта $contrObj, то запустим его
                if (method_exists($contrObj, $action)) {
                    $contrObj->$action();
                    $contrObj->getView();
                } else {
                    //echo "<p>метод $controller::$action не найден</p>";
                    //пишем исключение для ненайденой страницы
                    throw new \Exception("Метод $controller::$action не найден", 404);
                }
                //echo 'ok';
            } else {
                //echo "<p>контроллер $controller не найден</p>";
                //пишем исключение для ненайденой страницы
                throw new \Exception("Контроллер $controller не найден", 404);
            }
        } else {
            // http_response_code(404);//отправляем код ошибки
            // include '404.php';

            //пишем исключение для ненайденой страницы
            throw new \Exception("Страница не найдена", 404);
        }
    }


    /**метод: преобразовывает имя контролеера в заглавные символы
     *  текст вида page-new в  PageNew
     * @param string $name - входящий url
     * @return  void - ничего не возвращате
     * */
    protected static function upperCamelCase($name)
    {
        // $name = str_replace('-', ' ', $name);
        // $name = ucwords($name);
        // $name = str_replace(' ', '', $name);
        //debug($name);
        //return $name;
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    /**метод: преобразовывает имя метода 2 слово в заглавные символы
     *  текст вида page-test в  pageTest
     * @param string $name - входящий url
     * @return  void - ничего не возвращате
     * */
    protected static function lowerCamelCase($name)
    {
        $namestr = self::upperCamelCase($name);
        //  debug($namestr);         
        return lcfirst($namestr);
    }


    /** Обрезает возможные get парметры  
     * @param string $url - значения url после /
     * post-new/test/&f=1&a=3
     * */
    protected static function removeQueryString($url)
    {
         //var_dump($url); //post-new/test/&f=1&a=3
        if ($url) {
            $pararams = explode('&', $url, 2); //создали массив из двух элементов, разделенных $
            //var_dump($pararams);
            /**
             * http://localhost/netcloud/post-new/test/?f=1&a=3
             *           pararams будет равен 
            
             *  [0] => post-new/test/ (нет знака =)
             *  [1] => f=1&a=3 (есть знак =) -явные get параметры ,стоят после &       
            
             */

            //вырезаем явные параметры $pararams[1]:
            //если в $pararams[0] нет "=", то его вернем,значит там нет гетзапроса
            if (false === strpos($pararams[0], '=')) {
                return rtrim($pararams[0], '/'); //удаляем в конце слеш
            } else {
                return '';
            }
        }
        return $url;
    }
}