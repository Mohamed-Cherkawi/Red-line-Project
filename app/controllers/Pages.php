<?php
  class Pages extends Controller {

    public function __construct(){
    $this->adminModel = $this->model('AdminDash');
     $this->userModel = $this->model('UserDash');
     $this->trainerModel = $this->model('TrainerDash');
     $this->mainModel = $this->model('MainDash');
    }
    
    public function index(){     
      $this->view('pages/index');
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
      $totalUsers = $this->mainModel->totalUsers();
      $totalAdmins = $this->mainModel->totalAdmins();
      $totalTrainers = $this->mainModel->totalTrainers();
      $data = [
        'totalUsers' => $totalUsers -> totalUsers ,
        'totalTrainers' => $totalAdmins -> totalAdmins ,
        'totalAdmins' =>   $totalTrainers -> totalTrainers
        // 'totalProducts' => $this->mainModel->totalProducts(),
      ];
      $this->view('pages/dashboard',$data);
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
      $this->view('pages/productsDash');
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