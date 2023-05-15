<?php

$host = "localhost";
$username = "username"; // enter your database username
$password = "password"; // enter database password
$database = "UserLoginDB";


$connection = new mysqli($host, $username, $password, $database);


$index= $_GET['index'];


$query = " SELECT * FROM Users WHERE position =" . "'" . $index . "'";
$result = $connection->query($query);

$temp="contested by :<br>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $temp= $temp. $row['username']. "<br>";
    }

    echo $temp;
}

else {
    echo "players are elsewhere";
}