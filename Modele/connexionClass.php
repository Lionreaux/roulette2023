<?php

require_once("config.php");

class BDDConnection {
    private $conn;

    public function __construct($user = DB_USER, $password = DB_PASSWORD, $db_name = DB_NAME, $host = DB_HOST) {
        try {
            $this->conn = new mysqli($host, $user, $password, $db_name);
            if ($this->conn->connect_error) {
                throw new Error("Connection failed: " . $this->conn->connect_error);
            }
            $this->conn->set_charset("utf8");
        } catch (Exception $e) {
            error_log($e->getMessage());
            errorPage();
        }
    }

    public function getConn() {
        return $this->conn;
    }
}

class RequeteResult {
    private $result;

    public function __construct($stmt) {
        $this->result = $stmt->get_result();
    }

    public function storeResultInArray() {
        $retour = array();
        if ($this->result->num_rows > 0) {
            while($row = $this->result->fetch_assoc()) {
                array_push($retour, $row);
            }
        }
        return $retour;
    }
}

$db = new BDDConnection();

$query = "SELECT * FROM Classes";
$stmt = $db->getConn()->prepare($query);
$stmt->execute();
$result = new RequeteResult($stmt);
$data = $result->storeResultInArray();

?>
