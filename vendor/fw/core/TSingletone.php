<?php
namespace fw;
trait TSingletone
{
    private static $instance;
     public static function instance()
    {
        //если свойство объекта пусто то ложим туда объект
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }
}
