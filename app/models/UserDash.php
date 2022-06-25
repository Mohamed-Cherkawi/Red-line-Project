<?php

    class UserDash{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        /***************************** User Section ****************************************/
        public function showUsers(){
          $this->db->query('SELECT * FROM users WHERE Role = "User"');
          $rows = $this->db->resultSet();
          return $rows;
        }


        public function addUser($data){
            $this->db->query('INSERT INTO users (user_name, Email , imgNameUs) VALUES(:name, :email , :user_image)');
            // Bind values
            $this->db->bind(':name', $data['userName']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':user_image' , $data['userImg']);   
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

          public function editUser($data) {
            $this->db->query("UPDATE users SET user_name=:name, Email=:email , imgNameUs=:img_name WHERE user_id=:user_id");

            $this->db->bind(':name', $data['userName']);  
            $this->db->bind(':email', $data['email']);     
            $this->db->bind(':img_name', $data['userImg']);
            $this->db->bind(':user_id', $data['id']);
            
          if ($this->db->execute()) {
            return true;
          } else {
            return false;
        }
          }

          public function deleteUser($id) {
            $this->db->query('DELETE FROM users WHERE user_id = :id');
            // Bind values
            $this->db->bind(':id', $id);
      
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

          public function getuserImageState($userId) {
            $this->db->query('SELECT imgNameUs FROM users WHERE user_id = :user_id');
            // Bind Values :
            $this->db->bind(':user_id',$userId);

            // Execute 
            $row = $this->db->single();
            return $row;
          }
          
            /***************************** Admin Section ****************************************/

          public function showAdmins(){
            $this->db->query('SELECT * FROM users WHERE Role = :admin');
            $this->db->bind(':admin', 'Admin');
            $rows = $this->db->resultSet();
            return $rows;
          }
  
          public function addAdmin($data){
            $this->db->query('INSERT INTO users (user_name, Email, Password ,imgNameAd, Role) VALUES (:adminName, :email, :password, :imgName, :role)');
            $this->db->bind(':adminName', $data['adminName']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':imgName', $data['adminImage']);
            $this->db->bind(':role', 'Admin');
  
  
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }
  
          public function editAdmin($data){
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
  
          public function deleteAdmin($id){
            $this->db->query('DELETE FROM users WHERE user_id = :id');
            $this->db->bind(':id', $id);
  
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

          public function getAdminprofileBySessionId(){
            $this->db->query('SELECT imgNameAd FROM users WHERE user_id = :admin_id');
            $this->db->bind(':admin_id' ,$_SESSION['user_id']);
      
            $row = $this->db->single();
            return $row ;
          }
    }