<?php

include_once pathForOs($_SERVER['DOCUMENT_ROOT']."/Controlleur/static.php");


if ($_SERVER['REQUEST_URI'] == "/") {
    returnHtmlFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/Vue/auth.html"));
}elseif ($_SERVER['REQUEST_URI'] == "/style.css"){
    returnCssFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/Vue/style.css"));
}elseif ($_SERVER['REQUEST_URI'] == "/script.js"){
    returnJsFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/Vue/script.js"));
}elseif ($_SERVER['REQUEST_URI'] == "/index.html"){
    returnHtmlFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/Vue/index.html"));
}elseif ($_SERVER['REQUEST_URI'] == "/gestion.js"){
    returnJsFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/Vue/gestion.js"));
}elseif ($_SERVER['REQUEST_URI'] == "/gestion.html"){
    returnHtmlFile(pathForOs($_SERVER['DOCUMENT_ROOT']."/Vue/gestion.html"));
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
    elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/listClasse")) {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/listClasse.php");
    } elseif ($_SERVER['REQUEST_URI'] == "/Modele/listerClasse") {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/listerClasse.php");
    }
    elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/rezClasse")) {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/rezClasse.php");
    } elseif ($_SERVER['REQUEST_URI'] == "/Modele/rezClasse") {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/rezClasse.php");
    }
        elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/changeEtudiant")) {
            include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/changeEtudiant.php");
        } elseif ($_SERVER['REQUEST_URI'] == "/Modele/statutEtudiant") {
            include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/statutEtudiant.php");
        }
    elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Login")) {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Login.php");
    } elseif ($_SERVER['REQUEST_URI'] == "/Modele/LoginBDD") {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/LoginBDD.php");
    }elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/getSession")) {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/getSession.php");
    }
    elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/getAbsent")) {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/getAbsent.php");
    } elseif ($_SERVER['REQUEST_URI'] == "/Modele/recupAbsent") {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/recupAbsent.php");
    }
    elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/insertEtud")) {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/insertEtud.php");
    }elseif ($_SERVER['REQUEST_URI'] == "/Modele/insertEtudiant") {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/insertEtudiant.php");
    }
    elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/addClasse")) {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/addClasse.php");
    }elseif ($_SERVER['REQUEST_URI'] == "/Modele/ajoutClasse") {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/ajoutClasse.php");
    }
    elseif (str_starts_with($_SERVER['REQUEST_URI'], "/Controlleur/Json/finCours")) {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Controlleur/Json/finCours.php");
    }elseif ($_SERVER['REQUEST_URI'] == "/Modele/finirCours") {
        include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/Modele/finirCours.php");
    }
} else {
    error_log($_SERVER['REQUEST_URI']);
        http_response_code(404);
        exit();

}
