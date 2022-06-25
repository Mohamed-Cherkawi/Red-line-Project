<?php

    class AthleteDash{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function showAthletes(){
          $this->db->query('SELECT * FROM athletes');
          $rows = $this->db->resultSet();
          return $rows;
        }

        public function addAthlete($data){
          $this->db->query('INSERT INTO athletes (athlete_name, athlete_sport, phone_number , CIN , athlete_img) VALUES (:athleteName, :athleteSport, :athletePhone, :athleteCIN, :athleteImg)');
          $this->db->bind(':athleteName', $data['athleteName']);
          $this->db->bind(':athleteSport', $data['sport']);
          $this->db->bind(':athletePhone', $data['athletePhone']);
          $this->db->bind(':athleteCIN', $data['athleteCIN']);
          $this->db->bind(':athleteImg', $data['athleteImg']);


          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

        public function editAthlete($data){
          $this->db->query('UPDATE athletes SET athlete_name = :athleteName, athlete_sport = :athleteSport, phone_number = :athletePhone, CIN = :athleteCIN , athlete_img = :athleteImg WHERE athlete_id = :id');
          $this->db->bind(':athleteName', $data['athleteName']);
          $this->db->bind(':athleteSport', $data['sport']);
          $this->db->bind(':athletePhone', $data['athletePhone']);
          $this->db->bind(':athleteCIN', $data['athleteCIN']);
          $this->db->bind(':athleteImg', $data['athleteImg']);
          $this->db->bind(':id', $data['id']);

          if ($this->db->execute()) {
            return true;
          } else {
            return false;
          }
        }

        public function deleteAthlete($id){
          $this->db->query('DELETE FROM athletes WHERE athlete_id = :id');
          $this->db->bind(':id', $id);

          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

          
    }