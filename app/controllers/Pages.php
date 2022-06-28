<?php
  class Pages extends Controller {

    public function __construct(){
     $this->userModel = $this->model('UserDash');
     $this->trainerModel = $this->model('TrainerDash');
     $this->athleteModel = $this->model('AthleteDash');
     $this->mainModel = $this->model('MainDash');
     $this->productModel = $this->model('ProductDash');
     $this->cartModel = $this->model('Cart');
    }
    
    public function index(){     
      $this->view('pages/index');
    }

    public function schedule(){
      $this->view('pages/schedule');
    }

    public function aboutUs() {
      $this->view('pages/aboutUs');
    }

    public function addToCart() {
      if($this->isLoggedIn()) {
      if(isset($_POST['addProductToCart'])) {
           // filter input function that removes html special charct and whitespace from both sides of the string
           function filter_inputF($data) {
             $data = trim($data);
             $data = htmlspecialchars($data);
             return $data;
         }
        $data = [
          'userId' => $_SESSION['user_id'],
          'productImg' => filter_inputF($_POST['product_img']),
          'productName' => filter_inputF($_POST['product_name']),
          'productRegular' => filter_inputF($_POST['product_regular']),
          'productQuantity' => filter_inputF($_POST['product_quantity'])
        ] ;
         $this->cartModel->addProductToCart($data);
        //  $addedMessage = "<div class=\"alert alert-secondary text-center\" role=\"alert\"> Product Added Successfuly To your Cart</div>";
        //   $data2 = [
        //     'addedMessage' =>$addedMessage
        //   ];
          redirect('pages/index');
      }

    } else {
      redirect('pages/logIn');
    }
    }
    
    public function basket() {
      if($this->isLoggedIn()) {
        $products = $this->cartModel->showCartProducts($_SESSION['user_id']);
        $this->view('pages/basket',$products);
      } else {
        redirect('pages/logIn');
      }
    }
    public function products($productCategory) {
      if($productCategory == "All") {
        $products = $this->productModel->showProducts();
        $this->view('pages/products',$products,$productCategory);
        return ;
      }
      if($productCategory == "Strength") {
        $productCategory.= " " . "Machines";
      }else if($productCategory == "Cardio") {
        $productCategory.= " " . "Machines";
      }else if($productCategory == "Free") {
        $productCategory.= " " . "Weight" . " " . "Machines";
      }
        $products = $this->productModel->showProductsByCategorie($productCategory);
        $this->view('pages/products',$products,$productCategory);
    }

    public function productsFilterBy($filterMethod,$Category) {
      if($Category == "All") {
        if($filterMethod == "Oldest") {
          $products = $this->productModel->showAllOldestProducts();
          $filterMethod = "Filtred by Oldest";
          $this->view('pages/products',$products,$Category,$filterMethod);
          return ;
        }
        if($filterMethod == "Newest") {
          $products = $this->productModel->showAllNewestProducts();
          $filterMethod = "Filtred by Newest";
          $this->view('pages/products',$products,$Category,$filterMethod);
          return ;
        }
        if($filterMethod == "AlphabeticalAsc") {
          $products = $this->productModel->showAllAlphabeticalOrderProducts();
          $filterMethod = "Filtred by Alphabetical Order";
          $this->view('pages/products',$products,$Category,$filterMethod);
          return ;
        }
        if($filterMethod == "AlphabeticalDesc") {
          $products = $this->productModel->showAllDescAlphabeticalOrderProducts();
          $filterMethod = "Filtred by Descendant Alphabetical Order";
          $this->view('pages/products',$products,$Category,$filterMethod);
          return ;
        }
      }
      if($Category == "Strength") {
        $Category.= " " . "Machines";
      }else if($Category == "Cardio") {
        $Category.= " " . "Machines";
      }else if ($Category == "Free") {
        $Category.= " " . "Weight" . " " . "Machines";
      }
      if($filterMethod == "Oldest") {
        $products = $this->productModel->filterProductsWhereCategoriesOldest($Category);
        $filterMethod = "Filtred by Oldest";
        $this->view('pages/products',$products,$Category,$filterMethod);
        return ;
      }
      if($filterMethod == "Newest") {
        $products = $this->productModel->filterProductsWhereCategoriesNewest($Category);
        $filterMethod = "Filtred by Newest";
        $this->view('pages/products',$products,$Category,$filterMethod);
        return ;
      }
      if($filterMethod == "AlphabeticalAsc") {
        $products = $this->productModel->filterProductsWhereCategoriesAlphabeticalOrder($Category);
        $filterMethod = "Filtred by Alphabetical Order";
        $this->view('pages/products',$products,$Category,$filterMethod);
        return ;
      }
      if($filterMethod == "AlphabeticalDesc") {
        $products = $this->productModel->filterProductsWhereCategoriesAlphabeticalDescOrder($Category);
        $filterMethod = "Filtred by Descendant Alphabetical Order";
        $this->view('pages/products',$products,$Category,$filterMethod);
        return ;
      }
    }
    
    public function productSheet($productId) {
      $product = $this->productModel->getProductById($productId);
      $this->view('pages/productSheet',$product);
    }
      public function signUp(){
      $this->view('pages/signUp');
    }
    public function logIn(){
      $this->view('pages/logIn');
    }
    public function adminsDash(){
      if($this->isLoggedIn()){
      $admins = $this->userModel->showAdmins();
      $adminImage = $this->userModel->getAdminprofileBySessionId();
      $this->view('pages/adminsDash',$admins ,$adminImage);
      }else{
        redirect('pages/index');
      }
    }
    public function dashboard(){
      if($this->isLoggedIn()){
      $totalUsers = $this->mainModel->totalUsers();
      $totalAthletes = $this->mainModel->totalAthletes();
      $totalTrainers = $this->mainModel->totalTrainers();
      $totalProducts = $this->mainModel->totalProducts();
      $adminImageName = $this->mainModel->getAdminprofileBySessionId();
      $data2 = $adminImageName ;
      $data = [
        'totalUsers' => $totalUsers -> totalUsers ,
        'totalAthletes' => $totalAthletes -> totalAthletes ,
        'totalTrainers' =>   $totalTrainers -> totalTrainers ,
        'totalProducts' => $totalProducts -> totalProducts ,
      ];
      $this->view('pages/dashboard',$data ,$data2);
    } else {
      redirect('pages/index');
    }
  } 
    public function usersDash(){
      if($this->isLoggedIn()){
        $users = $this->userModel->showUsers();
        $adminImage = $this->userModel->getAdminprofileBySessionId();
        $this->view('pages/usersDash',$users,$adminImage);
      } else {
      redirect('pages/index');
      }
    }
    public function trainersDash(){
        if($this->isLoggedIn()){
          $trainers = $this->trainerModel->showTrainers();
          $adminImage = $this->userModel->getAdminprofileBySessionId();
          $this->view('pages/trainersDash',$trainers ,$adminImage);
        } else {
        redirect('pages/index');
        }
    }
    public function productsDash() {
      if($this->isLoggedIn()){
        $products = $this->productModel->showProducts();
        $adminImage = $this->userModel->getAdminprofileBySessionId();
        $this->view('pages/productsDash',$products ,$adminImage);
      } else {
      redirect('pages/index'); 
      }
    }
    public function athletesDash() {
      if($this->isLoggedIn()){
        $athletes = $this->athleteModel->showAthletes();
        $adminImage = $this->userModel->getAdminprofileBySessionId();
        $this->view('pages/athletesDash',$athletes ,$adminImage);
      } else {
      redirect('pages/index'); 
      }
    }

    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }

  }