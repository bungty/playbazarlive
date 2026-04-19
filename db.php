<?php
$conn = mysqli_connect("localhost", "root", "", "playbazarlive");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>