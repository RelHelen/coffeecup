<?php

/** Главная страница 
 */

namespace app\controllers;

use fw\core\Db;
use fw\core\base\View;
use app\models\Serv;

class BookingController extends AppController
{

    public function __construct($route)
    {
        parent::__construct($route);
    }
    public function indexAction()
    {
        $this->layout = 'default';
        $model = new Serv;
        $vidServices =  $model->getVidServices();
        $grServices = $model->getServicesAll();
        $services = $model->Services();
        $this->setData(compact('vidServices', 'grServices', 'services'));
    }
}
