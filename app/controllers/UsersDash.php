<?php
    
    class UsersDash extends Controller{

        public function __construct(){
            $this->userDashModel = $this->model('userDash');
        }

        public function addUser() {

            if(isset($_POST['addUser'])) {
                    
                    // filter input function that removes html special charct and whitespace from both sides of the string
                    function filter_inputF($data) {
                        $data = trim($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    $data =[
                        'userName' => filter_inputF($_POST['username']),
                        'email' => filter_inputF($_POST['email']),
                      ];
                    
                      if($this->userDashModel->addUser($data)) {
                          redirect('pages/usersDash');
                      } else {
                          die('Something went wrong');
                      }
            }
        }

        public function editUser() {
            
            if(isset($_POST['editUser'])) {
                $data =[
                    'id' => $_POST['user_id'],
                    'userName' => $_POST['username'],
                    'email' => $_POST['email'],
                ];
                if($this->userDashModel->editUser($data)) {
                    redirect('pages/usersDash');
                } else {
                    die('Something went wrong');
                }
            }
        }

        public function deleteUser() {
                if(isset($_GET['id'])) {

                    $id = $_GET['id'];

                    if($this->userDashModel->deleteUser($id)) {
                        redirect('pages/usersDash');
                    } else {
                        die('Something went wrong');
                    }
                }
        }
    }