<?php
    
    class AdminsDash extends Controller{

        public function __construct(){
            $this->adminDashModel = $this->model('AdminDash');
        }

        public function addAdmin() {
                
                if(isset($_POST['addAdmin'])) {
    
                    // filter input function that removes html special charct and whitespace from both sides of the string
                    function filter_inputF($data) {
                        $data = trim($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    $data =[
                        'adminName' => filter_inputF($_POST['adminName']),
                        'email' => filter_inputF($_POST['email']),
                        'password' => filter_inputF($_POST['password']),
                        'sport' => filter_inputF($_POST['sport'])
                    ];
    
                    if($this->adminDashModel->addAdmin($data)) {
                        redirect('pages/adminsDash');
                    } else {
                        die('Something went wrong');
                    }
            }
        }
            
        public function editAdmin() {
            if(isset($_POST['editAdmin'])) {

                // filter input function that removes html special charct and whitespace from both sides of the string
                function filter_inputF($data) {
                    $data = trim($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $data =[
                    'id' => $_POST['admin_id'],
                    'adminName' => filter_inputF($_POST['adminName']),
                    'email' => filter_inputF($_POST['email']),
                    'password' => filter_inputF($_POST['password']),
                    'imgFullName' => $_POST['image_admin']
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
            
                        if($fileSize < 8000000){
                            // We should unlik the first image so we can free up some space : 
                            unlink(UPLOADFOLDER . $data['imgFullName']) ;
                            /* Before we upload the file we have to make sure that when we do upload the file it gets
                            a proper name because for example a file called test.JPEG has uploaded and someone 
                            else later on uploads a image that has the exact same name test.JPEG it will actually 
                            overwrite the existing image inside the uploads folder meaning that the other user who
                            upload an image will get his image deleted so in order to prevent that we're going to 
                            create a unique id wich gets inserted and replaced with the actual name of the file when
                            it was uploaded so instead of it being named test.JPEG coul actually get named something like 
                            bunch of numbers .JPEG */
                            $fileNameNew = "/adminsProfile/profile".uniqid().".". $fileActualExt;
                            $fileDestination = UPLOADFOLDER . $fileNameNew ;
                            move_uploaded_file($fileTmpName,$fileDestination);
                            $data['imgFullName'] = $fileNameNew;
                            if($this->adminDashModel->editAdmin($data)) {
                                redirect('pages/adminsDash');
                            } else {
                                die('Something went wrong');
                            }
                        } else {
                            echo "Your file is too big !";
                            exit();
                        }
            
                        } else {
                        echo "There was an error uploading your file !";
                        exit();
                        }
            
                } else {
                    echo "You can not upload files of this type !";
                }
            }

                if($this->adminDashModel->editAdmin($data)) {
                    redirect('pages/adminsDash');
                } else {
                    die('Something went wrong');
                }
            }
            redirect('pages/adminsDash');
        }

        
        public function deleteAdmin($adminId) {

                if($this->adminDashModel->deleteAdmin($adminId)) {
                    redirect('pages/adminsDash');
                } else {
                    die('Something went wrong');
                }
            
        }
 }  