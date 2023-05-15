<?php
require_once('playerClass.php');
require_once('messageClass.php');

session_start();

$Name=$_GET['user'];
$text= $_GET['message'];
$color = '';


// using unique player names to determine player team color
foreach ($_SESSION['players'] as $index=> $PlayerObject){
    $player= new playerClass();
    $player= unserialize($PlayerObject);
    if ($Name==$player->getPlayerName()){
        $color=$player->getPlayerTeam();
        break;
    }
}

//setting message array
if (!isset($_SESSION['messages'])){
    $_SESSION['messages']= array();
}

$NewMessage = new messageClass();
$NewMessage->setmessage($text,$Name,$color);

array_push($_SESSION['messages'],serialize($NewMessage));

$temp=0;
// need to do this to prevent duplicates for some reason
foreach ($_SESSION['messages'] as $index=> $MessageObject){
    $temp++;
}

$count=0;
foreach ($_SESSION['messages'] as $index=> $MessageObject){
    $TempMessage= new messageClass();
    $TempMessage = unserialize($MessageObject);

    $n=$TempMessage->getUserName();
    $c=$TempMessage->getTeamColor();
    $t=$TempMessage->getText();
    echo "<a style='background-color: $c'>$n :</a><a>$t</a><br>";

    $count++;
}

for ($x=0;$x< 4; $x++){
    echo "<a>why $x</a>";
}


