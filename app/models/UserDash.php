<?php

    class UserDash{
        private $db;

        public function __construct(){
            $this->db = new Database;
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
    }