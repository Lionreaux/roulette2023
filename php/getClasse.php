<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/php/recupClasse.php");

error_log("testttttt");
$classe = getClasse();

if ($classe){
    $jsonClasse = json_encode($classe, JSON_UNESCAPED_UNICODE);
    error_log($jsonClasse);
    echo $jsonClasse;
}else{
    echo "null";
    exit();
}