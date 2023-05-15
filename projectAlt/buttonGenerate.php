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
    $name= $_GET['userName'];

$sql = "UPDATE Users SET position=". "'". $index ."'WHERE username=". "'". $name ."'";
$result = $connection->query($sql);

    $sql = "SELECT position, red, yellow, green, latest FROM Board WHERE position='".$index."'";
    $result = $connection->query($sql);

//     output data of each row
    $row = $result->fetch_assoc();
        $r=$row['red'];
        $g=$row['green'];
        $y=$row['yellow'];
        $latest=$row['latest'];

//        echo " red $r yellow $y green $y";
if ($r==0 and $g==0 and $y==0){
        echo "blue";
}


if ($color==="red"){
    $r++;
    $sql = "UPDATE Board SET red=" . "'". $r ."'" .", latest='red' WHERE position='".$index."'";
    $result = $connection->query($sql);
}
if ($color==="green"){
    $g++;
    $sql = "UPDATE Board SET green=" . "'". $g ."'" .", latest='green' WHERE position='".$index."'";
    $result = $connection->query($sql);
}

if ($color==="yellow"){
    $y++;
    $sql = "UPDATE Board SET yellow=" . "'". $y ."'" .", latest='yellow' WHERE position='".$index."'";
    $result = $connection->query($sql);
}


// add player position update

    if ($r>$g and $r>$y){
        $sql = "UPDATE Board SET owner='red' WHERE position='".$index."'";
        $result = $connection->query($sql);
        echo "red";
    }

else if ($r>$g and $r==$y and $latest=='red'){
    $sql = "UPDATE Board SET owner='red' WHERE position='".$index."'";
    $result = $connection->query($sql);
    echo "red";
}

else if ($r==$g and $r>$y and $latest=='red'){
    $sql = "UPDATE Board SET owner='red' WHERE position='".$index."'";
    $result = $connection->query($sql);
    echo "red";
}

else if ($g>$r && $g>$y){
        $sql = "UPDATE Board SET owner='green' WHERE position='".$index."'";
        $result = $connection->query($sql);
        echo "green";
}

else if ($g>$r and $g==$y and $latest=='green'){
    $sql = "UPDATE Board SET owner='red' WHERE position='".$index."'";
    $result = $connection->query($sql);
    echo "red";
}

else if ($g==$r and $g>$y and $latest=='green'){
    $sql = "UPDATE Board SET owner='red' WHERE position='".$index."'";
    $result = $connection->query($sql);
    echo "red";
}

else if ($y>$g && $y>$r){
        $sql = "UPDATE Board SET owner='yellow' WHERE position='".$index."'";
        $result = $connection->query($sql);
        echo "yellow";
}

else if ($y>$g and $y==$r and $latest=='yellow'){
        $sql = "UPDATE Board SET owner='yellow' WHERE position='".$index."'";
        $result = $connection->query($sql);
        echo "yellow";
}

else if ($y==$g and $y>$r and $latest=='yellow'){
    $sql = "UPDATE Board SET owner='yellow' WHERE position='".$index."'";
    $result = $connection->query($sql);
    echo "yellow";
}

//
//


