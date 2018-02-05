<?php


class Controller{
    
      public  $container;
      public  $params;
      public  $data;
      public  $router;
      
      public  function __construct($data=array()){
          
          
          $this->router=App::$router;
          $this->container=require(ROOT.DS.'service'.DS.'container.php');;
          
      }
      
      
      public function render($view=null){
          
          if(is_null($view)){
                
           $path=VIEWS_DIR.DS.strtolower($this->router->getController()).DS.strtolower($this->router->getMethod()).".html"; 
           
           
                
          }else{
                
           $path=VIEWS_DIR.DS.strtolower($this->router->getController()).DS.strtolower($view).".html";     
                
           }
           
           
           if(!file_exists($path)){
               
               throw new Exeption("Error, not exists path views =".$path);
           }
           
          
                
           $data=$this->data;
           ob_start();
           include($path);
           $content=ob_get_clean(); 
           
           
           $layout=VIEWS_DIR.DS.Config::get("layout").".html";
           
           if(!file_exists($layout)){
               
               throw new Exeption("Error, not exists path layout =".$path);
           }
           
           
           ob_start();
           include($layout);
           $view=ob_get_clean();
           
           echo $view;     
                
          }
          
          
          public  function redirect($location){
            header("Location: $location");
            } 
          
          
          
      }
      
      
      
    
    
    
    
    
    
    
    
    
    
