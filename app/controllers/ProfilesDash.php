<?php

class ProfilesDash extends Controller {
    public function __construct(){
      $this->AdminProfileModel = $this->model('profileDash');
    }

    public function showProfile() {

        if($this->isLoggedIn()) {
            $adminId = $_SESSION['user_id'] ; 
            $adminProfile = $this->AdminProfileModel->showAdminProfile($adminId) ;
            $_SESSION['user_name'] = $adminProfile -> user_name ;
            $_SESSION['user_email'] = $adminProfile -> Email ;
            $this->view('pages/profile',$adminProfile);
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
                          'imgFullName' => null
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
                                  /* Before we upload the file we have to make sure that when we do upload the file it gets
                                  a proper name because for example a file called test.JPEG to uploads folder and someone 
                                  else later on uploads a image that has the exact same name test.JPEG it will actually 
                                  overwrite the existing image inside the uploads folder meaning that the other user who
                                  upload an image will get his image deleted so in order to prevent that we're going to 
                                  create a unique id wich gets inserted and replaced with the actual name of the file when
                                  it was uploaded so instead of it being named test.JPEG coul actually get named something like 
                                  bunch of numbers .JPEG */
                                  $fileNameNew = "adminsProfile/profile".$data['id'].".". $fileActualExt;
                                  $fileDestination = UPLOADFOLDER ."/" . $fileNameNew ;
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
                  $adminProfileimgPath = "/adminsProfile/profile".$data['id'];
                  if(file_exists(UPLOADFOLDER . $adminProfileimgPath .".jpg")) {
                    $data['imgFullName'] = $adminProfileimgPath . ".jpg" ;
                  }
                  else if(file_exists(UPLOADFOLDER . $adminProfileimgPath .".jpeg")) {
                    $data['imgFullName'] = $adminProfileimgPath . ".jpeg" ;
                  }
                  else if(file_exists(UPLOADFOLDER . $adminProfileimgPath .".png")) {
                    $data['imgFullName'] = $adminProfileimgPath . ".png" ;
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
}