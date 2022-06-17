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
          $this->db->query('INSERT INTO users (Name, Email, Password, Role) VALUES (:adminName, :email, :password, :admin)');
          $this->db->bind(':adminName', $data['adminName']);
          $this->db->bind(':email', $data['email']);
          $this->db->bind(':password', $data['password']);
          $this->db->bind(':admin', 'Admin');
        }

        public function editAdmin($data){
          $this->db->query('UPDATE users SET Name = :adminName, Email = :email, Password = :password WHERE id = :id');
          $this->db->bind(':adminName', $data['adminName']);
          $this->db->bind(':email', $data['email']);
          $this->db->bind(':password', $data['password']);
          $this->db->bind(':id', $data['id']);
        }

        public function deleteAdmin($id){
          $this->db->query('DELETE FROM users WHERE id = :id');
          $this->db->bind(':id', $id);

          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }
          
          public function insertToGallery($imageName){
            $this->db->query('INSERT INTO users (imgFullName) VALUES (:imgFullName)');
            $this->db->bind(':imgFullName', $imageName);
            $this->db->execute();
          }
    }