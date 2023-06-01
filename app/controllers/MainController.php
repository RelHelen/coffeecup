<?php

namespace app\controllers;
use fw\Db;
use fw\base\View;
use app\models\Main;
use fw\Cache;

class MainController extends AppController {
    public function __construct($route)
  {
    parent::__construct($route);
     
  }
    public function indexAction(){        
//        $this->layout = 'test';
//        echo __METHOD__;
$model = new Main;

 $namesite= $this->namesite;;
 $this->setData(compact('namesite'));
    
    }

}