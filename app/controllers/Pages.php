<?php
  class Pages extends Controller {

    public function __construct(){
     
    }
    
    public function index(){     
      $this->view('pages/signUp');
    }

      public function signUp(){
      $this->view('pages/signUp');
    }
    public function logIn(){
      $this->view('pages/logIn');
    }
    public function app(){
      echo APPROOT;
    }
  }