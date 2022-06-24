<?php

    class TrainerDash{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function showTrainers(){
          $this->db->query('SELECT * FROM trainers');
          $rows = $this->db->resultSet();
          return $rows;
        }

        public function addTrainer($data){
            $this->db->query('INSERT INTO trainers (trainer_name, Sport) VALUES(:name, :sport)');
            // Bind values
            $this->db->bind(':name', $data['trainerName']);
            $this->db->bind(':sport',$data['sport']);      
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }
          public function editTrainer($data) {
            $this->db->query("UPDATE trainers SET trainer_name=:name, Sport=:sport , imgFullName=:imgFullName WHERE trainer_id=:trainer_id");

            $this->db->bind(':name', $data['trainerName']);  
            $this->db->bind(':sport', $data['sport']);                 
            $this->db->bind(':trainer_id', $data['id']);
            $this->db->bind(':imgFullName', $data['imgFullName']);
          if ($this->db->execute()) {
            return true;
          } else {
            return false;
        }
          }

          public function deleteTrainer($id) {
            $this->db->query('DELETE FROM trainers WHERE trainer_id = :id');
            // Bind values
            $this->db->bind(':id', $id);
      
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }
          
          public function editImageName($imageName, $id) {
            $this->db->query('UPDATE trainers SET = :imageName WHERE  trainer_id = :id');
            // Bind values
            $this->db->bind(':imageName', $imageName);
            $this->db->bind(':id', $id);
            // Execute
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