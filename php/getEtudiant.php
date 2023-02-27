<?php
include_once php/recupEtudiant.php;

$etudiants = getAllEtudiants();


if ($etudiants){

    $jsonEtudiants = json_encode($etudiants);

    echo $jsonEtudiants;
}else{
    echo "null";
    exit();
}