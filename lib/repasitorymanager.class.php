<?php



class RepasitoryManager{
    
    
 private $repasitories=array();
 
 
 
 public function __construct(){
  
  
  return $this;
  
 }
 
 
 public function set($key,$value){
     
   $repasitories[$key]=$value;  
     
 }
    
 
 public function has($key){
     
     
  return isset($repasitories[$key]) ;  
     
 }
 
 
 public function get($key){
     
     
     if($this->has($key)){
         
        return $repasitories[$key] ;
         
     }
     
  $model_path = MODEL_DIR.DS.strtolower($key).'.php';
  
 
  
  
  if(!file_exists($model_path)){
   
   throw new \Exeption("$key.Model not found");
   
  }
  
  $class=strtolower($key);
  
  
  
 $repo_class= new $class();
 
 $this->set($key,$repo_class);
 
  
 return $repo_class; 
     
     
 }
    
    
}