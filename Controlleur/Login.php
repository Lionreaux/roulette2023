<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT']."/Modele/connexion.php");
include_once pathForOs($_SERVER['DOCUMENT_ROOT']."/Modele/LoginBDD.php");

session_start();

$username = $_POST["username"];
$password = $_POST["password"];
error_log("LALALA");
if (tryLogin($username, $password)){
    error_log("c'est bien bon");
    // si le login est réussi, stocker le nom d'utilisateur dans la session
    $_SESSION["username"] = $username;

    // rediriger vers la page d'index
    error_log("avant index");
    echo("/index.html");
    exit(); // arrêter l'exécution du script après la redirection
}else{
    error_log("C'est pas bon");
    // si le login échoue, rediriger vers la page d'accueil
    header("Location: /");
    exit();
}
