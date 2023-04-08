<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT']."/Modele/connexionDB.php");
include_once pathForOs($_SERVER['DOCUMENT_ROOT']."/Modele/LoginBDD.php");


$username = $_POST["username"];
$password = $_POST["password"];
error_log("LALALA");
    if (tryLogin($username, $password)){
        error_log("redirection");
        echo "/index.html";
    }else{
        echo "/";
        error_log("Erreur : nom d'utilisateur ou mot de passe incorrect.");
    }
