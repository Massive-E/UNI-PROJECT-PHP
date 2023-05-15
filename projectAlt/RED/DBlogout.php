<?php

$host = "localhost";
$username = "username"; // enter your database username
$password = "password"; // enter database password
$database = "UserLoginDB";


$connection = new mysqli($host, $username, $password, $database);

$query = "CREATE TABLE IF NOT EXISTS Users (username varchar(30) NOT NULL,password varchar(30),team varchar(30),status varchar(45) ,PRIMARY KEY(username))";
$connection->query($query);

if (isset($connection->error)) echo "$connection->error";


// logout

if ($_GET['LOGOUT'] === "true") {
    $username = $_GET['userName'];

    $response = new stdClass;
    $response->code = null;

    // making player offline
    $query = "UPDATE Users SET status='OFFLINE' where username=" . "'" . $username . "'";
    $connection->query($query);

    $response->code = true;

    session_destroy();

    echo json_encode($response);
}


