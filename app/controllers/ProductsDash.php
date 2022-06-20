<?php
    
    class ProductsDash extends Controller{

        public function __construct(){
            $this->productDashModel = $this->model('ProductDash');
        }

        public function addProduct() {
            if(isset($_POST['addProduct'])) {
                    
                    // filter input function that removes html special charct and whitespace from both sides of the string
                    function filter_inputF($data) {
                        $data = trim($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    $data =[
                        'productName' => filter_inputF($_POST['productName']),
                        'pRegularPrice' => filter_inputF($_POST['pRegularPrice']),
                        'pRegularPrice' => filter_inputF($_POST['pRegularPrice']),
                        'pOriginalrPrice' => filter_inputF($_POST['pOriginalrPrice']),
                        'productDescription' => filter_inputF($_POST['productDescription']),
                        'imgFullName' => ''
                      ];
                    
                      // if this condition is not true than it means a file has uploaded , not an empty field file input .
                if(!($_FILES['product_image']['error'] == UPLOAD_ERR_NO_FILE)) {

                    // This file superglobal gets all the information from the file that we want to upload using an input from a form
                    $photo = $_FILES['product_image'];
    
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
                
                            if($fileSize < 2000000){
                                /* Before we upload the file we have to make sure that when we do upload the file it gets
                                a proper name because for example a file called test.JPEG to uploads folder and someone 
                                else later on uploads a image that has the exact same name test.JPEG it will actually 
                                overwrite the existing image inside the uploads folder meaning that the other user who
                                upload an image will get his image deleted so in order to prevent that we're going to 
                                create a unique id wich gets inserted and replaced with the actual name of the file when
                                it was uploaded so instead of it being named test.JPEG coul actually get named something like 
                                bunch of numbers .JPEG */
                                $fileNameNew = "product".uniqid().".". $fileActualExt;
                                $fileDestination = UPLOADFOLDER  . "/productsFolder/" . $fileNameNew ;
                                move_uploaded_file($fileTmpName,$fileDestination);
                                $data['imgFullName'] = $fileNameNew;
                                if($this->productDashModel->addProduct($data)) {
                                    redirect('pages/productsDash');                                  
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
             
            }
        }

        public function editProduct() {
            
            if(isset($_POST['editTrainer'])) {

                // filter input function that removes html special charct and whitespace from both sides of the string
                function filter_inputF($data) {
                    $data = trim($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }
                $data =[
                    'productName' => filter_inputF($_POST['productName']),
                    'pRegularPrice' => filter_inputF($_POST['pRegularPrice']),
                    'pOriginalrPrice' => filter_inputF($_POST['pOriginalrPrice']),
                    'imgFullName' => null
                ];

                
                // if this condition is not true than it means a file has uploaded , not an empty field file input .
                if(!($_FILES['product_image']['error'] == UPLOAD_ERR_NO_FILE)) {

                // This file superglobal gets all the information from the file that we want to upload using an input from a form
                $photo = $_FILES['product_image'];

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
            
                        if($fileSize < 2000000){
                            /* Before we upload the file we have to make sure that when we do upload the file it gets
                            a proper name because for example a file called test.JPEG to uploads folder and someone 
                            else later on uploads a image that has the exact same name test.JPEG it will actually 
                            overwrite the existing image inside the uploads folder meaning that the other user who
                            upload an image will get his image deleted so in order to prevent that we're going to 
                            create a unique id wich gets inserted and replaced with the actual name of the file when
                            it was uploaded so instead of it being named test.JPEG coul actually get named something like 
                            bunch of numbers .JPEG */
                            $fileNameNew = "/productsProfile/product".$data['id'].".". $fileActualExt;
                            $fileDestination = UPLOADFOLDER  . $fileNameNew ;
                            move_uploaded_file($fileTmpName,$fileDestination);
                            $data['imgFullName'] = $fileNameNew;
                            if($this->productDashModel->addProduct($data)) {
                                redirect('pages/productsDash');
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

                if($this->productDashModel->addProduct($data)) {
                    redirect('pages/productsDash');
                } else {
                    die('Something went wrong');
                }
            }
        }
        

             public function deleteProduct($id , $imgName) {
                
                    if($this->productDashModel->deleteProduct($id)) {
                        unlink(UPLOADFOLDER . "/productsFolder/" . $imgName);
                        redirect('pages/productsDash');
                    } else {
                        die('Something went wrong');
                    }
                
            }
        }
       