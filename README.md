# Creazione rubrica.
Creare un applicazione che consenta l'inserimento la modifica e la cancellazione di una rubrica telefonica, mostrare l'elenco dei contatti e prevedere la cancellazione massiva da elenco, utilizzare le tranzazione dove necessario, consegnare codice mysql,  php e analisi di progetto (Casi d'uso, ipotesi aggiuntive, Modello ER e Schema Logico )

Sara' possibile il diagramma ER nella directory docs.

# Database
Comandi:
```mysql
CREATE TABLE Numeri(
    idNumero INT AUTO_INCREMENT PRIMARY KEY,
    numero VARCHAR(10) NOT NULL
);

CREATE TABLE Aziende(
    idAzienda INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(32) NOT NULL
);

CREATE TABLE Contatti(
    idContatto INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(64) NOT NULL,
    idNumero INT NOT NULL UNIQUE,
    idAzienda INT NOT NULL,
    FOREIGN KEY (idNumero) REFERENCES Numeri(idNumero),
    FOREIGN KEY (idAzienda) REFERENCES Aziende(idAzienda)
);
```
# Schema logico
```txt
tabella  //    campo    //    chiave    //    tipo    //    opzionalita'
Contatti     
           idContatto     PRIMARY         INT AI        NO
           nome           NO              VARCHAR(32)   NO
           idNumero       FK              INT           NO
           idAzienda      FK              INT           NO

Numeri     idNumero       PRIMARY         INT AI        NO
           numero         VARCHAR(10)     INT           NO
           
Aziende    idAzienda      PRIMARY         INT AI        NO
           nome           VARCHAR(10)     INT           NO
```

# Ipotesi
Ipotizzo che ogni contatto possa avere piu' di un numero e di un'azienda
  . Il nome e' sufficiente per modificare un contatto in quanto non possono esistere 2 nomi uguali
           
