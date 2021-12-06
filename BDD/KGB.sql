
CREATE DATABASE IF NOT EXISTS eval_KGB;

USE eval_KGB;

CREATE TABLE Pays 
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nationalite VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX nationalite ON Pays(nationalite);

CREATE TABLE Statut
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    statut VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX Statut ON Statut(statut);

CREATE TABLE Type_Mission 
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    type VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX type ON Type_Mission(type);

CREATE TABLE Specialite
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    specialite VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX Specialite ON Specialite(specialite);

CREATE TABLE Planque  
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    code  VARCHAR(50) NOT NULL, 
    adresse VARCHAR(50) NOT NULL, 
    type VARCHAR(50) NOT NULL,
    pays VARCHAR(50) NOT NULL,
    FOREIGN KEY (pays) REFERENCES Pays(nationalite)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX  code  ON Planque (code);

CREATE TABLE Cible
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    date_de_naissance VARCHAR(50) NOT NULL , 
    nom_de_code VARCHAR(50) NOT NULL ,
    nationalite VARCHAR(50) NOT NULL,
    FOREIGN KEY (nationalite) REFERENCES Pays(nationalite)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX  nom_de_code ON Cible(nom_de_code);

CREATE TABLE Contact
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    date_de_naissance VARCHAR(50) NOT NULL , 
    nom_de_code VARCHAR(50) NOT NULL ,
    nationalite VARCHAR(50) NOT NULL,
    FOREIGN KEY (nationalite) REFERENCES Pays(nationalite)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX  nom_de_code ON Contact(nom_de_code);

CREATE TABLE Agent
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    nom VARCHAR(50) NOT NULL, 
    prenom VARCHAR(50) NOT NULL, 
    date_de_naissance VARCHAR(50) NOT NULL , 
    nom_identification VARCHAR(50) NOT NULL ,
    nationalite VARCHAR(50) NOT NULL,
    FOREIGN KEY (nationalite) REFERENCES Pays(nationalite),
    specialite VARCHAR(50) NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE INDEX  nom_identification ON Agent( nom_identification);

