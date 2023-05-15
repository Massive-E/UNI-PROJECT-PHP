<?php

$host = "localhost";
$username = "username"; // enter your database username
$password = "password"; // enter database password
$database = "UserLoginDB";

$connection = new mysqli($host, $username, $password, $database);

$query = "CREATE TABLE IF NOT EXISTS Users (username varchar(30) NOT NULL,password varchar(30),team varchar(30),status varchar(45) ,PRIMARY KEY(username))";
$connection->query($query);

if (isset($connection->error)) echo "$connection->error";


if ($_GET['S'] === "true") {

    $username = $_GET['userName'];
    $color = $_GET['color'];
    $message= $_GET['message'];

        echo "$username $color $message";

    $query = "INSERT INTO `Chat` (`username`, `color`, `message`) VALUES ('$username','$color','$message')";
    $result = $connection->query($query);


}


