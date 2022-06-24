<?php

    class AdminDash{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function showAdmins(){
          $this->db->query('SELECT * FROM users WHERE Role = :admin');
          $this->db->bind(':admin', 'Admin');
          $rows = $this->db->resultSet();
          return $rows;
        }

        public function addAdmin($data){
          $this->db->query('INSERT INTO users (user_name, Email, Password , Sport, Role) VALUES (:adminName, :email, :password, :sport, :admin)');
          $this->db->bind(':adminName', $data['adminName']);
          $this->db->bind(':email', $data['email']);
          $this->db->bind(':password', $data['password']);
          $this->db->bind(':sport', $data['sport']);
          $this->db->bind(':admin', 'Admin');


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