<?php

include_once pathForOs($_SERVER['DOCUMENT_ROOT']."/Controlleur/static.php");


if ($_SERVER['REQUEST_URI'] == "/") {
    returnHtmlFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/Vue/index.html"));
}elseif ($_SERVER['REQUEST_URI'] == "/style.css"){
    returnCssFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/Vue/style.css"));
}elseif ($_SERVER['REQUEST_URI'] == "/script.js"){
    returnJsFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/Vue/script.js"));
}elseif ($_SERVER['REQUEST_URI'] == "/auth.html"){
    returnHtmlFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/Vue/auth.html"));
    }elseif ($_SERVER['REQUEST_URI'] == "/auth.js"){
        returnJsFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/Vue/auth.js"));}





elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/")) {
    if (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/getEtudiant")) {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/getEtudiant.php");
    } elseif ($_SERVER['REQUEST_URI'] == "/Modele/recupEtudiant") {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/recupEtudiant.php");
    }
        elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/getClasse")) {
            include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/getClasse.php");
        } elseif ($_SERVER['REQUEST_URI'] == "/Modele/recupClasse") {
            include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/recupClasse.php");
        }
        elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/changeEtudiant")) {
            include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/changeEtudiant.php");
        } elseif ($_SERVER['REQUEST_URI'] == "/Modele/statutEtudiant") {
            include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/statutEtudiant .php");
        }
    elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/getAbsent")) {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/getAbsent.php");
    } elseif ($_SERVER['REQUEST_URI'] == "/Modele/recupAbsent") {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/recupAbsent .php");
    }
} else {
    error_log($_SERVER['REQUEST_URI']);
        http_response_code(404);
        exit();

}
