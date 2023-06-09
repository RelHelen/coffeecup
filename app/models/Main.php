<?php

namespace app\models;

use fw\base\Model;
use fw\Db;

class Main extends Model
{
  public $table = 'setting';
  public $pk = 'id';
  
  public function getSettings()
  {
    $data = $this->findAll();
    return $data;
  }  
 
  
}
