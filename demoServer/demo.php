<?php

$dbServerName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "treble_db";

$conn = @ mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

if(!$conn)
{
    echo `<script>alert("Oops, connection error")</script>`;
}

?>