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
 * Class MBooking
 */

 require_once __DIR__ . '/../foundations/FDB.php';
 require_once __DIR__ . '/../serializers/SBooking.php';


class MBooking {
    private $db; // Variabile per la connessione al database


   private $queryGetBookingsDataApp = "SELECT 
        b.Id AS id, 
        h.Name AS hotel, 
        r.Name AS room, 
        r.Cost * DATEDIFF(b.EndDate, b.StartDate) AS cost, 
        b.StartDate AS fsDate, 
        b.EndDate AS ndDate 
    FROM 
        GestioneHotels_Bookings b
    JOIN 
        GestioneHotels_Rooms r ON b.IdRoom = r.id
    JOIN 
        GestioneHotels_Hotels h ON r.IdHotel = h.id 
    JOIN 
        GestioneHotels_Clients c ON b.IdClient = c.id 
    WHERE 
        c.id = :idClient
    ORDER BY 
        b.id DESC;
    ";



    private $queryGetBookPreviewApp = "SELECT 
    h.Name AS hotelName,
    r.Image AS roomImage,
    r.Id AS roomId, 
    r.Description AS descrizione, 
    r.Cost AS roomCost,
    ((SELECT COUNT(r.Name)
        FROM GestioneHotels_Rooms AS r 
        JOIN GestioneHotels_Hotels AS h ON r.IdHotel = h.Id
        WHERE h.id = :idHotel AND r.Name = :roomName )
        
        -
        
        (SELECT COUNT(r.Name)
        FROM GestioneHotels_Rooms AS r 
        JOIN GestioneHotels_Hotels AS h ON r.IdHotel = h.Id
        JOIN GestioneHotels_Bookings AS b ON b.IdRoom = r.Id 
        WHERE h.id = :idHotel AND r.Name = :roomName 
        AND b.StartDate <= :endDate AND b.EndDate >= :startDate)
    ) AS availability,

    DATEDIFF(:endDate, :startDate) * r.Cost AS cost
FROM 
    GestioneHotels_Rooms AS r 
JOIN 
    GestioneHotels_Hotels AS h ON r.IdHotel = h.Id
WHERE 
    h.id = :idHotel AND r.Name = :roomName LIMIT 1;

 ";

    private $queryNewBooking = "INSERT INTO GestioneHotels_Bookings (IdClient, IdRoom, StartDate, EndDate) VALUES (:idClient, :idRoom, :startDate, :endDate)";
    private $queryGetClientBookings = "SELECT 
        b.Id AS BookingId,
        b.StartDate AS BookingStartDate,
        b.EndDate AS BookingEndDate,
        r.Number AS BookingRoomNumber,
        r.Name AS RoomName,
        r.Cost * DATEDIFF(b.EndDate, b.StartDate) AS TotalCost,
        r.IdHotel AS RoomHotelId,
        h.Name AS HotelName
    FROM 
    GestioneHotels_Bookings b
    JOIN 
    GestioneHotels_Rooms r ON b.IdRoom = r.Id
    JOIN 
        GestioneHotels_Hotels h ON r.IdHotel = h.Id
    WHERE 
        b.IdClient = :idClient";

    private $queryGetAdminlBookings = "SELECT 
    GestioneHotels_Bookings.Id AS BookingId, 
    GestioneHotels_Bookings.StartDate AS BookingStartDate,
    GestioneHotels_Bookings.EndDate AS BookingEndDate, 
    GestioneHotels_Rooms.Number AS BookingRoomNumber, 
    GestioneHotels_Rooms.Name AS RoomName, 
    GestioneHotels_Rooms.Cost * DATEDIFF(GestioneHotels_Bookings.EndDate, 
    GestioneHotels_Bookings.StartDate) AS TotalCost, 
    GestioneHotels_Hotels.Id AS RoomHotelId, 
    GestioneHotels_Hotels.Name AS HotelName, 
    GestioneHotels_Clients.Email AS ClientEmail 
    FROM GestioneHotels_Bookings JOIN GestioneHotels_Rooms 
    ON GestioneHotels_Rooms.Id = GestioneHotels_Bookings.IdRoom 
    JOIN GestioneHotels_Hotels ON GestioneHotels_Hotels.Id = GestioneHotels_Rooms.IdHotel 
    JOIN GestioneHotels_Admins ON GestioneHotels_Admins.Id = GestioneHotels_Hotels.IdAdmin 
    JOIN GestioneHotels_Clients ON GestioneHotels_Clients.id = GestioneHotels_Bookings.IdClient
    WHERE GestioneHotels_Admins.Id = :adminId
    GROUP BY GestioneHotels_Bookings.Id,GestioneHotels_Clients.Email;";

    public function __construct() {
        // Ottieni un'istanza della connessione al database
        $this->db = FDB::getInstance()->getConnection();
    }

    public function closeConnection() {
        // Chiudi la connessione al database
        FDB::getInstance()->closeConnection();
    }

    public function newBooking($idClient, $idRoom, $startDate, $endDate) {
        $statement = $this->db->prepare($this->queryNewBooking);
        $statement->bindParam(':idClient', $idClient, PDO::PARAM_INT); 
        $statement->bindParam(':idRoom', $idRoom, PDO::PARAM_INT); 
        $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR); 
        $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
        $success = $statement->execute(); // Esegui la query e controlla se ha avuto successo
        $this->closeConnection();
        
        return $success;
    }

    public function getBookPreviewApp($startDate,$endDate,$idHotel,$roomName){
        $statement = $this->db->prepare($this->queryGetBookPreviewApp);
        $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR);
        $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
        $statement->bindParam(':idHotel', $idHotel, PDO::PARAM_INT);
        $statement->bindParam(':roomName', $roomName, PDO::PARAM_STR);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
    }
    public function getBookingsDataApp($clientId) {
        $statement = $this->db->prepare($this->queryGetBookingsDataApp);
        $statement->bindParam(':idClient', $clientId, PDO::PARAM_INT);
        $statement->execute();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
    }
    
    public function getClientBookings($clientId) {
        $statement = $this->db->prepare($this->queryGetClientBookings);
        $statement->bindParam(':idClient', $clientId, PDO::PARAM_INT);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return SBooking::serializeArray($rows);
    }

    public function getAdminBookings($adminId) {
        $statement = $this->db->prepare($this->queryGetAdminlBookings);
        $statement->bindParam(':adminId', $adminId, PDO::PARAM_INT);
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return SBooking::serializeArrayAdmin($rows);
    }
}

?>
