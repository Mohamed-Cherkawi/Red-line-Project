<?php

    class UserDash{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

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
          // public function addAdmin($data){
          //   $this->db->query('INSERT INTO users (user_name, Email , Password , Role) VALUES(:name, :email , :password , :role)');
          //   // Bind values
          //   $this->db->bind(':name', $data['adminName']);
          //   $this->db->bind(':email',$data['email']);
          //   $this->db->bind(':password',$data['password']);
          //   $this->db->bind(':role',"Admin");
      
          //   // Execute
          //   if($this->db->execute()){
          //     return true;
          //   } else {
          //     return false;
          //   }
          // }
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

          public function getAdminprofileBySessionId(){
            $this->db->query('SELECT imgNameAd FROM users WHERE user_id = :admin_id');
            $this->db->bind(':admin_id' ,$_SESSION['user_id']);
      
            $row = $this->db->single();
            return $row ;
          }
    }