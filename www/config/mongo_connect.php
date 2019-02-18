<?php
/**
 * Created by PhpStorm.
 * User: Aleksandrs Tarasovs
 * Date: 2/7/2019
 * Time: 19:47
 */

    $username = "restheart";
    $password = "R3ste4rt!";
    $connection = new MongoClient( "mongodb://35.246.75.105:27017", array("username" => $username, "password" => $password));

    $videosCollection = $connection->selectCollection('myflix', 'videos');
    $categoriesCollection = $connection->selectCollection('myflix', 'categories');
?>
