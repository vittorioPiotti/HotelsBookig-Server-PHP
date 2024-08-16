<?php
/*
 * Gestione Hotels Server v1.0.0 (https://github.com/vittorioPiotti/Gestione-Hotels-Server/releases/tag/1.0.0)
 * Copyright 2024 Vittorio Piotti
 * Licensed under GPL-3.0 (https://github.com/vittorioPiotti/Gestione-Hotels-Server/blob/main/LICENSE.md)
 */
    /**
     * @access public
     * @package serializers
     *
     * @author Vittorio Piotti
     *
     * Class SRoom
    */
    


    class SRoom{
        
        // Metodi statici
        public static function serializeArray($rows) {
            $rooms = [];
            foreach ($rows as $row) {
                $room = SRoom::serializeSingle($row);
                $rooms[] = (object) $room;
            }
            return $rooms;
        }

        public static function serializeSingle($row) {
            return (object) [
                'name' => $row['Name'],
                'image' => $row['Image'],
                'description' => $row['Description'],
                'cost' => $row['Cost'],
                'totalRooms' => $row['TotalRooms'],
                'availability' => $row['Availability']
            ];
        }

        public static function serializeSingleBooking($row) {
            return (object) [
                'cost' => $row['Cost'],
                'availability' => $row['Availability']
            ];
        }
    }

?>
