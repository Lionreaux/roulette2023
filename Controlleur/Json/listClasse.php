<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/listerClasse.php");

$liste = listerClasse();

if ($liste){
    $jsonListe = json_encode($liste, JSON_UNESCAPED_UNICODE);
    error_log($jsonListe);
    echo $jsonListe;
}else{
    echo "null";
    exit();
}
