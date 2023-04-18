<?php

include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/rezClasse.php");

error_log("testttttt");
$classe = rezClasse();

if ($classe) {
    $jsonClasse = json_encode($classe, JSON_UNESCAPED_UNICODE);
    error_log($jsonClasse);
    echo $jsonClasse;
} else {
    echo "null";
    exit();
}