<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");

function getAbsent($idClasse, $statut){
    $conn = generateMysqliConnexion();
    error_log($idClasse);
    error_log($statut);
    error_log("JE PASSE LA");

    $stmt = $conn->prepare("SELECT E.nom FROM Etudiants E WHERE E.classe=? AND E.statut=?;");
    $stmt->bind_param("is", $idClasse,$statut);
    $stmt->execute();
    $result = storeResultInArray($stmt);
    if ($result){
        return $result;
    }else{
        return null;
    }
}