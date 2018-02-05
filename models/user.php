<?php


class User extends Model{
    
    
  public function getUserByEmail($email){
  
  $email = $this->db->escape($email);
        $sql = "select * from `user` where user_email = '{$email}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;  
  } 
  
  
   public function getUserById($id){
  
        $sql = "select * from `user` where user_id = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;  
  } 
  
  public function addUser(array $data){
      
      
            $name = $this->db->escape($data['name']);
            $email = $this->db->escape($data['email']);
            $gender = $this->db->escape($data['gender']);
            $birthday = $this->db->escape($data['birthday']);
            $password = $this->db->escape($data['password']);
            $date=(new \DateTime)->format("Y-m-d H:i:s");
            
            $sql="insert into `user` set 
                                  
                                  user_name = '{$name}',
                                  user_email = '{$email}', 
                                  user_gender = '{$gender}', 
                                  user_birthday = '{$birthday}', 
                                  date_create = '{$date}', 
                                  user_password= '{$password}'
                                  
                                  ";
                                  
             
              
       return    $result = $this->db->query($sql)?$this->db->get_insert_id():false;                       
                                  
      
      
      
      
  }
    
    
    
    
    
}