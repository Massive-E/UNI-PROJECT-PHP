<?php
$host =  "localhost";
$username = "username"; // enter your database username
$password = "password"; // enter database password
$database = "UserLoginDB";


$connection = new mysqli($host,$username,$password,$database);

$query = "CREATE TABLE IF NOT EXISTS Users (username varchar(30) NOT NULL,password varchar(30),team varchar(30),status varchar(45) ,PRIMARY KEY(username))";

$connection->query($query);

if(isset($connection->error)) echo "$connection->error";


// updating board index and user position
$index=$_GET['index'];
$color=$_GET['color'];

$sql = "SELECT position, red, yellow, green FROM Board WHERE position='".$index."'";
$result = $connection->query($sql);

//     output data of each row
$row = $result->fetch_assoc();
$r=$row['red'];
$g=$row['green'];
$y=$row['yellow'];


//        echo " red $r yellow $y green $y";
if ($r==0 and $g==0 and $y==0){
    echo "blue";
}


if ($color==="red"){
    $r++;
    $sql = "UPDATE Board SET red=" . "'". $r ."'" ."WHERE position='".$index."'";
    $result = $connection->query($sql);
}
if ($color==="green"){
    $g++;
    $sql = "UPDATE Board SET green=" . "'". $g ."'" ."WHERE position='".$index."'";
    $result = $connection->query($sql);
}

if ($color==="yellow"){
    $y++;
    $sql = "UPDATE Board SET yellow=" . "'". $y ."'" ."WHERE position='".$index."'";
    $result = $connection->query($sql);
}




if ($r>=$g && $r>=$y){

    echo "red";
}

else if ($g>=$r && $g>=$y){
    echo "green";
}
else if ($y>=$g && $y>=$r){
    echo "yellow";
}




