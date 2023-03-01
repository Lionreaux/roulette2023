<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/php/connexion.php");
error_log("ehho");

function statutEtudiant($statut,$nom,$note)
{
    try {
        error_log($nom);
        $conn = generateMysqliConnexion();
        $stmt = $conn->prepare("UPDATE Etudiants SET statut = ?, note = ? WHERE nom = ?;");
        $stmt->bind_param('sis', $statut ,$note, $nom);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}