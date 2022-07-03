<?php

    class Cart {
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function showCartProducts($userId){
            $this->db->query('SELECT product_name , product_original_price , carts.Product_quantity , product_offer_price , product_category , product_description , product_img_name FROM products INNER JOIN carts ON products.product_id = carts.Product_foreign WHERE carts.fk_user = :user_id');
            $this->db->bind(':user_id', $userId);
            $rows = $this->db->resultSet();
            return $rows;
          }

      public function addProductToCart($data) {
        $this->db->query('INSERT INTO carts (Product_foreign , Product_quantity , fk_user) VALUES (:productForeign, :productQuantity , :fkuser)');
        $this->db->bind(':productForeign', $data['productId']);
        $this->db->bind(':productQuantity', $data['productQuantity']);
        $this->db->bind(':fkuser', $data['userId']);

        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function checkIfProductExistInCart($data) {
        $this->db->query('SELECT * FROM carts WHERE Product_foreign = :product_id AND fk_user = :user_id');
        $this->db->bind(':product_id', $data['productId']);
        $this->db->bind(':user_id', $data['userId']);

        $row = $this->db->single();
        return $row;
      }
  }