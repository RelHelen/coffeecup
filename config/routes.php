<?php
//подключаем Router
use fw\Router;

Router::add('^services/(?P<alias>[a-z0-9-_]+)/?$', ['controller' => 'services', 'action' => 'index']);
Router::add('^services/(?P<alias>[a-z0-9-_]+)/(?P<dev>[a-z0-9-_]+)?$', ['controller' => 'services', 'action' => 'single']);

/**
 * при обращении к несуществующему контролеру и методу  (pages) переходим на main/index
 */
Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'Main', 'action' => 'index']);
/**
 * просмотр для контроллера:Page дефолтного вида
 */
Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);
Router::add('^page$', ['controller' => 'Page', 'action' => 'view']);
/**
 * правило для админки
 */
Router::add('^ncadmin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'ncadmin']);
Router::add('^ncadmin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'ncadmin']);

/**
 * правило для пустой строки
 * это главная страница
 * defaults routers
 */
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
/**
 * правило для всех контроллеров и методов(видов)
 */
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

//Router::dispatch($query);
