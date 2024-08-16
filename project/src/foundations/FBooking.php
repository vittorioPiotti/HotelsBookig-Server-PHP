<?php
/*
 * Gestione Hotels Server v1.0.0 (https://github.com/vittorioPiotti/Gestione-Hotels-Server/releases/tag/1.0.0)
 * Copyright 2024 Vittorio Piotti
 * Licensed under GPL-3.0 (https://github.com/vittorioPiotti/Gestione-Hotels-Server/blob/main/LICENSE.md)
 */

    /**
     * @access public
     * @package foundation
     *
     * @author Vittorio Piotti
     *
     * Class FBooking
    */
    
    require_once __DIR__ . '/../models/MRoom.php';
    require_once __DIR__ . '/../models/MBooking.php';
    
    class FBooking {


        public function __construct() {
        }

        public function getRequest($apiMethod) {
            switch ($apiMethod) {
                case 'getClientBookings':
                    $this->getClientBookings();
                    break;
                case 'getAdminBookings':
                    $this->getAdminBookings();
                    break;
                case 'getBookingsDataApp':
                    $this->getBookingsDataApp();
                    break;
                case 'getBookPreviewApp':
                    $this->getBookPreviewApp();
                    break;
                default:
                    http_response_code(404);
                    echo json_encode(array("error" => "Metodo non trovato"));
                    break;
            }
        }


        public function postRequest($apiMethod) {
            switch ($apiMethod) {
                case 'newbooking':
                    $this->newBooking();
                    break;
                default:
                    http_response_code(404);
                    echo json_encode(array("error" => "Metodo non trovato"));
                    break;
            }
        }

        public function getClientBookings(){
    $clientId = isset($_GET['clientId']) ? $_GET['clientId'] : null;
    $mBook = new MBooking();
    $bookings = $mBook->getClientBookings($clientId);

    // Se vuoi una rappresentazione JSON dei dati, converte l'array in JSON
    echo json_encode($bookings);
}


public function getAdminBookings(){
    $adminId = isset($_GET['adminId']) ? $_GET['adminId'] : null;
    $mBook = new MBooking();
    $bookings = $mBook->getAdminBookings($adminId);
    echo json_encode($bookings);

    

   
}

public function getBookPreviewApp(){
  
    $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : null;
    $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : null;
    $hotelId = isset($_GET['hotelId']) ? $_GET['hotelId'] : null;
    $roomName = isset($_GET['roomName']) ? $_GET['roomName'] : null;
    $mBook = new MBooking();
    $bookings = $mBook->getBookPreviewApp($startDate,$endDate,$hotelId,$roomName);

    echo $bookings;
}
public function getBookingsDataApp(){
    $clientId = isset($_GET['clientId']) ? $_GET['clientId'] : null;
    $mBook = new MBooking();
    $bookings = $mBook->getBookingsDataApp($clientId);

    echo $bookings;
}
        
        



        public function newBooking(){
          $roomName = $_POST['roomName'] ?? null;
        $hotelId = $_POST['hotelId'] ?? null;
        $startDate = $_POST['startDate'] ?? null;
        $endDate = $_POST['endDate'] ?? null;
        $clientId = $_POST['clientId'] ?? null;
$mRoom = new MRoom();
            $roomId = $mRoom->getFirstFreeRoom($roomName,$hotelId,$startDate,$endDate);
            if ($roomId != false){
                $mBook = new MBooking();
                $booked = $mBook->newBooking($clientId, $roomId, $startDate, $endDate);
                echo json_encode(array("booked" => $booked));
                
            }else{
                echo json_encode(array("booked" =>  $roomId));

            }
            
        }




        

    }


?>


