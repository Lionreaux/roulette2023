<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/connexion.php");
error_log("ICI");

function checkLogin($userName, $password) {
    error_log("dans check");
        $conn = generateMysqliConnexion();
        $stmt = $conn->prepare("SELECT nom FROM Profs WHERE nom = ? AND mdp = ?");
        $stmt->bind_param('ss', $userName, $password);
        $stmt->execute();
        $result = storeResultInArray($stmt);
        error_log("testtt");
        if ($result){
            error_log("fin check");
            return true;
        }else{
            return false;
        }
}

function tryLogin($userName, $password){
    error_log("dansTRY");
    if (checkLogin($userName, $password)){
        error_log("check effectuer");
        return true;
    } else {
        error_log("check loupé");
        return false;
    }
}