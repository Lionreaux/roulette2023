<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");

$conn = generateMysqliConnexion();

$nom = $_GET["nom"];
$classe = $_GET["classe"];

$stmt = $conn->prepare("SELECT id FROM Classes WHERE nom = ?");
$stmt->bind_param("s", $classe);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    $stmt->bind_result($idClasse);
    $stmt->fetch();

    $stmt = $conn->prepare("INSERT INTO etudiants (nom, classe) VALUES (?, ?)");
    $stmt->bind_param("si", $nom,$idClasse);
    $stmt->execute();
    $affected_rows = $stmt->affected_rows;
    if ($affected_rows > 0) {
        echo "Etudiant ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'étudiant.";
    }
} else {
    echo "Classe non trouvée.";
}
