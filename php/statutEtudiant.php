<?php
include_once "php/connexion.php";
error_log("ehho");

function statutEtudiant($statut,$nom)
{
    try {
        error_log($nom);
        $conn = generateMysqliConnexion();
        $stmt = $conn->prepare("UPDATE Etudiants SET statut = ? WHERE nom = ?;");
        $stmt->bind_param('ss', $statut , $nom);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        error_log($e->getMessage());
        return false;
    }
}