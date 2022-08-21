<?php

class ProfilesDash extends Controller {
    public function __construct(){
      $this->AdminProfileModel = $this->model('profileDash');
    }

    public function showProfile() {

        if($this->isLoggedIn()) {
            if($this -> isAdminProfile()) :
            $adminId = $_SESSION['user_id'] ; 
            $adminProfile = $this->AdminProfileModel->showAdminProfile($adminId) ;
            $emptyData = '';
            $_SESSION['user_name'] = $adminProfile -> user_name ;
            $_SESSION['user_email'] = $adminProfile -> Email ;
            $this->view('pages/profile',$emptyData,$adminProfile);
            else :
                redirect('pages/index/main');
            endif ;    
        } else {
            redirect('pages/index');
        }
    }
    
    public function editProfile() {
      if(isset($_POST['editAdminProfile'])) {
                        // filter input function that removes html special charct and whitespace from both sides of the string
                        function filter_inputF($data) {
                          $data = trim($data);
                          $data = htmlspecialchars($data);
                          return $data;
                      }
                      $data =[
                          'id' => $_SESSION['user_id'],
                          'adminName' => filter_inputF($_POST['adminName']),
                          'email' => filter_inputF($_POST['adminEmail']),
                          'password' => filter_inputF($_POST['adminPassword']),
                          'imgFullName' => $_POST['profile_image']
                      ];
                      
                                          
                      // if this condition is not true than it means a file has uploaded , not an empty field file input .
                      if(!($_FILES['admin_image']['error'] == UPLOAD_ERR_NO_FILE)) {
      
                      // This file superglobal gets all the information from the file that we want to upload using an input from a form
                      $photo = $_FILES['admin_image'];
      
                      // $_files array contains  : name/ type / tmp_name / error / size
                      $fileName = $photo['name'];
                      $fileTmpName = $photo['tmp_name'];
                      $fileSize = $photo['size'];
                      $fileError = $photo['error'];
                  
                      // to get the extension of the file
                      $fileExt = explode('.', $fileName);
                      // Make sure that always the extension comes in small letters
                      $fileActualExt = strtolower(end($fileExt));
                  
                      // inside this array we gonna tell it wich type of files we want to allow inside the website
                      $allowed = array('jpg' , 'jpeg' , 'png');
                  
                      if(in_array($fileActualExt , $allowed)) {
                          // if the file error is equal to 0 that means that we had no erros uploading this file 
                          if($fileError == 0){
                  
                              if($fileSize < 6000000){
                                // We should unlik the first image so we can free up some space : 
                                 unlink(UPLOADFOLDER . $data['imgFullName']) ;
                                  $fileNameNew = "/adminsProfile/profile". uniqid() . ".". $fileActualExt;
                                  $fileDestination = UPLOADFOLDER . $fileNameNew ;
                                  move_uploaded_file($fileTmpName,$fileDestination);
                                  $data['imgFullName'] = $fileNameNew;
                                  if($this->AdminProfileModel->editAdminProfile($data)) {
                                      redirect('ProfilesDash/showProfile');
                                  } else {
                                      die('Something went wrong');
                                  }
                              } else {
                                  echo "Your file is too big !";
                              }
                  
                              } else {
                              echo "There was an error uploading your file !";
                              }
                  
                      } else {
                          echo "You can not upload files of this type !";
                      }
                  }
      
                      if($this->AdminProfileModel->editAdminProfile($data)) {
                          redirect('ProfilesDash/showProfile');
                      } else {
                          die('Something went wrong');
                      }
      }
    }

    public function deleteAdminProfile() {

    }
    
    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
          return true;
        } else {
          return false;
        }
      }

      public function isAdminProfile(){
        if($_SESSION['user_Role'] == "Admin") {
            return true ;
        } else {
            return false ;
        }
      }
}