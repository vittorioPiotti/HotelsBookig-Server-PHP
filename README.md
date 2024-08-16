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
| **getMusic**               | `type=music&method=getMusic&idMusic=${elementId}`           | `idMusic=${elementId}`                                    | Ottiene i dati di una specifica canzone.                                                                          |
| **getMusicMin**            | `type=music&method=getMusicMin&idMusic=${elementId}`        | `idMusic=${elementId}`                                    | Ottiene dati ridotti di una specifica canzone.                                                                    |
| **getAllArtistData**       | `type=artist&method=getAllArtistData&idArtist=${elementId}` | `idArtist=${elementId}`                                   | Ottiene tutti i dati di un artista specifico.                                                                     |
| **getArtist**              | `type=artist&method=getArtist&idArtist=${elementId}`        | `idArtist=${elementId}`                                   | Ottiene i dati di un artista specifico.                                                                           |
| **getAlbums**              | `type=artist&method=getAlbums&idArtist=${elementId}&listIds=${resultStr}` | `idArtist=${elementId}`, `listIds=${resultStr}`          | Ottiene la lista degli album di un artista.                                                                       |
| **getSingles**             | `type=artist&method=getSingles&idArtist=${elementId}&listIds=${resultStr}` | `idArtist=${elementId}`, `listIds=${resultStr}`          | Ottiene la lista dei singoli di un artista.                                                                       |
| **getMusics**              | `type=home&method=getMusics&listIds=${encodeURIComponent(resultStr)}` | `listIds=${encodeURIComponent(resultStr)}`               | Ottiene la lista delle canzoni specificate.                                                                       |
| **getArtists**             | `type=home&method=getArtists&listIds=${encodeURIComponent(resultStr)}` | `listIds=${encodeURIComponent(resultStr)}`               | Ottiene la lista degli artisti specificati.                                                                       |
| **getSearchedArtists**     | `type=home&method=getSearchedArtists&searchText=${encodeURIComponent(resultREGEXP)}&listIds=${encodeURIComponent(resultStr)}` | `searchText=${encodeURIComponent(resultREGEXP)}`, `listIds=${encodeURIComponent(resultStr)}` | Cerca artisti in base al testo specificato.                                                                        |
| **getSearchedMusics**      | `type=home&method=getSearchedMusics&searchText=${encodeURIComponent(resultREGEXP)}&listIds=${encodeURIComponent(resultStr)}` | `searchText=${encodeURIComponent(resultREGEXP)}`, `listIds=${encodeURIComponent(resultStr)}` | Cerca canzoni in base al testo specificato.                                                                        |
| **getAllHomeData**         | `type=home&method=getAllHomeData`                           | Nessun parametro                                          | Ottiene tutti i dati necessari per la schermata iniziale.                  



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
