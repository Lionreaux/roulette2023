#requete pour tout les étudiants de la classe x :
SELECT E.nom FROM Etudiants E WHERE E.classe=1;

#requete pour obtenir toutes les classes :
SELECT C.nom FROM Classes C;





#Requetes d'insertions des étudiants :
INSERT INTO Classes (nom) VALUES ('Classe A'),('Classe B');

INSERT INTO Etudiants (nom, classe, statut) VALUES
('Élève 1A', 1 ,0),
('Élève 2A', 1 ,0),
('Élève 3A', 1 ,0),
('Élève 4A', 1 ,0),
('Élève 5A', 1 ,0),
('Élève 6A', 1 ,0),
('Élève 7A', 1 ,0),
('Élève 8A', 1 ,0),
('Élève 9A', 1 ,0),
('Élève 10A', 1 ,0);

INSERT INTO Etudiants (nom, classe, statut) VALUES
('Élève 1B', 2 ,0),
('Élève 2B', 2 ,0),
('Élève 3B', 2 ,0),
('Élève 4B', 2 ,0),
('Élève 5B', 2 ,0),
('Élève 6B', 2 ,0),
('Élève 7B', 2 ,0),
('Élève 8B', 2 ,0),
('Élève 9B', 2 ,0),
('Élève 10B', 2 ,0);
