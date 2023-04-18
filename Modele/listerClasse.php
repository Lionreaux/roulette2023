<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");

function listerClasse(){
    $conn = generateMysqliConnexion();
    $nom = $_GET['utilisateur'];
    $stmt = $conn->prepare("SELECT C.id,C.nom FROM Classes C,Profs P WHERE C.responsable = P.id_prof AND P.nom = ?;
");
    $stmt->bind_param("s", $nom);
    $stmt->execute();
    $result = storeResultInArray($stmt);
    if ($result){
        return $result;
    }else{
        return null;
    }
}