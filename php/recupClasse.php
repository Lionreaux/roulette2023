<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/php/connexion.php");

function getClasse(){
    $conn = generateMysqliConnexion();
    $nom = $_GET['classe'];
    $stmt = $conn->prepare("SELECT C.id FROM Classes C WHERE C.nom = ?;");
    $stmt->bind_param("s", $nom);
    $stmt->execute();
    $result = storeResultInArray($stmt);
    if ($result){
        error_log($result);
        return $result;
    }else{
        return null;
    }
}