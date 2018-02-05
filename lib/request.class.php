<?php



class Request{
    
    public $post;
    public $get;
    public $server;
    
    
    public function __construct(){
        
       $this->post=$_POST; 
       $this->get=$_GET;
       $this->server=$_SERVER;
        
    }
    
    public function getPost(){
        return isset ($this->post)? $this->post :null;  
    }
    
     public function get($key,$default=null){
        
        return isset ($this->get[$key])? $this->get[$key] :$default;  
        
    }
    
     public function getPostKey($key,$default=null){
        
        
     return isset ($this->post[$key]) ? $this->post[$key] :$default;  
        
        
        
    }
    
    public function getMethod() {
        
        
      return strtolower($this->server['REQUEST_METHOD']);  
        
        
    }

    
    
   public function isPost(){
       
       
    return $this->getMethod()=='post' ;  
       
       
       
   }
    
    
    
}