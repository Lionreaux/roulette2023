DROP DATABASE IF EXISTS Roulette;
CREATE DATABASE Roulette;

USE Roulette;

CREATE TABLE Profs (
  id_prof int auto_increment NOT NULL,
  nom varchar(255),
  mdp varchar(255),
  PRIMARY KEY (id_prof)
);

CREATE TABLE Classes (
  id int auto_increment NOT NULL ,
  nom varchar(255),
  responsable int,
  PRIMARY KEY (id),
  FOREIGN KEY (responsable) REFERENCES Profs(id_prof) ON DELETE CASCADE
);

CREATE TABLE Etudiants (
  id int auto_increment NOT NULL ,
  nom varchar(255),
  classe int ,
  statut VARCHAR(255) ,
  note int ,
  PRIMARY KEY (id),
  FOREIGN KEY (classe) REFERENCES Classes(id) ON DELETE CASCADE
);

#Requetes d'insertions des étudiants :
INSERT INTO Profs (nom,mdp) VALUES ('Benjamin','123'),('Benoit','456'),('Stephane','789');

INSERT INTO Classes (nom,responsable) VALUES ('ClasseA','1'),('ClasseB','2');

INSERT INTO Etudiants (nom, classe) VALUES
('Élève 1A', 1),
('Élève 2A', 1),
('Élève 3A', 1),
('Élève 4A', 1),
('Élève 5A', 1),
('Élève 6A', 1),
('Élève 7A', 1),
('Élève 8A', 1),
('Élève 9A', 1),
('Élève 10A', 1);

INSERT INTO Etudiants (nom, classe) VALUES
('Élève 1B', 2 ),
('Élève 2B', 2 ),
('Élève 3B', 2 ),
('Élève 4B', 2 ),
('Élève 5B', 2 ),
('Élève 6B', 2 ),
('Élève 7B', 2 ),
('Élève 8B', 2 ),
('Élève 9B', 2 ),
('Élève 10B', 2);


