<?php
  class Pages extends Controller {

    public function __construct(){
    $this->adminModel = $this->model('AdminDash');
     $this->userModel = $this->model('UserDash');
     $this->trainerModel = $this->model('TrainerDash');
     $this->mainModel = $this->model('MainDash');
     $this->productModel = $this->model('ProductDash');
    }
    
    public function index(){     
      $this->view('pages/index');
    }

    public function schedule(){
      $this->view('pages/schedule');
    }

      public function signUp(){
      $this->view('pages/signUp');
    }
    public function logIn(){
      $this->view('pages/logIn');
    }
    public function adminsDash(){
      if($this->isLoggedIn()){
      $admins = $this->adminModel->showAdmins();
      $adminImage = $this->adminModel->getAdminprofileBySessionId();
      $this->view('pages/adminsDash',$admins ,$adminImage);
      }else{
        redirect('pages/index');
      }
    }
    public function dashboard(){
      if($this->isLoggedIn()){
      $totalUsers = $this->mainModel->totalUsers();
      $totalAdmins = $this->mainModel->totalAdmins();
      $totalTrainers = $this->mainModel->totalTrainers();
      $totalProducts = $this->mainModel->totalProducts();
      $adminImageName = $this->mainModel->getAdminprofileBySessionId();
      $data2 = $adminImageName ;
      $data = [
        'totalUsers' => $totalUsers -> totalUsers ,
        'totalTrainers' => $totalAdmins -> totalAdmins ,
        'totalAdmins' =>   $totalTrainers -> totalTrainers ,
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
          $adminImage = $this->trainerModel->getAdminprofileBySessionId();
          $this->view('pages/trainersDash',$trainers ,$adminImage);
        } else {
        redirect('pages/index');
        }
    }
    public function productsDash() {
      if($this->isLoggedIn()){
        $products = $this->productModel->showProducts();
        $adminImage = $this->productModel->getAdminprofileBySessionId();
        $this->view('pages/productsDash',$products ,$adminImage);
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