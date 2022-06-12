<?php

class Main {
      private $db;
  
      public function __construct(){
        $this->db = new Database;
      }

      public function showUsers(){
        $this->db->query('SELECT * FROM users');
        $rows = $this->db->resultSet();
        return $rows;
      }
    }