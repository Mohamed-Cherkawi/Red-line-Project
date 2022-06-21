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
      $this->view('pages/adminsDash',$admins);
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
      $data = [
        'totalUsers' => $totalUsers -> totalUsers ,
        'totalTrainers' => $totalAdmins -> totalAdmins ,
        'totalAdmins' =>   $totalTrainers -> totalTrainers ,
        'totalProducts' => $totalProducts -> totalProducts
      ];
      $this->view('pages/dashboard',$data);
    } else {
      redirect('pages/index');
    }
  } 
    public function usersDash(){
      if($this->isLoggedIn()){
        $users = $this->userModel->showUsers();
        $this->view('pages/usersDash',$users);
      } else {
      redirect('pages/index');
      }
    }
    public function trainersDash(){
        if($this->isLoggedIn()){
          $trainers = $this->trainerModel->showTrainers();
          $this->view('pages/trainersDash',$trainers);
        } else {
        redirect('pages/index');
        }
    }
    public function productsDash() {
      if($this->isLoggedIn()){
        $products = $this->productModel->showProducts();
        $this->view('pages/productsDash',$products);
      } else {
      redirect('pages/index'); 
      }
    }
    public function profile(){
      if($this->isLoggedIn()){
        $this->view('pages/profile');
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