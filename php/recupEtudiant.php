<?php
include_once php/connexion.php;

function getEtudiants(){
    $conn = generateMysqliConnexion();
    $stmt = $conn->prepare("SELECT E.nom FROM Etudiants E WHERE E.classe=1;");
    $stmt->execute();
    $result = storeResultInArray($stmt);
    if ($result){
        return $result;
    }else{
        return null;
    }
}