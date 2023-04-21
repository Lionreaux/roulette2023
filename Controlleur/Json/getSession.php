<?php
session_start();
$data = array('username' => $_SESSION['username']);
error_log(implode($data));
echo json_encode($data);
?>
