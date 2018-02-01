<?php

class Config {
    
    private static $setting=array();
    
    
 public static function  set($key,$value) {
    
    self::$setting[$key];
    
 }   
    
 public static function  get($key,$default=null) {
    
    
    if(isset(self::$setting[$key])){
        return  self::$setting[$key]; 
    }
       return $default;
    
 }      
    
    
    
}