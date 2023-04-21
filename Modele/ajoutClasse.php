<?php


include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");

$conn = generateMysqliConnexion();

$nomClasse = $_GET["nomClasse"];
$resp = $_GET["resp"];

// Récupération de l'id du professeur
$stmt = $conn->prepare("SELECT id_prof FROM profs WHERE nom = ?");
$stmt->bind_param("s", $resp);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($idProf);
$stmt->fetch();

// Insertion de la classe dans la base de données
$stmt = $conn->prepare("INSERT INTO classes (nom, responsable) VALUES (?, ?)");
$stmt->bind_param("si", $nomClasse, $idProf);
$stmt->execute();

echo "La classe a été insérée avec succès !";

?>