<?php
$server = "localhost";
$username = "root";
$password = "";
$database="project";
// Create connection
$conn = mysqli_connect($server, $username, $password,$database);
// Check connection
if (!$conn) {
 echo "connecton failed";
} 

?>