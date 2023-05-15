<?php
$host =  "localhost";
$username = "username"; // enter your database username
$password = "password"; // enter database password
$database = "UserLoginDB";

$connection = new mysqli($host,$username,$password,$database);

$query = "CREATE TABLE IF NOT EXISTS Users (username varchar(30) NOT NULL,password varchar(30),team varchar(30),status varchar(45) ,PRIMARY KEY(username))";
$connection->query($query);

if(isset($connection->error)) echo "$connection->error";


if ($_GET['R']==="true"){
    $username=$_GET['userName'];

    $response = new stdClass;
    $response->code = null;


    $query= "SELECT * FROM Chat";
    $result= $connection ->query($query);

    while($row = $result->fetch_assoc()) {
        $C=$row['color'];
        $M=$row['message'];
        $N=$row['username'];
        echo "<a style='background-color: $C'>$N :</a><a>$M</a><br>";

    }

//    // making player offline
//    $query= "SELECT * FROM Chat ";
//

}


