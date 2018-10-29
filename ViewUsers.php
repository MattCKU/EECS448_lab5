<?php

//set up connection
$mysqli = new mysqli("mysql.eecs.ku.edu", "m495c301", "mysqlpassword","m495c301");

//check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT user_id FROM Users";

if($result = $mysqli->query($query))
{
    $i = 1;
    while ($col = $result->fetch_assoc()) {
        echo $i . ". "; 
        echo $col["user_id"] . '<br>';
        $i = $i + 1;
    }
}

$mysqli->close();   
?>