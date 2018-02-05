<?php


class DB{
    
    private $connection;
    
    
    public function __construct($data=array()){
      
      
        
      $this->connection=new Mysqli($data['host'],$data['user'],$data['password'],$data['db_name']);
      
    
      
      if($this->connection->errno){
          
        throw new Exeption("Error connection ".$this->connection->error) ; 
          
      }
      
      if(!$this->connection->set_charset("utf8")){
        
        throw new Exeption("Error upload chars utf8") ; 
        
      }
      
        
    }
    
    public function getConnection(){
        
        return $this->connection;
    }
  
   public function query($sql){
       
      if(!$this->connection){
        throw new Exeption("Not connection DB");  
        }
      
      
     $result=$this->connection->query($sql);
     
     if(is_bool($result)){
       
       return $result;
       
     }
     
     
     $results=array(); 
      if($result->num_rows>0){
         while ($row = $result->fetch_assoc()){
            $results[] = $row;
            
           }
      }
      
      else{
        
         return null;
       }
       
        $result->free();
        
        return $results;
     
     }
     
     
    public function escape($var){
      
      return $this->connection->real_escape_string($var);
    } 
    
    public function get_insert_id(){
      
      return $this->connection->insert_id;
    } 
    
    
}