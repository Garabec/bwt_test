<?php



class Router{
    
    private $method;
    private $controller;
    private $routers;
    
    
    
  public function __construct($url){
      
      
      $url_part= explode("?", urldecode(trim($url,"/")));
      
      $url_base=$url_part[0];
      
      
      $this->routers=Config::get("routers");
      
      $this->controller=Config::get("default_controller");
      $this->method=Config::get("default_method");
      
      foreach($this->routers as $pattern=> $route){
        
        if(preg_match("~^$pattern\/?$~",$url_base)){
          
            $path=preg_replace("~^$pattern\/?$~",$route,$url_base);
            
          $segments=explode("/",$path);
          $this->controller=array_shift($segments);
          $this->method=array_shift($segments);
          
          
           break;
          
        };  
          
          
      }
      
      
      
  }
    
    public function getController(){
      
      return $this->controller;
      
    }
    
    public function getMethod(){
      
      return $this->method;
      
    }
    
    public static function redirect($location){
        header("Location: $location");
    }
    
    
    
}