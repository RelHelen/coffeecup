<?php
require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';
require_once CONF . '/routes.php';
//функция атозагрузки объектов Registry
new \fw\App;
//положить параметр
//\fw\App::$app->setProperty('message','Спасибо за ваш заказ!');
//взять параметры
 //debug(\fw\App::$app->getProperties());
 // debug(\fw\Router::getRoutes());