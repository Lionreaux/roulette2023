<?php
require_once("config.php");

function generateMysqliConnexion($user = DB_USER, $password = DB_PASSWORD, $db_name = DB_NAME ,$host = DB_HOST){
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

function storeResultInArray($stmt){
    $result = $stmt->get_result();
    $retour = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($retour, $row);
        }
        return $retour;
    } else {
        return array();
    }
}