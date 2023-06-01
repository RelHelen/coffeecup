<?php

namespace app\controllers;
use fw\Db;
use fw\base\View;
use app\models\Catalog;
use fw\Cache;

class CatalogController extends AppController {
     public $layout = 'catalog';
     public $dataPointers;
     public $pointers;
     public $model;
     public $pointersMap;
     public function __construct($route){
       
         parent::__construct($route);
         // debug($route);
        
         $model = new Catalog;
         $pointersMap = $model->getPointers();
         //сохраним точки в кеш
         $cache = Cache::instance();
         $dataPointers=$cache->get('pointers');
         if(!$dataPointers){
         $cache->set('pointers',$pointersMap,3600); 
        }
          
         }
        //  foreach ($dataPointers as $set) {
        //     if($set['option']=='sitename'){$this->namesite=$set['value'];}
        //  }
      
    public function indexAction(){
                
     $this->layout='catalog';
     $model = new Catalog;
     $pointersMap = $model->getPointers();
     //сохраним точки в кеш
     $cache = Cache::instance();
     $dataPointers=$cache->get('pointers');
     if(!$dataPointers){
     $cache->set('pointers',$pointersMap,3600); 
    }
     $pointers= $dataPointers;     
     $json = json_encode($pointers);//преобразовали в json
      
     //debug($json,true);
 
 $this->setData(compact('pointers')); 
 
          
}
public function mapAction(){
    $this->layout='layoutajax';
    $model = new Catalog;
    $pointersMap = $model->getPointers();
    //сохраним точки в кеш
    $cache = Cache::instance();
    $dataPointers=$cache->get('pointers');
    if(!$dataPointers){
    $cache->set('pointers',$pointersMap,3600); 
   }
    $pointers= $dataPointers;    
    $json = json_encode($pointers); 
    $this->setData(compact('json'));    
   if ($this->isAjax()) { 
       // $this->layout='layoutajax'; 
       // $pointers= $dataPointers;       
        $this->setData(compact('json')); 
       }
}

 
}
