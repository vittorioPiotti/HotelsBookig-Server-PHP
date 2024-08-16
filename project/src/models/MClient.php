<?php

    /**
     * @access public
     * @package models
     *
     * @author Vittorio Piotti
     *
     * Class MClient
    */

    require_once __DIR__ . '/MUser.php';


    class MClient extends MUser {
        public function __construct() {
            // Chiamata al costruttore della classe genitore MUser
            parent::__construct(
                "SELECT * FROM GestioneHotels_Clients WHERE Email = :email AND Password = :password",
                "INSERT INTO GestioneHotels_Clients (Email, Password) VALUES (:email, :password)",
                "DELETE FROM GestioneHotels_Clients WHERE Id = :userId",
                "SELECT Email FROM GestioneHotels_Clients WHERE Email = :email"
            );
        }
    }

?>