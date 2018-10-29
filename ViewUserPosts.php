<?php

//set up connection
$mysqli = new mysqli("mysql.eecs.ku.edu", "m495c301", "mysqlpassword","m495c301");

//check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
$username = $_POST["username"];
$query = "SELECT content FROM Posts WHERE author_id = '$username'";

if($result = $mysqli->query($query))
{
    while ($row = $result->fetch_assoc()) {
        echo $row["content"] . "<br>";
    }
}
$mysqli->close();   

?>