# Gestione-Hotels-Server



Il server sviluppato per la versione `v.7.3` di PHP  è utilizzato per il client dell'app e del sito web del progetto Gestione Hotels:

 - [Gestione Hotels App](https://github.com/vittorioPiotti/Gestione-Hotels-App)
 - [Gestione Hotels Web](https://github.com/vittorioPiotti/Gestione-Hotels-Web)

## API

| Nome API                | URL                                          | Parametri                           | Descrizione                                                                    |
|-------------------------|----------------------------------------------|-------------------------------------|--------------------------------------------------------------------------------|
| **getBookingsDataApp**  | `/api?type=book&method=getBookingsDataApp`   | `clientId=${globalId}`              | Ottiene i dati delle prenotazioni per il cliente specificato.                  |
| **getHotelsDataApp**    | `/api?type=hotel&method=getHotelsDataApp`    | Nessuno                             | Ottiene i dati di tutti gli hotel.                                             |
| **getHotelDataApp**     | `/api?type=hotel&method=getHotelDataApp`     | `idHotel=${idAlbergo}`              | Ottiene i dati di un hotel specifico.                                           |
| **newbooking**          | `/api?type=book&method=newbooking`           | Nessuno                             | Crea una nuova prenotazione.                                                   |
| **getHotelRoomsDataApp**| `/api?type=room&method=getHotelRoomsDataApp` | `idHotel=${idAlbergo}`              | Ottiene i dati delle stanze di un hotel specifico.                               |
| **getClientEmail**      | `/api?type=auth&method=getClientEmail`       | `idClient=${globalId}`              | Ottiene l'email del cliente specificato.                                         |
| **editClientEmail**     | `/api?type=auth&method=editClientEmail`      | Nessuno                             | Modifica l'email del cliente.                                                  |
| **editClientPassw**     | `/api?type=auth&method=editClientPassw`      | Nessuno                             | Modifica la password del cliente.                                              |
| **deleteClient**        | `/api?type=auth&method=delete`               | `authState=client`                  | Elimina il cliente.                                                             |
| **loginClient**         | `/api?type=auth&method=login`                | `authState=client`                  | Esegue il login per il cliente.                                                 |
| **dynamicClientMethod** | `/api?type=auth&method=${apiMethod}`         | Nessuno                             | Esegue una richiesta dinamica del client basata sul metodo specificato.         |
| **...** | `...`         | ...                             | ...         |



## Albero di Path 

```bash
$ tree
.
└── GestioneHotel
    └── Server
    	├── /src
    	│   ├── /foundations: gestori API
    	│   │   ├── FAPI.php: main gestore API
    	│   │   ├── FAuth.php: gestore API Profilo
    	│   │   ├── FBooking.php: gestore API Prenotazioni
    	│   │   ├── FDB.php: gestore connessione DB
    	│   │   ├── FHotel.php: gestore API Alberghi
    	│   │   └── FRoom.php: gestore API Room
    	│   ├── /models: gestori Query DB
    	│   │   ├── MAdmin.php: 
    	│   │   ├── MBooking.php: gestore Query DB Prenotazioni
    	│   │   ├── MClient.php: 
    	│   │   ├── MHotel.php: gestore Query DB Alberghi
    	│   │   ├── MRoom.php: gestore Query DB Stanze
    	│   │   └── MUser.php: gestore Query DB Utente
    	│   ├── /serializers: serializzazione risposte Query
    	│   │   ├── SBooking.php
    	│   │   ├── SHotel.php
    	│   │   └── SRoom.php
    	│   └── autoloader.php
    	└── index.php

```


## Licenze
| Componente         | Versione  | Copyright                         | Licenza                                                       |
|--------------------|-----------|-----------------------------------|---------------------------------------------------------------|
| Gestione Hotels Server | v1.0.0    | 2024 Vittorio Piotti              | [GPL-3.0 License](https://github.com/vittorioPiotti/Gestione-Hotels-Server/blob/main/LICENSE.md) |
