-- source /home/johan/Documents/ROJO/DB/modele.sql

DROP DATABASE echange;
CREATE DATABASE echange;
USE echange;


CREATE TABLE Utilisateur(
    idU INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(40),
    prenom VARCHAR(40),
    email VARCHAR(40),
    mdp VARCHAR(40)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE SuperUtilisateur(
    idSu INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(40),
    prennom VARCHAR(40),
    email VARCHAR(40),
    mdp VARCHAR(40)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE Categorie(
    idC INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(30)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Objet(
    idO INT PRIMARY KEY AUTO_INCREMENT,
    idC INT,
    description VARCHAR(1000),
    prix DECIMAL(11,2),
    FOREIGN KEY (idC) REFERENCES Categorie(idC)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Owners(
    idU INT,
    idO INT,
    FOREIGN KEY (idU) REFERENCES Utilisateur(idU),
    FOREIGN KEY (idO) REFERENCES Objet(idO)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Photo(
    idO INT,
    nom VARCHAR(50),
    FOREIGN KEY (idO) REFERENCES Objet(idO)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Proposition(
    idP INT PRIMARY KEY AUTO_INCREMENT,
    idE INT,
    idR INT, 
    idOe INT,
    idOr INT,
    FOREIGN KEY (idE) REFERENCES Utilisateur(idU),
    FOREIGN KEY (idR) REFERENCES Utilisateur(idU),
    FOREIGN KEY (idOe) REFERENCES Objet(idO),
    FOREIGN KEY (idOr) REFERENCES Objet(idO)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Accepter(
    idP INT,
    FOREIGN KEY (idP) REFERENCES Proposition(idP)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Refus(
    idP INT,
    FOREIGN KEY (idP) REFERENCES Proposition(idP)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

/* --------------------------- Change -------------------------------- */

ALTER TABLE Owners ADD daty DATE NOT NULL;
DELETE FROM Owners;

