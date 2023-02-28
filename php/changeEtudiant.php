<?php
include_once "php/statutEtudiant.php";

$statut = statutEtudiant($_POST["Statut"],$_POST["nom"]);
error_log("ICIIIII");
if ($statut){
    $jsonStatut = json_encode($statut);
    echo $jsonStatut;
}else{
    echo "null";
    exit();
}