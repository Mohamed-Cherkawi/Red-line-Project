<?php

    class Cart {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function showCartProducts($userId){
            $this->db->query('SELECT * FROM carts WHERE fk_user = :user_id');
            $this->db->bind(':user_id', $userId);
            $rows = $this->db->resultSet();
            return $rows;
          }

      public function addProductToCart($data) {
        $this->db->query('INSERT INTO carts (Product_name, Product_price , Product_img , Product_quantity , fk_user) VALUES (:productName, :productPrice, :productImg, :productQuantity , :fkuser)');
        $this->db->bind(':productName', $data['productName']);
        $this->db->bind(':productPrice', $data['productRegular']." $");
        $this->db->bind(':productImg', $data['productImg']);
        $this->db->bind(':productQuantity', $data['productQuantity']);
        $this->db->bind(':fkuser', $data['userId']);

        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
  }