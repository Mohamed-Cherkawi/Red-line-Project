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
                      ];
                    
                      if($this->trainerDashModel->addTrainer($data)) {
                          redirect('pages/trainersDash');
                      } else {
                          die('Something went wrong');
                      }
            }
        }

        public function editTrainer() {
            
            if(isset($_POST['editTrainer'])) {
                $data =[
                    'id' => $_POST['trainer_id'],
                    'trainerName' => $_POST['trainerName'],
                    'sport' => $_POST['sport']
                ];
                if($this->trainerDashModel->editTrainer($data)) {
                    redirect('pages/trainersDash');
                } else {
                    die('Something went wrong');
                }
            }
        }

        public function deleteTrainer() {
                if(isset($_GET['id'])) {

                    $id = $_GET['id'];

                    if($this->trainerDashModel->deleteTrainer($id)) {
                        redirect('pages/trainersDash');
                    } else {
                        die('Something went wrong');
                    }
                }
        }
    }