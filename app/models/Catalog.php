<?php

namespace app\models;

use fw\base\Model;
use fw\Db;

class Catalog extends Model
{
  public $table = 'catalog';
  public $tableProduct = 'product';
  public $tableMap = 'mappoint';
  public $pk = 'id';
  public $VidServices;
  //получить все точки 
  public function getPointers()
{
    $results = $this->findAll('mappoint');
return $results;
}
  //получить заданную точки 
  public function getPointerOune($point_id)
{
    $point = \R::find("SELECT `mappoint`.* FROM `mappoint`  WHERE `mappoint`.`id` = ? ",[$point_id]);;

return  $point;
}
  
  
 

   
  
}
