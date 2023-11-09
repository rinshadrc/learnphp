<?php


$con = mysqli_connect('localhost','root','','mystore');

// Check the connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
