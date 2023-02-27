CREATE TABLE IF NOT EXISTS Classes (
  id int auto_increment,
  nom varchar(255),
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS Etudiants (
  id int auto_increment,
  nom varchar(255),
  classe int ,
  PRIMARY KEY (id),
  FOREIGN KEY (classe) REFERENCES Classes(id) ON DELETE CASCADE
);

