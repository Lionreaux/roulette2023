<?php

include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexionClass.php");

function listerClasse(){
    $db = new BDDConnection();
    $conn = $db->getConn();
    $nom = $_GET['utilisateur'];
    $stmt = $conn->prepare("SELECT C.id,C.nom FROM Classes C,Profs P WHERE C.responsable = P.id_prof AND P.nom = ?");
    $stmt->bind_param("s", $nom);
    $stmt->execute();
    $result = new RequeteResult($stmt);
    $data = $result->storeResultInArray();
    if ($data){
        return $data;
    }else{
        return null;
    }
}
