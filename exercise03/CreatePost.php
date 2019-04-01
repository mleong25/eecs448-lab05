<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "m723l052", "yuuCoh4r", "m723l052");

$username = $_POST["username"];
$post = $_POST["post"];

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if ($username == NULL || $post == NULL) {
    echo "<div><p>Error in submitting post, username and post cannot be empty.<br></p></div>";
    echo "<div><a href=\"CreatePost.html\">Retry</a></div>";

} else {
    $query = "INSERT INTO Posts (content, author_id) VALUES (\'$post\', (SELECT user_id FROM Users WHERE user_id=\'$username\'));";
	if ($result = $mysqli->query($query)){
		echo "Post successful!";
	}
	else {
        echo "Unfortunately, something went wrong in the process...";
        echo "<div><a href=\"CreatePost.html\">Retry</a></div>";
	}
}

$mysqli->close();
?>