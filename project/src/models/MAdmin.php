<?php
/*
 * Gestione Hotels Server v1.0.0 (https://github.com/vittorioPiotti/Gestione-Hotels-Server/releases/tag/1.0.0)
 * Copyright 2024 Vittorio Piotti
 * Licensed under GPL-3.0 (https://github.com/vittorioPiotti/Gestione-Hotels-Server/blob/main/LICENSE.md)
 */
    /**
     * @access public
     * @package models
     *
     * @author Vittorio Piotti
     *
     * Class MAdmin
    */

    require_once __DIR__ . '/MUser.php';

    class MAdmin extends MUser {
        public function __construct() {
            // Chiamata al costruttore della classe genitore MUser
            parent::__construct(
                "SELECT * FROM GestioneHotels_Admins WHERE Email = :email AND Password = :password",
                "INSERT INTO GestioneHotels_Admins (Email, Password) VALUES (:email, :password)",
                "DELETE FROM GestioneHotels_Admins WHERE Id = :userId",
                "SELECT Email FROM GestioneHotels_Admins WHERE Email = :email"
            );
        }
    }
    

?>
