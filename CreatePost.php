<?php
    
$username = $_POST["user"];
$message = $_POST["content"];



//set up connection
$mysqli = new mysqli("mysql.eecs.ku.edu", "m495c301", "mysqlpassword","m495c301");

//check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

//check if post body is empty
if($message == "")
{
    echo "Empty body.";
    exit();
}

//check if the username is in the user_id list and submit the post if username is registered in the data
$query = "SELECT user_id
    FROM Posts
    WHERE EXISTS
    SELECT user_id FROM Posts WHERE userId == '$username'";
$insert = "INSERT INTO Posts (author_id, content) VALUES ('$message', '$username')";




if ( $mysqli->query($query))
{
    if($mysqli->query($insert))
    {
        echo "Post saved!";
    }
    $result->free();
}
else
{
    echo "User not registered";
}

$mysqli->close();
?>