#requete pour tout les étudiants de la classe x :
SELECT E.nom FROM Etudiants E WHERE E.classe=1;

#requete pour obtenir toutes les classes :
SELECT C.id, C.nom, C.responsable FROM Classes C;


CREATE USER 'userRoulette'@'localhost' IDENTIFIED BY '123456789';

GRANT ALL PRIVILEGES ON * . * TO 'userRoulette'@'localhost';






#Requetes d'insertions des étudiants :
INSERT INTO Classes (nom) VALUES ('ClasseA'),('ClasseB');

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

ALTER DATABASE Roulette CHARACTER SET utf8 COLLATE utf8_general_ci;

SELECT C.id FROM Classes C WHERE C.nom = "Classe A";

UPDATE Etudiants SET statut = "Absent" WHERE id = 3;

#Requete pour lié la classe a un enseignant
SELECT C.id FROM Classes C,Profs P WHERE C.responsable = P.id_prof AND P.nom = "Benoit";

#Requete pour reporter les status actuels aux statuts du dernier cours a la fin du cours.
SELECT E.statut FROM Etudiants E WHERE E.id = 8;

UPDATE Etudiants SET dernierCours = Etudiants.statut WHERE id = 8;
UPDATE Etudiants SET statut = "" WHERE id = 8;