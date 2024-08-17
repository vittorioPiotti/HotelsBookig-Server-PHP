# Gestione-Hotels-Server



Il server sviluppato per la versione `v.7.3` di PHP  è utilizzato per il client dell'app e del sito web del progetto Gestione Hotels:

 - [Gestione Hotels App](https://github.com/vittorioPiotti/Gestione-Hotels-App)
 - [Gestione Hotels Web](https://github.com/vittorioPiotti/Gestione-Hotels-Web)
## API

### getBookingsDataApp
- **Endpoint**: `/api?type=book&method=getBookingsDataApp`
- **Parametri**: `clientId=${globalId}`
- **Descrizione**: Ottiene i dati delle prenotazioni per il cliente specificato.

### getHotelsDataApp
- **Endpoint**: `/api?type=hotel&method=getHotelsDataApp`
- **Parametri**: Nessuno
- **Descrizione**: Ottiene i dati di tutti gli hotel.

### getHotelDataApp
- **Endpoint**: `/api?type=hotel&method=getHotelDataApp`
- **Parametri**: `idHotel=${idAlbergo}`
- **Descrizione**: Ottiene i dati di un hotel specifico.

### newbooking
- **Endpoint**: `/api?type=book&method=newbooking`
- **Parametri**: Nessuno
- **Descrizione**: Crea una nuova prenotazione.

### getHotelRoomsDataApp
- **Endpoint**: `/api?type=room&method=getHotelRoomsDataApp`
- **Parametri**: `idHotel=${idAlbergo}`
- **Descrizione**: Ottiene i dati delle stanze di un hotel specifico.

### getClientEmail
- **Endpoint**: `/api?type=auth&method=getClientEmail`
- **Parametri**: `idClient=${globalId}`
- **Descrizione**: Ottiene l'email del cliente specificato.

### editClientEmail
- **Endpoint**: `/api?type=auth&method=editClientEmail`
- **Parametri**: Nessuno
- **Descrizione**: Modifica l'email del cliente.

### editClientPassw
- **Endpoint**: `/api?type=auth&method=editClientPassw`
- **Parametri**: Nessuno
- **Descrizione**: Modifica la password del cliente.

### deleteClient
- **Endpoint**: `/api?type=auth&method=delete`
- **Parametri**: `authState=client`
- **Descrizione**: Elimina il cliente.

### loginClient
- **Endpoint**: `/api?type=auth&method=login`
- **Parametri**: `authState=client`
- **Descrizione**: Esegue il login per il cliente.

### dynamicClientMethod
- **Endpoint**: `/api?type=auth&method=${apiMethod}`
- **Parametri**: Nessuno
- **Descrizione**: Esegue una richiesta dinamica del client basata sul metodo specificato.


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

> [!WARNING]
> Questo software è rilasciato sotto la licenza **GPL v3** quindi l'uso, la modifica e la distribuzione del codice sorgente ne deve rispettare i termini.
> 
> I contenuti multimediali possono essere soggetti a una **licenza non commerciale** richiedendo l'acquisto di una licenza separata.


| Componente         | Versione  | Copyright                         | Licenza                                                       |
|--------------------|-----------|-----------------------------------|---------------------------------------------------------------|
| Gestione Hotels Server | v1.0.0    | 2024 Vittorio Piotti              | [GPL-3.0 License](https://github.com/vittorioPiotti/Gestione-Hotels-Server/blob/main/LICENSE.md) |
