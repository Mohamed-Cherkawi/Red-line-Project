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
          'email-err' => ''
        ];
                 // Check email if exists in db
        if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = "Email already in use" ;
            $this->view('pages/signUp',$data);  
        } else {
                                // Register User
        if($this->userModel->register($data)){
            //   flash('register_success', 'You are registered and can log in');
              redirect('users/login');
        } else {
              die('Something went wrong');
        }
        }
          // // Register User
          // if($this->userModel->register($data)){
          //   // flash('register_success', 'You are registered and can log in');
          //   redirect('users/login');
          // } else {
          //   die('Something went wrong');
          // }
      } 
        // Load view
    }

    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        // Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'No user found';
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in 
          
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);
         
          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('pages/index', $data);
          }
        } else {
          // Load view with errors
          $this->view('pages/index', $data);
        }


      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('pages/index', $data);
      }
    }

    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_name'] = $user->name;
      redirect('pages/index');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      session_destroy();
      redirect('pages/index');
    }

    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }
  }