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
          $this->db->query('UPDATE products SET product_name = :productName, product_original_price = :productOriginalP, product_offer_price = :productOfferP, product_category = :ProductCategory , product_description = :ProductDesc , product_img_name = :productImg WHERE product_id = :id');
          $this->db->bind(':productName', $data['productName']);
          $this->db->bind(':productOriginalP', $data['pRegularPrice'] ." $");
          $this->db->bind(':productOfferP', $data['pOfferPrice']);
          $this->db->bind(':ProductCategory', $data['category']);
          $this->db->bind(':ProductDesc', $data['productDescription']);
          $this->db->bind(':productImg', $data['productImage']);
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

        public function getProductById($product_id) {
          $this->db->query('SELECT * FROM products WHERE product_id = :id');
          $this->db->bind(':id', $product_id);

          $row = $this->db->single();
          return $row;
          
    }

      public function showProductsByCategorie($category) {
        $this->db->query('SELECT * FROM products WHERE product_category = :category');
        $this->db->bind(':category', $category);

        $row = $this->db->resultSet();
        return $row;
      }

      public function showAllOldestProducts() {
        $this->db->query('SELECT * FROM products  ORDER BY product_id');

        $row = $this->db->resultSet();
        return $row;
      }

      public function showAllNewestProducts() {
        $this->db->query('SELECT * FROM products  ORDER BY product_id DESC');

        $row = $this->db->resultSet();
        return $row;
      }
      public function showAllAlphabeticalOrderProducts() {
        $this->db->query('SELECT * FROM products  ORDER BY product_name');

        $row = $this->db->resultSet();
        return $row;
      }
      public function showAllDescAlphabeticalOrderProducts() {
        $this->db->query('SELECT * FROM products  ORDER BY product_name DESC');

        $row = $this->db->resultSet();
        return $row;
      }
      public function filterProductsWhereCategoriesOldest($category) {
        $this->db->query('SELECT * FROM products WHERE product_category = :category ORDER BY product_id');
        $this->db->bind(':category', $category);

        $row = $this->db->resultSet();
        return $row;
      }
      public function filterProductsWhereCategoriesNewest($category) {
        $this->db->query('SELECT * FROM products WHERE product_category = :category ORDER BY product_id DESC');
        $this->db->bind(':category', $category);

        $row = $this->db->resultSet();
        return $row;
      }
      public function filterProductsWhereCategoriesAlphabeticalOrder($category) {
        $this->db->query('SELECT * FROM products WHERE product_category = :category ORDER BY product_name');
        $this->db->bind(':category', $category);

        $row = $this->db->resultSet();
        return $row;
      }
      public function filterProductsWhereCategoriesAlphabeticalDescOrder($category) {
        $this->db->query('SELECT * FROM products WHERE product_category = :category ORDER BY product_name DESC');
        $this->db->bind(':category', $category);

        $row = $this->db->resultSet();
        return $row;
      }

  }