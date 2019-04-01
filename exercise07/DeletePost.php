<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "m723l052", "yuuCoh4r", "m723l052");
$array = $_POST["post"];
for ($i = 0; $i < count($array); $i++)
{
	//delete post
	$query = "DELETE FROM Posts WHERE post_id='$array[$i]'";
	if ($mysqli->query($query))
	{
		echo "Post #" . $array[$i] . " has been deleted<br>";
	}
	else
	{
		echo "Error deleting post #" . $array[$i] . "<br>";
	}
}
$mysqli->close();
?>

