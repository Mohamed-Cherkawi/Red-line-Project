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
            $this->db->query("UPDATE trainers SET trainer_name=:name, Sport=:sport WHERE trainer_id=:trainer_id");

            $this->db->bind(':name', $data['trainerName']);  
            $this->db->bind(':sport', $data['sport']);                 
            $this->db->bind(':trainer_id', $data['id']);
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
          public function selectTrainerStatus($trainerId){
            $this->db->query('SELECT status FROM profileimg WHERE user_id = :id');
            $this->db->bind(':id', $trainerId);
            $rows = $this->db->single();
            return $rows;
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

          public function changePhotoStatus($id) {
            $this->db->query('UPDATE profileimg SET status = 0 WHERE user_id = :id');
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