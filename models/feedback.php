<?php

class Feedback extends Model{
    
    
    public function addMessage(array $data){
      
            $id=Session::get("user");
            $message = $this->db->escape($data['message']);
            $date=(new \DateTime)->format("Y-m-d ");
            
            $sql="insert into `feedback` set 
                                  
                                  f_message = '{$message}',
                                  f_user = '{$id}', 
                                  f_date = '{$date}' 
                                  
                               
                                  ";
              
                                  
     return    ($result = $this->db->query($sql))?$result:false ;                            
                                  
    } 
    
    
    
    public function getFeedbacks(){
       
       
        $sql = "select * from `feedback` f join `user` u on u.user_id=f.f_user order by f_date desc ";
        $result = $this->db->query($sql);
        
        
        return $result;   
      
      
        
    }
    
}