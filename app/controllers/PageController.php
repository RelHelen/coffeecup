<?php

/** Главная страница 
 */

namespace app\controllers;

//use fw\Db;
//use fw\base\View;
 //use app\models\Main;

class MainController 
//extends AppController
{
  // public function __construct($route)
  // {
  // //  parent::__construct($route);
  // }

  public function indexAction()
  {
    echo __METHOD__;
    echo "bdfhfghdg";
   // $this->setTitle('О салоне');
    // $model = new Main;
    // $vidUslug = $model->getVidUslug();
    // $promotions = $model->getPromotion();
    // $persons = $model->getPerson();
   // $this->setData(compact('vidUslug', 'promotions', 'persons'));
  }
  public function viewAction()
  {
    echo __METHOD__;
   
  }
}
