<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "m723l052", "yuuCoh4r", "m723l052");
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
echo "<h1>Users</h1>";
$query = "SELECT user_id FROM Users;";
$result = $mysqli->query($query);
while ($row = $result->fetch_assoc())
{
    echo "" . $row["user_id"] . "<br>";
}
// free result set
$result->free();
$mysqli->close();
?>