<?php
    
    class AthletesDash extends Controller{

        public function __construct(){
            $this->athleteDashModel = $this->model('AthleteDash');
        }

        public function addAthlete() {

            if(isset($_POST['addAthlete'])) {
                    
                    // filter input function that removes html special charct and whitespace from both sides of the string
                    function filter_inputF($data) {
                        $data = trim($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    $data =[
                        'athleteName' => filter_inputF($_POST['athleteName']),
                        'sport' => filter_inputF($_POST['athlete_sport']),
                        'athletePhone' => filter_inputF($_POST['athlete_phone']),
                        'athleteCIN' => filter_inputF($_POST['athlete_CIN']),
                        'athleteImg' => $_POST['athleteImage']
                      ];
                    
                // if this condition is not true than it means a file has uploaded , not an empty field file input .
                if(!($_FILES['athleteImage']['error'] == UPLOAD_ERR_NO_FILE)) {

                    // This file superglobal gets all the information from the file that we want to upload using an input from a form
                    $photo = $_FILES['athleteImage'];
    
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
                                $fileNameNew = "/athletesFolder/profile".uniqid().".". $fileActualExt;
                                $fileDestination = UPLOADFOLDER  . $fileNameNew ;
                                move_uploaded_file($fileTmpName,$fileDestination);
                                $data['athleteImg'] = $fileNameNew;
                                if($this->athleteDashModel->addAthlete($data)) {
                                    redirect('pages/athletesDash');
                                    return ;
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
                      if($this->athleteDashModel->addAthlete($data)) {
                          redirect('pages/athletesDash');
                      } else {
                          die('Something went wrong');
                      }
            }
        }

        public function editAthlete() {
            
            if(isset($_POST['editAthlete'])) {
             // filter input function that removes html special charct and whitespace from both sides of the string
             function filter_inputF($data) {
                 $data = trim($data);
                 $data = htmlspecialchars($data);
                 return $data;
             }
             $data =[
                'id' => $_POST['athlete_id'],
                'athleteName' => filter_inputF($_POST['athleteName']),
                'sport' => filter_inputF($_POST['athlete_sport']),
                'athletePhone' => filter_inputF($_POST['athlete_phone']),
                'athleteCIN' => filter_inputF($_POST['athlete_CIN']),
                'athleteImg' => $_POST['athleteImage']
              ];

               // if this condition is not true than it means a file has uploaded , not an empty field file input .
              if(!($_FILES['athleteImageNew']['error'] == UPLOAD_ERR_NO_FILE)) {
                  // This file superglobal gets all the information from the file that we want to upload using an input from a form
                  $photo = $_FILES['athleteImageNew'];
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
                            unlink(UPLOADFOLDER . $data['athleteImg']) ;
                              $fileNameNew = "/athletesFolder/profile". uniqid() .".". $fileActualExt;
                              $fileDestination = UPLOADFOLDER  . $fileNameNew ;
                              move_uploaded_file($fileTmpName,$fileDestination);
                              $data['athleteImg'] = $fileNameNew;
                              if($this->athleteDashModel->editAthlete($data)) {
                                  redirect('pages/athletesDash');
                                  return ;
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

                if($this->athleteDashModel->editAthlete($data)) {
                    redirect('pages/athletesDash');
                } else {
                    die('Something went wrong');
                }
            }
        }

        public function deleteAthlete($id) {

            $imageName = $_GET['athleteimg'] ;
            unlink(UPLOADFOLDER . $imageName);
            
            if($this->athleteDashModel->deleteAthlete($id)) {
                  redirect('pages/athletesDash');
              } else {
                  die('Something went wrong');
              }
        }

    }