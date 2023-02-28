<?php
include_once "php/recupClasse.php";


$classe = getClasse();

if ($classe){
    $jsonClasse = json_encode($classe, JSON_UNESCAPED_UNICODE);
    error_log($jsonClasse);
    echo $jsonClasse;
}else{
    echo "null";
    exit();
}