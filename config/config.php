<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'yelts20');
define('DB_NAME', 'banco_preguntas');

function getDB() {
    $dbConnection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($dbConnection->connect_error) {
        die("Connection failed: " . $dbConnection->connect_error);
    }
    return $dbConnection;
}
?>