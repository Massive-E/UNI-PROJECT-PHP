<?php
require_once ('playerClass.php');

session_start();

$host = "localhost";
$username = "username"; // enter your database username
$password = "password"; // enter database password
$database = "UserLoginDB";


$connection = new mysqli($host, $username, $password, $database);

$query = "CREATE TABLE IF NOT EXISTS Users (username varchar(30) NOT NULL,password varchar(30),team varchar(30),status varchar(45) ,PRIMARY KEY(username))";

$connection->query($query);

if (isset($connection->error)) echo "$connection->error";



if ($_GET['LOGIN'] === "true") {

    $response = new stdClass;


    $username=$_GET['userName']; $password=$_GET['password'];


        $response = new stdClass;

        $query = " SELECT * FROM Users WHERE username =" . "'" . $username . "'";
        $result = $connection->query($query);
        $team= $connection->query($query)->fetch_array()['team'];
        $response->team = $team;

        if ($result->num_rows > 0 and $connection->query($query)->fetch_array()['password'] === $password) {

            $query= "UPDATE Users SET status='ONLINE' where username=". "'". $username."'";
            $connection->query($query);

            $response->code = true;

            $Player = new playerClass();
            $Player->setPlayer($username, "", $team);
            $_SESSION['player']= serialize($Player);

        } else {

            $response->code = false;
            $response->team = null;

        }

    echo json_encode($response);

}

else if ($_GET['LOGOUT'] === "true") {
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


