<?php

session_start();
//session_destroy();

$Pass=$_GET['pass'];
$Name=$_GET['user'];


if (!isset($_SESSION['messages'])){
    $_SESSION['messages']= array();
}

array_push($_SESSION['messages'],$Name);

$temp=0;
foreach ($_SESSION['messages'] as $index=> $names){
    $temp++;
}
$count=0;
foreach ($_SESSION['messages'] as $index=> $names){
    if ($count+1<$temp)echo "<a>$names<a><br>";
    $count++;
}























$lol=$_REQUEST['user'];
$_SESSION['lol']=$lol;

echo $lol;




