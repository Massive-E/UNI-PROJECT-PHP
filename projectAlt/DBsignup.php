<?php

$host =  "localhost";
$username = "username"; // enter your database username
$password = "password"; // enter database password
$database = "UserLoginDB";


$connection = new mysqli($host,$username,$password,$database);

$query = "CREATE TABLE IF NOT EXISTS Users (username varchar(30) NOT NULL,password varchar(30),team varchar(30),status varchar(45) ,PRIMARY KEY(username))";

$connection->query($query);

if(isset($connection->error)) echo "$connection->error";


if ($_GET['SIGNIN'] === "true" ){

    $response = new stdClass;

    $response->code = null;
    $response->team = null;


    $username= $_GET['userName'];
    $password= $_GET['password'];
    $team= $_GET['team'];

    $response = new stdClass;


    $query = " SELECT * FROM Users WHERE username ="."'".$username."'";
    $result = $connection->query($query);


    // ('jim', '1', 'red', 'OFFLINE', '0')

    if ($result->num_rows<=0) {
        $query = "INSERT INTO `Users` (`username`, `password`, `team`, `status`, `position`) VALUES ("."'".$username."','".$password."','".$team."',"."'ONLINE', '0')";
        $connection->query($query);
        $response->code = true;

    }

    else
    {
        $response->code = false;

    }

    echo json_encode($response);
}


