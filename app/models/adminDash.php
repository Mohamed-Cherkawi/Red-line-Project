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
          
          public function insertIdToProfileImgTable($id) {
            $this->db->query('INSERT INTO profileimg (user_id) VALUES(:id)');
            // Bind values
            $this->db->bind(':id', $id);      
            // Execute
            if($this->db->execute()){
              return true;
            } else {
              return false;
            }
          }

          public function insertToGallery($imageName){
            $this->db->query('INSERT INTO trainers (imgFullName) VALUES (:imgFullName)');
            $this->db->bind(':imgFullName', $imageName);
            $this->db->execute();
          }
    }