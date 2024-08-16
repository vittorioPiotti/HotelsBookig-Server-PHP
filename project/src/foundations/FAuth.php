<?php

    /**
     * @access public
     * @package foundation
     *
     * @author Vittorio Piotti
     *
     * Class FAuth
    */
    

    require_once __DIR__ . '/../models/MAdmin.php';
    require_once __DIR__ . '/../models/MClient.php';

    class FAuth {


        public function __construct() {
        }

        public function getRequest($apiMethod) {
            
            switch ($apiMethod) {
                case 'getClientEmail':
                    $idClient = isset($_GET['idClient']) ? $_GET['idClient'] : null;
                    $model =  new MClient();
					echo json_encode(array("email" =>  $model->getClientEmail($idClient)));
                    break;
                default:
    
    
                    break;
            }
        }


        public function postRequest($apiMethod) {
            switch ($apiMethod) {
case 'login':
                    $authState = isset($_GET['authState']) ? $_GET['authState'] : null;
                    $email = isset($_POST['email']) ? $_POST['email'] : null;
                    $password = isset($_POST['password']) ? $_POST['password'] : null;
                    $model = $authState == 'admin' ? new MAdmin() : new MClient();
                    echo json_encode(array("userId" =>  $model->login($email,$password)));
                    break;

                case 'register':
                    $authState = isset($_GET['authState']) ? $_GET['authState'] : null;
                    $email = isset($_POST['email']) ? $_POST['email'] : null;
                    $password = isset($_POST['password']) ? $_POST['password'] : null;
                    $model = $authState == 'admin' ? new MAdmin() : new MClient();
                    echo json_encode(array("register" =>  $model->register($email,$password)));
                    break;
                case 'delete':
                    $authState = isset($_GET['authState']) ? $_GET['authState'] : null;
                    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
                    $model = $authState == 'admin' ? new MAdmin() : new MClient();
					echo json_encode(array("delete" =>  $model->deleteAccount($userId)));
                    break;
                case 'editClientEmail':
                    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
                    $newEmail = isset($_POST['newEmail']) ? $_POST['newEmail'] : null;
                    $model = new MClient();
                    echo json_encode(array("editEmail" => $model->editClientEmail($userId, $newEmail)));
                    break;
                case 'editClientPassw':
                    $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
                    $newPassw = isset($_POST['newPassw']) ? $_POST['newPassw'] : null;
                    $model = new MClient();
                    echo json_encode(array("editPassw" => $model->editClientPassw($userId, $newPassw)));
                    break;
                default:
                    echo json_encode(array("error" => "Metodo non trovato"));
                    break;
            }
        }

    }


?>