CREATE TABLE Mission
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(50) NOT NULL,
    description VARCHAR(500) NOT NULL,
    nom_de_code VARCHAR(50) NOT NULL,
    pays VARCHAR(50) NOT NULL,
    FOREIGN KEY (Pays) REFERENCES Pays(nationalite),
    agent VARCHAR(50) NOT NULL,
    contact VARCHAR(50) NOT NULL,
    cible VARCHAR(50) NOT NULL,
    type_mission VARCHAR(50) NOT NULL,
    FOREIGN KEY (Type_mission) REFERENCES Type_Mission(type),
    statut VARCHAR(50) NOT NULL,
    FOREIGN KEY (Statut) REFERENCES Statut(Statut),
    planque VARCHAR(50),
    specialite VARCHAR(50) NOT NULL,
    FOREIGN KEY (Specialite) REFERENCES Specialite(Specialite),
    date_debut VARCHAR(50) NOT NULL,
    date_fin VARCHAR(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE Admin
(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL, 
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(254) NOT NULL UNIQUE,
    password CHAR(60) NOT NULL,
    date_creation VARCHAR(50) NOT NULL

)ENGINE=InnoDB DEFAULT CHARSET=utf8;



insert into  Admin (nom, prenom, email, password, date_creation)
values
('John','Doe', 'JohnDoe@gmail.com','$2y$10$qW5O02qav3PkTkErlWUFtuJvBygOyMdtViIRPIcs0wCqFDlzrb6yi','23/10/2021');



insert into Statut (statut)
values
('En préparation'),
('En cours'),
('Terminé'),
('Échec');

insert into Pays(nationalite)
values
('Afghanistan'),
('Albanie'),
('Antarctique'),
('Algérie'),
('Samoa Américaines'),
('Andorre'),
('Angola'),
('Antigua-et-Barbuda'),
('Azerbaïdjan'),
('Argentine'),
('Australie'),
('Autriche'),
('Bahamas'),
('Bahreïn'),
('Bangladesh'),
('Arménie'),
('Barbade'),
('Belgique'),
('Bermudes'),
('Bhoutan'),
('Bolivie'),
('Bosnie-Herzégovine'),
('Botswana'),
('Île Bouvet'),
('Brésil'),
('Belize'),
('Territoire Britannique de l\'Océan Indien'),
('Îles Salomon'),
('Îles Vierges Britanniques'),
('Brunéi Darussalam'),
('Bulgarie'),
('Myanmar'),
('Burundi'),
('Bélarus'),
('Cambodge'),
('Cameroun'),
('Canada'),
('Cap-vert'),
('Îles Caïmanes'),
('République Centrafricaine'),
('Sri Lanka'),
('Tchad'),
('Chili'),
('Chine'),
('Taïwan'),
('Île Christmas'),
('Îles Cocos (Keeling)'),
('Colombie'),
('Comores'),
('Mayotte'),
('République du Congo'),
('République Démocratique du Congo'),
('Îles Cook'),
('Costa Rica'),
('Croatie'),
('Cuba'),
('Chypre'),
('République Tchèque'),
('Bénin'),
('Danemark'),
('Dominique'),
('République Dominicaine'),
('Équateur'),
('El Salvador'),
('Guinée Équatoriale'),
('Éthiopie'),
('Érythrée'),
('Estonie'),
('Îles Féroé'),
('Îles (malvinas) Falkland'),
('Géorgie du Sud et les Îles Sandwich du Sud'),
('Fidji'),
('Finlande'),
('Îles Åland'),
('France'),
('Guyane Française'),
('Polynésie Française'),
('Terres Australes Françaises'),
('Djibouti'),
('Gabon'),
('Géorgie'),
('Gambie'),
('Territoire Palestinien Occupé'),
('Allemagne'),
('Ghana'),
('Gibraltar'),
('Kiribati'),
('Grèce'),
('Groenland'),
('Grenade'),
('Guadeloupe'),
('Guam'),
('Guatemala'),
('Guinée'),
('Guyana'),
('Haïti'),
('Îles Heard et Mcdonald'),
('Saint-Siège (état de la Cité du Vatican)'),
('Honduras'),
('Hong-Kong'),
('Hongrie'),
('Islande'),
('Inde'),
('Indonésie'),
('République Islamique d\'Iran'),
('Iraq'),
('Irlande'),
('Israël'),
('Italie'),
('Côte d\'Ivoire'),
('Jamaïque'),
('Japon'),
('Kazakhstan'),
('Jordanie'),
('Kenya'),
('République Populaire Démocratique de Corée'),
('République de Corée'),
('Koweït'),
('Kirghizistan'),
('République Démocratique Populaire Lao'),
('Liban'),
('Lesotho'),
('Lettonie'),
('Libéria'),
('Jamahiriya Arabe Libyenne'),
('Liechtenstein'),
('Lituanie'),
('Luxembourg'),
('Macao'),
('Madagascar'),
('Malawi'),
('Malaisie'),
('Maldives'),
('Mali'),
('Malte'),
('Martinique'),
('Mauritanie'),
('Maurice'),
('Mexique'),
('Monaco'),
('Mongolie'),
('République de Moldova'),
('Montserrat'),
('Maroc'),
('Mozambique'),
('Oman'),
('Namibie'),
('Nauru'),
('Népal'),
('Pays-Bas'),
('Antilles Néerlandaises'),
('Aruba'),
('Nouvelle-Calédonie'),
('Vanuatu'),
('Nouvelle-Zélande'),
('Nicaragua'),
('Niger'),
('Nigéria'),
('Niué'),
('Île Norfolk'),
('Norvège'),
('Îles Mariannes du Nord'),
('Îles Mineures Éloignées des États-Unis'),
('États Fédérés de Micronésie'),
('Îles Marshall'),
('Palaos'),
('Pakistan'),
('Panama'),
('Papouasie-Nouvelle-Guinée'),
('Paraguay'),
('Pérou'),
('Philippines'),
('Pitcairn'),
('Pologne'),
('Portugal'),
('Guinée-Bissau'),
('Timor-Leste'),
('Porto Rico'),
('Qatar'),
('Réunion'),
('Roumanie'),
('Fédération de Russie'),
('Rwanda'),
('Sainte-Hélène'),
('Saint-Kitts-et-Nevis'),
('Anguilla'),
('Sainte-Lucie'),
('Saint-Pierre-et-Miquelon'),
('Saint-Vincent-et-les Grenadines'),
('Saint-Marin'),
('Sao Tomé-et-Principe'),
('Arabie Saoudite'),
('Sénégal'),
('Seychelles'),
('Sierra Leone'),
('Singapour'),
('Slovaquie'),
('Viet Nam'),
('Slovénie'),
('Somalie'),
('Afrique du Sud'),
('Zimbabwe'),
('Espagne'),
('Sahara Occidental'),
('Soudan'),
('Suriname'),
('Svalbard etÎle Jan Mayen'),
('Swaziland'),
('Suède'),
('Suisse'),
('République Arabe Syrienne'),
('Tadjikistan'),
('Thaïlande'),
('Togo'),
('Tokelau'),
('Tonga'),
('Trinité-et-Tobago'),
('Émirats Arabes Unis'),
('Tunisie'),
('Turquie'),
('Turkménistan'),
('Îles Turks et Caïques'),
('Tuvalu'),
('Ouganda'),
('Ukraine'),
('L\'ex-République Yougoslave de Macédoine'),
('Égypte'),
('Royaume-Uni'),
('Île de Man'),
('République-Unie de Tanzanie'),
('États-Unis'),
('Îles Vierges des États-Unis'),
('Burkina Faso'),
('Uruguay'),
('Ouzbékistan'),
('Venezuela'),
('Wallis et Futuna'),
('Samoa'),
('Yémen'),
('Serbie-et-Monténégro'),
('Zambie');

