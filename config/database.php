<?php
/**
 * Created by PhpStorm.
 * User: ngochoangmai
 * Date: 2/1/20
 * Time: 2:17 PM
 */
function checkConnect(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_todolistproject";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
