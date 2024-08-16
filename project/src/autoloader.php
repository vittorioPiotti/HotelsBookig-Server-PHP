<?php
/*
 * Gestione Hotels Server v1.0.0 (https://github.com/vittorioPiotti/Gestione-Hotels-Server/releases/tag/1.0.0)
 * Copyright 2024 Vittorio Piotti
 * Licensed under GPL-3.0 (https://github.com/vittorioPiotti/Gestione-Hotels-Server/blob/main/LICENSE.md)
 */

require_once __DIR__ . '/foundations/FAPI.php';
require_once __DIR__ . '/foundations/FAuth.php';
require_once __DIR__ . '/foundations/FBooking.php';
require_once __DIR__ . '/foundations/FDB.php';
require_once __DIR__ . '/foundations/FHotel.php';
require_once __DIR__ . '/foundations/FRoom.php';

require_once __DIR__ . '/models/MAdmin.php';
require_once __DIR__ . '/models/MBooking.php';
require_once __DIR__ . '/models/MClient.php';
require_once __DIR__ . '/models/MHotel.php';
require_once __DIR__ . '/models/MRoom.php';
require_once __DIR__ . '/models/MUser.php';

require_once __DIR__ . '/serializers/SBooking.php';
require_once __DIR__ . '/serializers/SHotel.php';
require_once __DIR__ . '/serializers/SRoom.php';

?>
