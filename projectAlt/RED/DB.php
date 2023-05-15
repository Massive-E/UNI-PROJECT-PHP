<?php
$db_hostname = 'localhost';
$db_database = 'FinalProject';
$db_username = 'username';
$db_password = 'password';

$connection = new mysqli ($db_hostname, $db_username, $db_password, $db_database);

if ($connection->connect_error) die ($connection->connect_error);
//
//
//
//function DBcheck($name, $pass, $connection){
//
//    $response = new stdClass;
//
//    $query = " SELECT * FROM Players WHERE Name ="."'".$name."'";
//    $result = $connection->query($query);
//
//    if ($result->num_rows>0 and $connection->query($query)->fetch_array()['Pass'] === $pass){
//
//        $response->code = true;
//
//        return $response;
//
//    }
//
//    else {
//
//        $response->code = false;
//        return $response;
//
//    }
//
//}
//
//
//if ($_GET["flag"]==="login"){
//
//    $response = new stdClass;
//    $response->code = null;
//    $response->team = null;
//
//    $response = DBcheck($_GET['userName'],$_GET['password'], $connection); // response sent back to Login.php in the form of true or false;
//
//    echo json_encode($response);
//
//}
//

