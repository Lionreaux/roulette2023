<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT']."/Modele/connexionDB.php");
include_once pathForOs($_SERVER['DOCUMENT_ROOT']."/Modele/LoginBDD.php");


$username = $_POST["username"];
$password = $_POST["password"];
    if (tryLogin($username, $password)){
        echo "/Vue/index.html";
    }else{
        echo "err_bad_log";
    }
