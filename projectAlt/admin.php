<?php
$host = "localhost";
$username = "username"; // enter your database username
$password = "password"; // enter database password
$database = "UserLoginDB";


$connection = new mysqli($host, $username, $password, $database);

if ($_GET['clear']==='board'){

    for ($x=0; $x<100; $x++){
        $sql = "UPDATE Board SET red='0', green='0', yellow='0', owner='none' WHERE position='".$x."'";
        $result = $connection->query($sql);
    }

    echo "all positions cleared";
}

if ($_GET['clear']==='players'){
    $sql = "TRUNCATE TABLE Users";
    $result = $connection->query($sql);
    echo "all players cleared";

}
if ($_GET['clear']==='message'){
    $sql = "TRUNCATE TABLE Chat";
    $result = $connection->query($sql);
    echo "all messages cleared";

}