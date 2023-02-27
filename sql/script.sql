DROP DATABASE IF EXISTS Roulette;
CREATE DATABASE Roulette;

USE Roulette;

CREATE TABLE Classes (
  id int auto_increment NOT NULL ,
  nom varchar(255),
  PRIMARY KEY (id)
);

CREATE TABLE Etudiants (
  id int auto_increment NOT NULL ,
  nom varchar(255),
  classe int ,
  statut int ,
  PRIMARY KEY (id),
  FOREIGN KEY (classe) REFERENCES Classes(id) ON DELETE CASCADE
);


