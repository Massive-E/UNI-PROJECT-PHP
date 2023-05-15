<?php
require_once("playerClass.php");
session_start();

$password="";
$confirm="";
$name="";
$totalPlayers=0;


if (isset($_SESSION['TP'])){
    $totalPlayers=$_SESSION['TP'];
}

if (isset($_POST["UN"]) && isset($_POST["UP"]) & isset($_POST['color'])){
    $exists =0;
    if ($totalPlayers!=0) {
        foreach ($_SESSION['players'] as $index => $usObject) {
            $temp = new playerClass();
            $temp = unserialize($usObject);
            if ($temp->userName == $_POST['UN']) {
                $name = "username taken";
            } else {
                $exists++;
            }
        }
    }
    else {
        $_SESSION['players']= array();
    }



    if (isset($_POST["UPC"]) && isset($_POST["UP"])){
        if ($_POST["UPC"]== $_POST["UP"]){

            if ($totalPlayers==$exists){
                $temp = new playerClass();
                $temp->setPlayer($_POST["UN"],$_POST["UP"],$_POST["color"]);
                array_push($_SESSION['players'], serialize($temp));
                $totalPlayers++;
                $_SESSION['TP']=$totalPlayers;
            }
        }
        else{
            $password="Passwords dont match";
        }
    }
}

function passcheck($p){
    echo $p;
}
function namecheck($n){
    echo $n;
}

?>


<html>
<header>

    <title>Sign Up</title>
</header>
<h1>Sign Up</h1>
<body>
<form method="post">
    User Name:  <input type="text" name="UN" value="<?php namecheck($name)?>"><br>
    User Pass:  <input type="text" name="UP" value="<?php passcheck($password);?>"><br>
    Pass Confirmation: <input type="text" name="UPC" ><br>
    pick your team:
    <select name="color" >
        <option value="red">Red </option>
        <option value="green">Green </option>
        <option value="yellow">Yellow</option>
    </select>
    <br><br>

    <input type="submit" name="signup" value="Sign Up!">

</form>
<br>
<form action="LOGINDOGSHIT.php">
    already have an account?
    <br>
    <input type="submit" value="Sign In">

</form>
<?php
if (isset($_SESSION['players'])){
    foreach ($_SESSION['players'] as $index=> $usObject){
        $temp = new playerClass();
        $temp = unserialize($usObject);
        echo "$temp->userName $temp->userPass $temp->userTeam";
        echo "<br>";
    }
}
else {
    echo "<br><p>No players currently</p><br>";
}

?>

</body>

</html>
