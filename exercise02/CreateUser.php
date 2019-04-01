<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "m723l052", "yuuCoh4r", "m723l052");
 
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$username = $_POST["username"];

/* Check for duplicate */
$query = "SELECT user_id FROM Users 
          where user_id='".$username."'";

if ($result = mysql_query($query)) {
    trigger_error('It exists.', E_USER_WARNING);
} else {
    if($_POST["username"] != '' && $num_rows < 1) {
        $query = "INSERT INTO Users (user_id) VALUES (\"$username\");";

        if ($mysqli->query($query) == TRUE) {
            printf("User created successfully!");
            echo "<div><a href=\"../exercise03/CreatePost.html\">Create your first post!</a></div>";
        } else {
            echo "Unfortunately, " . $username . "is unavailable. Please try again!";
            echo "<div><a href=\"CreateUser.html\">Resubmit</a></div>";
        }

    } else {
        echo "Sorry, usernames cannot be empty.<br>";
        echo "<div><a href=\"CreateUser.html\">Retry</a></div>";
    }
}

/* close connection */
$mysqli->close();
?>

