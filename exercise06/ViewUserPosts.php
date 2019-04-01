<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "m723l052", "yuuCoh4r", "m723l052");
$user = $_POST["user"];
echo "<h1>Posts from " . $user . "</h1>";
$query = "SELECT * FROM Posts WHERE author_id = '$user';";
if ($result = $mysqli->query($query)) {
	echo "<table>";
	while ($row = $result->fetch_assoc())
	{
	    echo "<tr><td>" . $row["post_id"] . "</td><td>" . $row["content"] . "</td><td>" . $row["author_id"] . "</td></tr>";
	}
	echo "</table>";
	$result->free();
}
else {
	echo "Unable to gather posts for this user at this time.";
}
$DB->close();
?>