<?php


include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");
$action = $_GET["action"];


if ($action == 1) {
    creerClasse();
} elseif ($action == 2) {
    supprimerClasse();
} else {
    echo "Action invalide !";
}

function creerClasse()
{
    $conn = generateMysqliConnexion();

    $nomClasse = $_GET["nomClasse"];
    $resp = $_GET["resp"];

// Récupération de l'id du professeur
    $stmt = $conn->prepare("SELECT id_prof FROM Profs WHERE nom = ?");
    $stmt->bind_param("s", $resp);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($idProf);
    $stmt->fetch();

// Insertion de la classe dans la base de données
    $stmt = $conn->prepare("INSERT INTO Classes (nom, responsable) VALUES (?, ?)");
    $stmt->bind_param("si", $nomClasse, $idProf);
    $stmt->execute();

    echo "La classe a été insérée avec succès !";

}
function supprimerClasse()
{

    $nomClasse = $_GET["nomClasse"];
    $conn = generateMysqliConnexion();

    // Suppression de la classe de la base de données
    $stmt = $conn->prepare("DELETE FROM Classes WHERE nom = ?");
    $stmt->bind_param("s", $nomClasse);
    $stmt->execute();

    echo "La classe a été supprimée avec succès !";
}
?>