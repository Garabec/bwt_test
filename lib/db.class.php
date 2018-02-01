<?php


class DB{
    
    private $connection;
    
    
    public function __construct($data=array()){
      
      
        
      $connection=new Mysqli($data['host'],$data['user'],$data['password'],$data['db_name']);
      
      if($connection->mysqli_errno){
          
        throw new Exeption("Error connection ".$connection->mysqli_error) ; 
          
      }
        
    }
  
   public function query($sql){
       
      if(!$this->connection){
        
        throw new Exeption("Not connection DB");  
          
      }
      
  
      return mysql_fetch_assoc(mysqli_query($this->connection,$sql));
     
     
      
       
       
   }
    
    
    
}