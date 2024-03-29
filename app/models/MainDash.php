<?php

    class MainDash{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function totalUsers() {
            $this->db->query('SELECT COUNT(Role) AS "totalUsers" FROM users WHERE Role = :user');
            $this->db->bind(':user', 'User');
            $totalUsers = $this->db->single();
            return $totalUsers;
        }

        public function totalTrainers() {
            $this->db->query('SELECT COUNT(trainer_name) AS "totalTrainers" FROM trainers');
            $totalTrainers = $this->db->single();
            return $totalTrainers;
        }

        public function totalAthletes() {
            $this->db->query('SELECT COUNT(athlete_id) AS "totalAthletes" FROM athletes');
            $totalAdmins = $this->db->single();
            return $totalAdmins;
        }

        public function totalProducts() {
            $this->db->query('SELECT COUNT(product_id) AS "totalProducts" FROM products');
            $totalProducts = $this->db->single();
            return $totalProducts;
        }

        public function getAdminprofileBySessionId(){
            $this->db->query('SELECT imgNameAd FROM users WHERE user_id = :admin_id');
            $this->db->bind(':admin_id' ,$_SESSION['user_id']);
      
            $row = $this->db->single();
            return $row ;
          }
    }