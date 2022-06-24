<?php

class ProfileDash {
    private $db;

    public function __construct(){
        $this->db = new Database;
        
    }

    public function showAdminProfile($id){
      $this->db->query('SELECT * FROM users WHERE user_id = :admin_id');
      $this->db->bind(':admin_id',$id);  
      $row = $this->db->single();
      return $row;
    }


    public function editAdminProfile($data){
      $this->db->query('UPDATE users SET user_name = :adminName, Email = :email, Password = :password, imgNameAd = :imgName WHERE user_id = :id');
      $this->db->bind(':adminName', $data['adminName']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':imgName', $data['imgFullName']);
      $this->db->bind(':id', $data['id']);
      
      if ($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
}