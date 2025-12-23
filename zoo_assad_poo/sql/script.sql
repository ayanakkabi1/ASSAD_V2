CREATE DATABASE ASSAD2
USE  ASSAD2;

CREATE TABLE habitats (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL, 
    typeclimat VARCHAR(100) NOT NULL,
    pdescription VARCHAR(500) NOT NULL, 
    zonezoo VARCHAR(100) NOT NULL
);

CREATE TABLE Animaux ( 
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL, 
    espèce VARCHAR(100) NOT NULL,
    alimentation VARCHAR(100) NOT NULL,
    image VARCHAR(1000) NOT NULL,
    paysorigine VARCHAR(100) NOT NULL,
    descriptioncourte VARCHAR(1000) NOT NULL, 
    id_habitat INT,
    FOREIGN KEY (id_habitat) REFERENCES habitats(id)
);

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nom VARCHAR(300) NOT NULL,
    email VARCHAR(300) NOT NULL UNIQUE,
    rôle VARCHAR(100) NOT NULL,
    motpasse_hash VARCHAR(255) NOT NULL
);

CREATE TABLE Visitesguidees (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    titre VARCHAR(100) NOT NULL,
    dateheure DATETIME NOT NULL,
    langue VARCHAR(50) NOT NULL,
    capacite_max INT,
    statut VARCHAR(50) DEFAULT 'OFFLINE',
    duree INT,
    prix FLOAT CHECK(prix > 0),
    id_guide INT,
    FOREIGN KEY(id_guide) REFERENCES utilisateurs(id)
);

CREATE TABLE etapesvisite (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titreetape VARCHAR(200) NOT NULL,
    descriptionetape TEXT, 
    ordreetape INT,
    id_visite INT,
    FOREIGN KEY (id_visite) REFERENCES Visitesguidees(id)
);

CREATE TABLE reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idvisite INT, 
    idutilisateur INT, 
    nbpersonnes INT NOT NULL CHECK(nbpersonnes > 0), 
    datereservation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (idvisite) REFERENCES Visitesguidees(id),
    FOREIGN KEY (idutilisateur) REFERENCES utilisateurs(id)
);

INSERT INTO utilisateurs (nom, email, rôle, motpasse_hash) 
VALUES 
('Super Admin', 'superadmin@zoo.com', 'admin', 'bcrypt_hash_here');