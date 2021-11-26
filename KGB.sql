
CREATE DATABASE IF NOT EXISTS eval_KGB;

USE eval_KGB;

CREATE TABLE Pays 
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    Nationalite VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX Nationalite ON Pays(Nationalite);

CREATE TABLE Statut
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    Statut VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX Statut ON Statut(Statut);

CREATE TABLE Type_Mission 
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    Types VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX Types ON Type_Mission(Types);

CREATE TABLE Specialite
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    Specialite VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX Specialite ON Specialite(Specialite);

CREATE TABLE Planque  
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    Code  VARCHAR(50) NOT NULL, 
    Adresse VARCHAR(50) NOT NULL, 
    Types VARCHAR(50) NOT NULL,
    Pays VARCHAR(50) NOT NULL,
    FOREIGN KEY (Pays) REFERENCES Pays(Nationalite)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX  Code  ON Planque (Code);

CREATE TABLE Cible
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50) NOT NULL,
    Date_de_naissance VARCHAR(50) NOT NULL , 
    Nom_de_code VARCHAR(50) NOT NULL ,
    Nationalite VARCHAR(50) NOT NULL,
    FOREIGN KEY (Nationalite) REFERENCES Pays(Nationalite)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX  Nom_de_code ON Cible(Nom_de_code);

CREATE TABLE Contact
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    Nom VARCHAR(50) NOT NULL,
    Prenom VARCHAR(50) NOT NULL,
    Date_de_naissance VARCHAR(50) NOT NULL , 
    Nom_de_code VARCHAR(50) NOT NULL ,
    Nationalite VARCHAR(50) NOT NULL,
    FOREIGN KEY (Nationalite) REFERENCES Pays(Nationalite)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX  Nom_de_code ON Contact(Nom_de_code);

CREATE TABLE Agent
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    Nom VARCHAR(50) NOT NULL, 
    Prenom VARCHAR(50) NOT NULL, 
    Date_de_naissance VARCHAR(50) NOT NULL , 
    nom_identifaction VARCHAR(50) NOT NULL ,
    Nationalite VARCHAR(50) NOT NULL,
    FOREIGN KEY (Nationalite) REFERENCES Pays(Nationalite),
    Specialite VARCHAR(50) NOT NULL,
    FOREIGN KEY (Specialite) REFERENCES Specialite(Specialite)

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX  nom_identifaction ON Agent( nom_identifaction);

CREATE TABLE Mission
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Titre VARCHAR(50) NOT NULL,
    Description VARCHAR(500) NOT NULL,
    Nom_de_code VARCHAR(50) NOT NULL,
    Pays VARCHAR(50) NOT NULL,
    FOREIGN KEY (Pays) REFERENCES Pays(Nationalite),
    Agent VARCHAR(50) NOT NULL,
    FOREIGN KEY (Agent) REFERENCES Agent(nom_identifaction),
    Contact VARCHAR(50) NOT NULL,
    FOREIGN KEY (Contact) REFERENCES Contact(Nom_de_code),
    Cible VARCHAR(50) NOT NULL,
    FOREIGN KEY (Cible) REFERENCES Cible(Nom_de_code),
    Type_Mission VARCHAR(50) NOT NULL,
    FOREIGN KEY (Type_Mission) REFERENCES Type_Mission(Types),
    Statut VARCHAR(50) NOT NULL,
    FOREIGN KEY (Statut) REFERENCES Statut(Statut),
    Planque VARCHAR(50) NOT NULL,
    FOREIGN KEY (Planque) REFERENCES Planque(Code),
    Specialite VARCHAR(50) NOT NULL,
    FOREIGN KEY (Specialite) REFERENCES Specialite(Specialite),
    Date_debut VARCHAR(50) NOT NULL,
    Date_fin VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE Admin
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Nom VARCHAR(50) NOT NULL, 
    Prenom VARCHAR(50) NOT NULL,
    Email VARCHAR(254) NOT NULL UNIQUE,
    Password CHAR(60) NOT NULL,
    Date_creation VARCHAR(50) NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8;






