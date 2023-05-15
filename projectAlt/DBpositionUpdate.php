<?php
require_once ("playerClass.php");

session_start();



$host =  "localhost";
$username = "username"; // enter your database username
$password = "password"; // enter database password
$database = "UserLoginDB";


$connection = new mysqli($host,$username,$password,$database);

if(isset($connection->error)) echo "$connection->error";

$sql = "SELECT * FROM user WHERE username='$username'";

$result = mysqli_query($connection, $sql);
if (!$result) die($connection->error);


$row = mysqli_fetch_assoc($result);
$index = $row['position'];


// getting Board and updating



$sql = "SELECT * FROM Board";

$result = mysqli_query($connection, $sql);
if (!$result) die($connection->error);
$rows = mysqli_num_rows($result);


if ($rows == 0) {
    for ($i = 0; $i < 100; $i++) {
        $sql = "INSERT INTO Board (position, red, yellow, greeen, latest) VALUES ('$i', 0, 0, 0, '')";
        $result = mysqli_query($connection, $sql);
        if (!$result) die($connection->error);
    }
}



else {
    for ($i = 0; $i < $rows; $i++) {


        $player = new playerClass();

        $player = unserialize($_SESSION['player']);
        $TEAM = $player->userTeam;
        $NAME = $player->userName;

        // get red, green yellow counts pe section, print based off that
        $sql = "SELECT FROM Board WHERE position=$i";

        $result_user = mysqli_query($connection, $sql);
        if (!$result) die($connection->error);

        $row = mysqli_fetch_assoc($result_user);
        $red = $row['red'];
        $green = $row['green'];
        $yellow = $row['yellow'];


        $sql = "SELECT FROM Users WHERE username='$NAME'";

        $result_user = mysqli_query($connection, $sql);
        if (!$result) die($connection->error);

        $row = mysqli_fetch_assoc($result_user);
        $pos = $row['position'];  // used to place ship
    }
}
