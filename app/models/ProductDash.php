<?php

    class ProductDash{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function showProducts(){
          $this->db->query('SELECT * FROM products');
          $rows = $this->db->resultSet();
          return $rows;
        }

        public function addProduct($data){
          $this->db->query('INSERT INTO products (product_name, product_original_price , product_offer_price , product_category, product_description , product_img_name) VALUES (:productName, :productOrigPrice, :productOffPrice, :pCategory, :productDesc , :productImageName)');
          $this->db->bind(':productName', $data['productName']);
          $this->db->bind(':productOrigPrice', $data['pRegularPrice']." $");
          $this->db->bind(':productOffPrice', $data['pOfferPrice']);
          $this->db->bind(':pCategory', $data['category']);
          $this->db->bind(':productDesc', $data['productDescription']);
          $this->db->bind(':productImageName', $data['imgFullName']);

          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

        public function editProduct($data){
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

        public function deleteProduct($id){
          $this->db->query('DELETE FROM products WHERE product_id = :id');
          $this->db->bind(':id', $id);

          if($this->db->execute()){
            return true;
          } else {
            return false;
          }
        }

        // public function gettingMaxid(){
        //   $this->db->query('SELECT MAX(product_id) AS maxid FROM products');
        //   $row = $this->db->single();
        //   return $row;
        // }
          
    }