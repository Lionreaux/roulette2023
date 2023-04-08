<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");


function checkLogin() {
        $conn = generateMysqliConnexion();
        $stmt = $conn->prepare("SELECT nom FROM Profs WHERE nom = ? AND mdp = ?");
        $stmt->bind_param('ss', $userName, $password);
        $stmt->execute();
        $result = storeResultInArray($stmt);
        if ($result){
            return true;
            error_log("Etape1")
        }else{
            return false;
            error_log("Etape2")
        }
}

function tryLogin($userName, $password){
    if (checkLogin()){
        return true;
    } else {
        return false;
    }
}