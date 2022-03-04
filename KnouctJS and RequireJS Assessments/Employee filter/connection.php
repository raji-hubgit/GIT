<?php

$host = "localhost"; /* Host name */
$user = "user"; /* User */
$password = "password"; /* Password */
$dbname = "example"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
?>
