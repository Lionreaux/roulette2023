<?php
function pathForOs($path){
    if (PHP_OS_FAMILY == "Windows"){
        return str_replace("/", "\\", $path);
    }elseif (PHP_OS_FAMILY == "Linux"){
        $path = str_replace("\\", "/", $path);
        return str_replace("//", "/", $path);
    }
}


include_once (pathForOs($_SERVER['DOCUMENT_ROOT']."/Controlleur/selecteur.php"));