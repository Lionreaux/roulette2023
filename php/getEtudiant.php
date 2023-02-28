<?php
include_once "php/recupEtudiant.php";


$etudiants = getEtudiants();

if ($etudiants){
    $jsonEtudiants = json_encode($etudiants, JSON_UNESCAPED_UNICODE);
    error_log($jsonEtudiants);
    echo $jsonEtudiants;
}else{
    echo "null";
    exit();
}