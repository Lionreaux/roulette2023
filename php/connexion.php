<?php
function generateMysqliConnexion($user = "userRoulette", $password = "123456789", $db_name = "Roulette", $host = "localhost"){
    try {
        $conn = new mysqli($host, $user, $password, $db_name);
        if ($conn->connect_error) {throw new Error("Connection failed: " . $conn->connect_error);}
        $conn -> set_charset("utf8");
        return $conn;
    } catch (Exception $e) {
        error_log($e->getMessage());
        errorPage();
    }
}