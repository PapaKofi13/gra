<?php

require_once 'connect.php';
$connection = new mysqli($db_hostname, $db_username, $db_password, $db_database);
if ($connection->connect_error) die ($connection->connect_error);


function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var); 
}

function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
}

function encodePassword($password)
{
    $salt1 = "qm&h*a";
    $salt2 = "rt0*^p";
    $token = hash('ripemd128', "$salt1$password$salt2");
    return $token;
}

function getUserData($user_id){
    $user_result = queryMysql("SELECT * FROM `clients` WHERE `id` = '$user_id'");
    if($user_result->num_rows){
        $result = $user_result->fetch_array(MYSQLI_ASSOC);
    }
    else $result = null;
    return $result;
}
