<?php
    
    class AdminsDash extends Controller{

        public function __construct(){
            $this->adminDashModel = $this->model('adminDash');
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
                        'adminName' => filter_inputF($_POST['adminname']),
                        'email' => filter_inputF($_POST['email']),
                        'password' => filter_inputF($_POST['password'])
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
                $data =[
                    'id' => $_POST['user_id'],
                    'adminName' => $_POST['adminName'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                ];
                if($this->userDashModel->editAdmin($data)) {
                    redirect('pages/AdminsDash');
                } else {
                    die('Something went wrong');
                }
            }
        }
    }