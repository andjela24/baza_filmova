<?php

class Konekcija
{
    
    private static $_instance = null;
    private function __construct(){}
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new PDO("mysql:host=localhost; dbname=baza_filmova", "root", "");
        }
        return self::$_instance;
    }
}