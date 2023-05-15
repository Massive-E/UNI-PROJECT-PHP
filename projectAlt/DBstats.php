<?php
$host = "localhost";
$username = "username"; // enter your database username
$password = "password"; // enter database password
$database = "UserLoginDB";


$connection = new mysqli($host, $username, $password, $database);

$query = "CREATE TABLE IF NOT EXISTS Users (username varchar(30) NOT NULL,password varchar(30),team varchar(30),status varchar(45) ,PRIMARY KEY(username))";
$connection->query($query);


if (isset($connection->error)) echo "$connection->error";
$Name=$_GET['userName'];

// getting user position
$sql = "SELECT * FROM Users WHERE username='".$Name."'";
$result = $connection->query($sql);
$row = $result->fetch_assoc();

$pos= "".intval($row['position']/10)."".($row['position']%10);

//$pos=0;

//getting other remaining cells, team cell counts

$remaining=100;
$r=0;
$g=0;
$y=0;


for($x=0; $x<100; $x++){
    $sql = "SELECT * FROM Board WHERE position="."'".$x."'";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

        if ($row['owner'] === "red") {
            $r++;
        }
        if ($row['owner'] === "yellow") {
            $y++;
        }
        if ($row['owner'] === "green") {
            $g++;
        }
}

$remaining= $remaining-($r+$g+$y);


$ro=0;
$go=0;
$yo=0;

// getting online players
$sql = "SELECT * FROM Users";
$result = $connection->query($sql);
while($row = $result->fetch_assoc()) {

    if ($row['status']==="ONLINE"){
        if ($row['team']==="red"){
            $ro++;
        }
        if ($row['team']==="yellow"){
            $yo++;
        }
        if ($row['team']==="green"){
            $go++;
        }

    }


}


echo "Your Position: <a >$pos </a>";
echo "<div class = 'leaderboard'><h4>Leader Board</h4>
Team Red : <a id='RedCell'> $r</a> <br>
Team Green :<a id='GreenCell'> $g</a> <br>
Team Yellow :<a id='YellowCell'> $y</a> <br>
Remaining Cells :<a id='remaining'> $remaining </a> <br>
</div>        
<div class='players'>
<h4>Players online</h4>
Team Red : <a id='RedCount'> $ro</a> <br>
Team Green :<a id='GreenCount'> $go</a> <br>
Team Yellow :<a id='YellowCount'> $yo</a> <br>
</div>";

?>






