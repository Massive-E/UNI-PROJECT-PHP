<?php

$host =  "localhost";
$username = "username"; // enter your database username
$password = "password"; // enter database password
$database = "UserLoginDB";


$connection = new mysqli($host,$username,$password,$database);

$query = "CREATE TABLE IF NOT EXISTS Users (username varchar(30) NOT NULL,password varchar(30),team varchar(30),status varchar(45) ,PRIMARY KEY(username))";

$connection->query($query);

if(isset($connection->error)) echo "$connection->error";


if ($_GET['send']==="true"){
    $name="";
    $color="";
    $text="";


    $sql = "SELECT username, color, message FROM Chat";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<a style='background-color:" . $row['color'] . "'>" . $row['username'] . "</a><a>" . $row["message"] . "<br>";
        }
    }
}

if ($_GET['get']==="true"){
    $name="";
    $color="";
    $text="";

}
