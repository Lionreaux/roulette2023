<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");
error_log("ehho");

function statutEtudiant($statut,$nom,$note,$classe)
{
    $conn = generateMysqliConnexion();

    $stmt = $conn->prepare("SELECT id FROM classes WHERE nom = ?");
    $stmt->bind_param("s", $classe);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($idClasse);
        $stmt->fetch();
    }


    try {
        error_log($nom);
        $stmt = $conn->prepare("UPDATE Etudiants SET statut = ?, note = ? WHERE nom = ? AND classe = ?;");
        $stmt->bind_param('sisi', $statut ,$note, $nom, $idClasse);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}