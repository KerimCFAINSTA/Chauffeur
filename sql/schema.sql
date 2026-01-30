CREATE DATABASE IF NOT EXISTS vtc_reservation;
USE vtc_reservation;

CREATE TABLE client (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    prenom VARCHAR(100),
    email VARCHAR(100),
    telephone VARCHAR(15)
);

CREATE TABLE vehicule (
    id INT PRIMARY KEY AUTO_INCREMENT,
    marque VARCHAR(100),
    modele VARCHAR(100),
    type VARCHAR(50),
    chauffeur VARCHAR(100),
    disponible BOOLEAN DEFAULT TRUE
);

CREATE TABLE reservation (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT,
    id_vehicule INT,
    date_heure DATETIME,
    statut VARCHAR(50) DEFAULT 'en attente',
    FOREIGN KEY (id_client) REFERENCES client(id),
    FOREIGN KEY (id_vehicule) REFERENCES vehicule(id)
);