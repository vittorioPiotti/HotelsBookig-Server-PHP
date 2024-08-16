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
     * Class MUser
    */


    require_once __DIR__ . '/../foundations/FDB.php';

    
    class MUser {
        
        protected $db;
        private $loginQuery;
        private $registerQuery;
        private $deleteAccountQuery;
        private $emailExistsQuery;

        private $queryGetClientEmail = "SELECT GestioneHotels_Clients.Email as email FROM `GestioneHotels_Clients` WHERE GestioneHotels_Clients.Id = :idClient;";
        private $queryEditClientEmail = "UPDATE GestioneHotels_Clients SET Email = :newEmail WHERE Id = :idClient;";
		private $queryEditClientPassw = "UPDATE GestioneHotels_Clients SET GestioneHotels_Clients.Password = :newPassword WHERE Id = :idClient;";


  public function editClientEmail($idClient, $newEmail) {
    // Controlla se i parametri sono vuoti
    if (empty($idClient) || empty($newEmail)) {
        return false;
    }
    
    $query = $this->queryEditClientEmail;
    $statement = $this->db->prepare($query);
    $statement->bindParam(':idClient', $idClient, PDO::PARAM_INT);
    $statement->bindParam(':newEmail', $newEmail, PDO::PARAM_STR);
    $statement->execute();
    $affectedRows = $statement->rowCount();
    $this->closeConnection();
    return $affectedRows > 0;
}

public function editClientPassw($idClient, $newPassword) {
    // Funzione per verificare se una stringa è già hashata con SHA3-256
    function isSha3_256($string) {
        return preg_match('/^[a-f0-9]{64}$/i', $string);
    }

    // Controlla se i parametri sono vuoti
    if (empty($idClient) || empty($newPassword)) {
        return false;
    }
    
    // Se la newPassword non è hashata, esegui l'hashing
    if (!isSha3_256($newPassword)) {
        $newPassword = hash('sha3-256', $newPassword);
    }

    $query = $this->queryEditClientPassw;
    $statement = $this->db->prepare($query);
    $statement->bindParam(':idClient', $idClient, PDO::PARAM_INT);
    $statement->bindParam(':newPassword', $newPassword, PDO::PARAM_STR);
    $statement->execute();
    $affectedRows = $statement->rowCount();
    $this->closeConnection();
    return $affectedRows > 0;
}


      
       public function getClientEmail($idClient) {
          $query = $this->queryGetClientEmail;
          $statement = $this->db->prepare($query);
          $statement->bindParam(':idClient', $idClient);
          $statement->execute();
          $user = $statement->fetch(PDO::FETCH_ASSOC);
          $this->closeConnection();
          if ($user) {
              return $user['email'];
          } else {
              return false;
          }
      }
    
        public function __construct($loginQuery, $registerQuery, $deleteAccountQuery, $emailExistsQuery) {
            $this->db = FDB::getInstance()->getConnection();
            $this->loginQuery = $loginQuery;
            $this->registerQuery = $registerQuery;
            $this->deleteAccountQuery = $deleteAccountQuery;
            $this->emailExistsQuery = $emailExistsQuery;
        }
    
     public function login($email, $password) {
    // Verifica se la password fornita è già hashata
    function isSha3_256($string) {
        return preg_match('/^[a-f0-9]{64}$/i', $string);
    }

    if (!isSha3_256($password)) {
        // Se la password non è hashata, esegui l'hashing
        $password = hash('sha3-256', $password);
    }

    $query = $this->loginQuery;
    $statement = $this->db->prepare($query);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $this->closeConnection();

    if ($user) {
        return $user['Id'];
    } else {
        return false;
    }
}

    
        public function register($email, $password) {

          
            if (!$this->checkEmail($email) || !$this->checkPassword($password)) {
                return false;
            }
    
            if ($this->emailExists($email)) {
                return false;
            }
    

            function isSha3_256($string) {
                return preg_match('/^[a-f0-9]{64}$/i', $string);
            }
        
            if (!isSha3_256($password)) {
                // Se la password non è hashata, esegui l'hashing
                $password = hash('sha3-256', $password);
            }
            
            
    
            $query = $this->registerQuery;
            $statement = $this->db->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':password', $password);
            $success = $statement->execute();
            $this->closeConnection();

            return true;
        }
    
      public function deleteAccount($userId) {
    $query = $this->deleteAccountQuery;
    $statement = $this->db->prepare($query);
    $statement->bindParam(':userId', $userId);
    $success = $statement->execute();
    $rowCount = $statement->rowCount(); // Ottieni il numero di righe eliminate

    $this->closeConnection();

    return $rowCount > 0; // Restituisci true se almeno una riga è stata eliminata, altrimenti false
}

    
        protected function emailExists($email) {
            $query = $this->emailExistsQuery;
            $statement = $this->db->prepare($query);
            $statement->bindParam(':email', $email);
            $statement->execute();
    
            $existingEmail = $statement->fetch(PDO::FETCH_ASSOC);
    
            return $existingEmail !== false;
        }
    
        protected function checkEmail($email) {
            return !empty($email);
        }
    
        protected function checkPassword($password) {
            return !empty($password);
        }


        public function closeConnection() {
            FDB::getInstance()->closeConnection();
        }

    }
    
?>
