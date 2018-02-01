<?php


class App{
    
    
    private $db;
    private $routes;
    private $url;
    
    public function __construct(){
        
        $this->db=new DB(Config::get("Db_Connection"));
        $this->routes=Config::get("routes");
        
    }
    
    public function run($url){
        
        $this->url=$url;
        
        var_dump($this->url);
        die;
        
        
        
        
        
        
    }
    
    
    
    
}