<?php
/**
 * Created by PhpStorm.
 * User: Aleksandrs Tarasovs
 * Date: 1/28/2019
 * Time: 21:58
 */

session_start();

// Define database

$username = "root";
$password = "root";
$host = "35.246.119.180:3306";
$db = "myflix";

// Connecting database
try {
    $connect = new PDO("mysql:dbname=$db;host=$host", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = file_get_contents("data/init.sql");
//    $connect->exec($sql);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
?>