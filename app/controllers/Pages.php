<?php
  class Pages extends Controller {

    public function __construct(){
     $this->userModel = $this->model('UserDash');
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
    public function adminDash(){
      $this->view('pages/adminDash');
    }
    public function dashboard(){
      $this->view('pages/dashboard');
    }
    public function usersDash(){
      $users =  $this->userModel->showUsers();
      $this->view('pages/usersDash',$users);
    }
    public function trainersDash(){
      $this->view('pages/trainersDash');
    }
    public function profile(){
      $this->view('pages/profile');
    }
    public function app(){
      echo APPROOT;
    }
  }