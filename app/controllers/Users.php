<?php

class Users extends Controller {
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function register(){
      // Check for POST
      if(isset($_POST['signUp'])){
        // filter input function that removes html special charct and whitespace from both sides of the string
        function filter_inputF($data) {
            $data = trim($data);
            $data = htmlspecialchars($data);
            return $data;
          }
        // Init data
        $data =[
          'name' => filter_inputF($_POST['username']),
          'email' => filter_inputF($_POST['email']),
          'password' => filter_inputF($_POST['password']),
          'email_err' => ''
        ];

                 // Check email if exists in db
        if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = "Email is already taken" ;
            $this->view('pages/signUp',$data);  
        } else {
                                // Register User
        if($this->userModel->register($data)){
            //   flash('register_success', 'You are registered and can log in');
              redirect('pages/logIn');
        } else {
              die('Something went wrong');
        }
        }
      } else {
         // Load view
        $this->view('pages/signUp');
      }
    }

    public function login($page ,$secondParam = ""){
      // Check for POST
      if(isset($_POST['logIn'])){
        
          // filter input function that removes html special charct and whitespace from both sides of the string
       function filter_inputF($data) {
             $data = trim($data);
             $data = htmlspecialchars($data);
             return $data;
           }
        // Init data
        $data =[
          'email' => filter_inputF($_POST['email']),
          'password' => filter_inputF($_POST['password']),
          'email_err' => '',
          'password_err' => '',
          'query_error' => ''   
        ];

        // Check for user/email
        if(!$this->userModel->findUserByEmail($data['email'])){
          // User not found
          $data['email_err'] = 'No User Found With Such An Email';
          $this->view('pages/logIn', $data);
          return ;
        } 
          // Check and set logged in 
          
          $loggedInUser = $this->userModel->login($data['email'],$data['password']);
         
          if($loggedInUser){
              // Create Session
              date_default_timezone_set("Africa/Casablanca");
              $Currentdate = date(" Y-m-d  H:i A");
              $this->createUserSession($loggedInUser , $Currentdate , $page , $secondParam); 
          } else {
              $data['password_err'] = 'Password incorrect';
              $this->view('pages/logIn', $data);
          }
         
            $data['query_error'] = "Something went wrong Please try later";
            $this->view('pages/logIn', $data);
          

        } else {
        // Load view
        $this->view('pages/logIn');
      }
    }

    public function createUserSession($user , $lastLogin , $page , $optionnalParam = ""){
      $_SESSION['user_id'] = $user->user_id;
      $_SESSION['user_email'] = $user->Email;
      $_SESSION['user_name'] = $user->user_name;
      $_SESSION['inscription_date'] = $user->Date_inscription;
      $_SESSION['user_email'] = $user-> Email ;
      $_SESSION['login_date'] = $lastLogin ;
      $_SESSION['user_img'] = $user -> imgNameUs ;
      $_SESSION['admin_img'] = $user -> imgNameAd ;
      $_SESSION['user_Pass'] = $user -> Password ;
      if($user->Role == 'User'){
        redirect('pages/index/'. $page .'/'. $optionnalParam .'');
      } else {
        redirect('pages/dashboard');
      }
  }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      unset($_SESSION['inscription_date']);
      unset($_SESSION['user_email']);
      unset($_SESSION['login_date']);
      session_destroy();
      redirect('pages/index/main');
    }


  }