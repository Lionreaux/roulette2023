<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/recupEtudiant.php");


$etudiants = getEtudiants();

if ($etudiants){
    $jsonEtudiants = json_encode($etudiants, JSON_UNESCAPED_UNICODE);
    error_log("après traitement");
    error_log($jsonEtudiants);
    echo $jsonEtudiants;
}else{
    echo "null";
    exit();
}