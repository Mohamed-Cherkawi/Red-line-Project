<?php
  class Pages extends Controller {

    public function __construct(){
     
    }
    
    public function index(){     
      $this->view('pages/index');
    }

      public function signUp(){
        function filter_inputF($data) {
          $data = trim($data);
          $data = htmlspecialchars($data);
          return $data;
        }
        if(isset($_POST['signUp'])){
        
          $data = [
            'Email' => filter_inputF($_POST['email']),
            'Password' => filter_inputF(trim($_POST['password']))
          ];
    

          redirect('pages/logIn');
      }
    }
    public function logIn(){
      $this->view('pages/logIn');
    }
    public function app(){
      echo APPROOT;
    }
  }