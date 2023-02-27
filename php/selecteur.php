<?php

include_once pathForOs($_SERVER['DOCUMENT_ROOT']."/php/static.php");


if ($_SERVER['REQUEST_URI'] == "/") {
    returnHtmlFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/site/index.html"));
}elseif ($_SERVER['REQUEST_URI'] == "/style.css"){
    returnCssFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/site/style.css"));
}elseif ($_SERVER['REQUEST_URI'] == "/script.js"){
    returnJsFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/site/script.js"));}




elseif (str_starts_with($_SERVER['REQUEST_URI'], "/php/")) {
    if ($_SERVER['REQUEST_URI'] == "/php/getEtudiant") {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/php/getEtudiant.php");
    } elseif ($_SERVER['REQUEST_URI'] == "/php/recupEtudiant") {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/php/recupEtudiant.php");
    } else {
        http_response_code(404);
        exit();
    }
}