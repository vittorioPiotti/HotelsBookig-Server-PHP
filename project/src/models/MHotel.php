<?php

    /**
     * @access public
     * @package models
     *
     * @author Vittorio Piotti
     *
     * Class MHotel
    */


    require_once __DIR__ . '/../foundations/FDB.php';
    require_once __DIR__ . '/../serializers/SHotel.php';

    

    class MHotel {

        private $db;

        private $queryDeleteHotel = "DELETE FROM GestioneHotels_Hotels
        WHERE Id = :idHotel;
        ";

     
private $queryGetHotelsDataApp = "
SELECT
    GH_Hotels.Id AS id,
    GH_Hotels.Name AS nome,
    GH_Hotels.Image AS immagine, 
    GROUP_CONCAT(GH_Rooms.Name SEPARATOR ',') AS nome_stanza,
    GROUP_CONCAT(GH_Rooms.Image SEPARATOR ',') AS immagine_stanza,
    ROUND(AVG(GH_Rooms.Cost), 0) AS costo
FROM
    GestioneHotels_Hotels GH_Hotels
JOIN (
    SELECT
        IdHotel,
        Name,
        Image,
        Cost
    FROM
        GestioneHotels_Rooms
    GROUP BY
        IdHotel, Name
) GH_Rooms ON GH_Hotels.Id = GH_Rooms.IdHotel
GROUP BY
    GH_Hotels.Id;

";



private $queryGetHotelDataApp = "
SELECT
    GH_Hotels.Id AS id,
    GH_Hotels.Name AS nome,
    GH_Hotels.Image AS immagine,
    GH_Hotels.Description AS descrizione, 
    GROUP_CONCAT(GH_Rooms.Name SEPARATOR ',') AS nome_stanza,
    GROUP_CONCAT(GH_Rooms.Image SEPARATOR ',') AS immagine_stanza,
    ROUND(AVG(GH_Rooms.Cost), 0) AS costo
FROM
    GestioneHotels_Hotels GH_Hotels
JOIN (
    SELECT
        IdHotel,
        Name,
        Image,
        Cost
    FROM
        GestioneHotels_Rooms
    GROUP BY
        IdHotel, Name, Image, Cost
) GH_Rooms ON GH_Hotels.Id = GH_Rooms.IdHotel
WHERE
    GH_Hotels.Id = :hotelId
GROUP BY
    GH_Hotels.Id, GH_Hotels.Name, GH_Hotels.Image, GH_Hotels.Description;
";


private $queryGetHotelName = "SELECT 
      b.name
  FROM 
      GestioneHotels_Hotels b
  WHERE 
      b.Id = :id;";
      
        private $queryUpdateHotel = "UPDATE GestioneHotels_Hotels 
        SET 
            Name = :name,
            Image = :image,
            Description = :description
        WHERE 
            Id = :idHotel;
      ";
    
    private $queryAddNewHotel = "INSERT INTO GestioneHotels_Hotels 
    (IdAdmin, Name, Image, Description) 
    VALUES 
    (:idAdmin, :name, :image, :description)
    ";
  private $queryFindHotel = "SELECT COUNT(*) AS numHotels FROM GestioneHotels_Hotels WHERE Id = :idHotel";
        
      private $queryGetHotelsByIdAdmin = "SELECT * FROM GestioneHotels_Hotels WHERE IdAdmin = :idAdmin";

        private $queryGetAllHotels = "SELECT 
        h.*, 
        (SELECT COUNT(*) FROM GestioneHotels_Rooms r WHERE r.IdHotel = h.Id) AS TotalRooms,
        (SELECT COUNT(*) 
            FROM GestioneHotels_Rooms r 
            LEFT JOIN GestioneHotels_Bookings b 
                ON r.Id = b.IdRoom 
            WHERE h.Id = r.IdHotel 
                AND (b.Id IS NULL OR :startDate > b.EndDate OR :endDate < b.StartDate)
        ) AS Availability
    FROM 
        GestioneHotels_Hotels h;
    ";



        private  $queryGetHotelById = "SELECT 
        h.*, 
        COUNT(r.Id) AS TotalRooms,
        SUM(CASE 
                WHEN b.IdRoom IS NULL THEN 1 
                WHEN :startDate > b.EndDate OR :endDate < b.StartDate THEN 1 
                ELSE 0 
            END) AS Availability
        FROM 
        GestioneHotels_Hotels h 
        LEFT JOIN 
        GestioneHotels_Rooms r ON h.Id = r.IdHotel 
        LEFT JOIN 
        GestioneHotels_Bookings b ON r.Id = b.IdRoom
        WHERE 
        h.Id = :id 
        GROUP BY 
        h.Id";

      private $queryCheckExistHotel = "";

        public function __construct() {
            $this->db = FDB::getInstance()->getConnection();
        }


       public function updateHotelData($hotel) {
       $name = $hotel['name'];
      $idHotel = $hotel['idHotel'];
      $adminId = $hotel['adminId'];
      $desc = $hotel['description'];
      $image = $hotel['image'];
    
        // Check if the hotel already exists
        $statement = $this->db->prepare($this->queryFindHotel);
        $statement->bindParam(':idHotel', $idHotel, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $numHotels = $result['numHotels'] ?? 0;
    
        if ($numHotels > 0) {
            // Update existing hotel data
            $statement = $this->db->prepare($this->queryUpdateHotel);
            $statement->bindParam(':idHotel', $idHotel, PDO::PARAM_INT);
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':image', $image, PDO::PARAM_STR);
            $statement->bindParam(':description', $desc, PDO::PARAM_STR);
            $success = $statement->execute();
        } else {
            // Insert new hotel data
            $statement = $this->db->prepare($this->queryAddNewHotel);
            $statement->bindParam(':idAdmin', $adminId, PDO::PARAM_INT);
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':image', $image, PDO::PARAM_STR);
            $statement->bindParam(':description', $desc, PDO::PARAM_STR);
            $success = $statement->execute();
            $idHotel = $this->db->lastInsertId();
        }
    
        if ($success) {
            return json_encode(array("idHotel" => $idHotel));
        } else {
            throw new Exception("Failed to update or insert hotel data.");
        }
   
}

      
      
      
      
      
     



        public function deleteHotelData($idHotel) {
            $statement = $this->db->prepare($this->queryDeleteHotel);
            $statement->bindParam(':idHotel', $idHotel, PDO::PARAM_INT);
            $success = $statement->execute();

            if ($success) {
                return json_encode(array("check" => "Hotel eliminato correttamente"));
            } else {
                return json_encode(array("error" => "Impossibile eliminare l'hotel"));
            }
        }
        public function getHotelsDataApp() {
          $statement = $this->db->prepare($this->queryGetHotelsDataApp);
          $statement->execute();
          $results = $statement->fetchAll(PDO::FETCH_ASSOC);
          $this->closeConnection();
          return json_encode($results);
        }

        public function getHotelDataApp($id) {
            $statement = $this->db->prepare($this->queryGetHotelDataApp);
            $statement->bindParam(':hotelId', $id, PDO::PARAM_INT); 
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            $this->closeConnection();
            return json_encode($results);
          }
      

        public function getAllHotels($startDate, $endDate) {
          $statement = $this->db->prepare($this->queryGetAllHotels);
          $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR);
          $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
          $statement->execute();
          $this->closeConnection();
          return ($statement) ? json_encode($this->fetchHotels($statement)) : json_encode([]);
      }
              
        public function getHotelById($id, $startDate, $endDate) {
          $statement = $this->db->prepare($this->queryGetHotelById);
          $statement->bindParam(':id', $id, PDO::PARAM_INT); 
          $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR); 
          $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
          $statement->execute();
          $hotel = $statement->fetch(PDO::FETCH_ASSOC); 
          $this->closeConnection();
          return ($hotel) ? json_encode(SHotel::serializeSingle($hotel)) : json_encode([]);

      }

      public function getHotelsByIdAdmin($idAdmin){
        $statement = $this->db->prepare($this->queryGetHotelsByIdAdmin);
        $statement->bindParam(':idAdmin', $idAdmin, PDO::PARAM_INT); 
        $statement->execute();
        $this->closeConnection();
        return ($statement) ? json_encode($this->fetchHotels($statement)) : json_encode([]);
      }
      
        public function closeConnection() {
            FDB::getInstance()->closeConnection();
        }
                  
        private function fetchHotels($statement) {
          $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
          return SHotel::serializeArray($rows);
      }
      
    }


?>
