<?php
  class Pages extends Controller {

    public function __construct(){
     $this->userModel = $this->model('UserDash');
     $this->trainerModel = $this->model('TrainerDash');
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
      $admins = $this->userModel->showAdmins();
      $this->view('pages/adminsDash',$admins);
    }
    public function dashboard(){
      $this->view('pages/dashboard');
    }
    public function usersDash(){
      $users =  $this->userModel->showUsers();
      $this->view('pages/usersDash',$users);
    }
    public function trainersDash(){
      $trainers = $this->trainerModel->showTrainers();
      $trainersStatus = $this->trainerModel->selectTrainerStatus($trainers->trainer_id);
      $data = [
        'trainers' => $trainers,
        'trainersStatus' => $trainersStatus
      ];
      $this->view('pages/trainersDash',$data);
    }
    public function profile(){
      $this->view('pages/profile');
    }
    public function app(){
      echo APPROOT;
    }
  }