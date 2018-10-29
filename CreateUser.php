<?php

//set up connection
$mysqli = new mysqli("mysql.eecs.ku.edu", "m495c301", "mysqlpassword","m495c301");

//check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$username = $_POST["username"];
$query = "INSERT INTO Users (user_id) VALUES ('$username')";

if($result = $mysqli->query($query))
{
    printf("Username Saved.");

    $result->free();   
}
else if ($username == "")
{
    printf("Username blank!");
}
else
{
    printf("Username already exists.");
}

$mysqli->close();   
?>