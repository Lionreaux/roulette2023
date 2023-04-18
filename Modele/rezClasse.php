<?php

include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");

function rezClasse()
{
    $conn = generateMysqliConnexion();
    $nom = $_GET['classe'];
    $stmt = $conn->prepare("UPDATE Etudiants SET note = NULL, statut = '';");
    $stmt->execute();
    $result = storeResultInArray($stmt);
    if ($result) {
        return $result;
    } else {
        return null;
    }
}