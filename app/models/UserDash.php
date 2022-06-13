<?php

    class UserDash{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function showUsers(){
          $this->db->query('SELECT * FROM users');
          $rows = $this->db->resultSet();
          return $rows;
        }

        public function addUser($data){
            $this->db->query('INSERT INTO users (user_name, Email , Role) VALUES(:name, :email , :role)');
            // Bind values
            $this->db->bind(':name', $data['userName']);
            $this->db->bind(':email',$data['email']);
            $this->db->bind(':role', "User");
      
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }
          public function editUser($data) {
            $this->db->query("UPDATE users SET user_name=:name, Email=:email WHERE user_id=:user_id");

            $this->db->bind(':name', $data['userName']);  
            $this->db->bind(':email', $data['email']);                 
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
    }