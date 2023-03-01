<?php
include_once pathForOs($_SERVER['DOCUMENT_ROOT'] . "/php/recupAbsent.php");


$absent = getAbsent($_POST["idClasse"],$_POST["Statut"]);
error_log("JE PASSE LA");
if ($absent){
    $jsonAbsent = json_encode($absent, JSON_UNESCAPED_UNICODE);
    error_log($jsonAbsent);
    echo $jsonAbsent;
}else{
    echo "null";
    exit();
}