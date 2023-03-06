<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");

function getEtudiants(){
    error_log("boubou");
    $conn = generateMysqliConnexion();
    $idClasse = $_GET['idClasse'];
    error_log("boubou");
    error_log($idClasse);
    $stmt = $conn->prepare("SELECT E.nom FROM Etudiants E WHERE E.classe=?;");
    $stmt->bind_param("i", $idClasse);
    $stmt->execute();
    $result = storeResultInArray($stmt);
    if ($result){
        return $result;
    }else{
        return null;
    }
}