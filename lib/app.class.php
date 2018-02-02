<?php


class App{
    
    
    public static  $db;
    public static  $router;
    public static  $request;
    
    
  
    
    public static function run($url){
        
        self::$db=new DB(Config::get("Db_Connection"));
        self::$router=new Router($url);
        self::$request=new Request;
        
        
        $controller=ucfirst(self::$router->getController())."Controller";
        $method=self::$router->getMethod()."Action";
      
      if(method_exists($controller,$method)){  
        $object=(new $controller)->$method(self::$request);
      }else{
          
         throw new Exception("Method '.$method.' of class '.$controller.' does not exist"); 
      } 
        
        
    }
    
    
    
    
}