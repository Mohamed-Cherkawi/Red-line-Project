<?php
    
    class TrainersDash extends Controller{

        public function __construct(){
            $this->trainerDashModel = $this->model('trainerDash');
        }

        public function addTrainer() {
            if(isset($_POST['addTrainer'])) {
                    
                    // filter input function that removes html special charct and whitespace from both sides of the string
                    function filter_inputF($data) {
                        $data = trim($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    $data =[
                        'trainerName' => filter_inputF($_POST['trainername']),
                        'sport' => filter_inputF($_POST['sport']),
                        'trainerImg' => null
                      ];
                      
                      // if this condition is not true than it means a file has uploaded , not an empty field file input .
                if($_FILES['trainerImg']['error'] != UPLOAD_ERR_NO_FILE) {

                    // This file superglobal gets all the information from the file that we want to upload using an input from a form
                    $photo = $_FILES['trainerImg'];
    
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
 
                                $fileNameNew = "/trainersProfile/profile". uniqid().".". $fileActualExt;
                                $fileDestination = UPLOADFOLDER  . $fileNameNew ;
                                move_uploaded_file($fileTmpName,$fileDestination);
                                $data['trainerImg'] = $fileNameNew;
                                if($this->trainerDashModel->addTrainer($data)) {
                                    redirect('pages/trainersDash');
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

                      if($this->trainerDashModel->addTrainer($data)) {
                          redirect('pages/trainersDash');
                      } else {
                          die('Something went wrong');
                      }
            }
        }

        public function editTrainer() {
            
            if(isset($_POST['editTrainer'])) {

                // filter input function that removes html special charct and whitespace from both sides of the string
                function filter_inputF($data) {
                    $data = trim($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $data =[
                    'id' => $_POST['trainer_id'],
                    'trainerName' => filter_inputF($_POST['trainerName']),
                    'sport' => filter_inputF($_POST['sport']),
                    'trainerImg' => $_POST['trainerImg']
                ];

                
                // if this condition is not true than it means a file has uploaded , not an empty field file input .
                if(!($_FILES['trainerImage']['error'] == UPLOAD_ERR_NO_FILE)) {

                // This file superglobal gets all the information from the file that we want to upload using an input from a form
                $photo = $_FILES['trainerImage'];

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
                            unlink(UPLOADFOLDER . $data['trainerImg']) ;

                            $fileNameNew = "/trainersProfile/profile". uniqid() .".". $fileActualExt;
                            $fileDestination = UPLOADFOLDER  . $fileNameNew ;
                            move_uploaded_file($fileTmpName,$fileDestination);
                            $data['trainerImg'] = $fileNameNew;
                            if($this->trainerDashModel->editTrainer($data)) {
                                redirect('pages/trainersDash');
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

                if($this->trainerDashModel->editTrainer($data)) {
                    redirect('pages/trainersDash');
                } else {
                    die('Something went wrong');
                }
            }
        }
        

             public function deleteTrainer($id) {

                $imageName = $_GET['trainerImg'] ;
                unlink(UPLOADFOLDER . $imageName);

                    if($this->trainerDashModel->deleteTrainer($id)) {
                        redirect('pages/trainersDash');
                    } else {
                        die('Something went wrong');
                    }               
            }
        }
       