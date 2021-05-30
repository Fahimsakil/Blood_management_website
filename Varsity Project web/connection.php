<?php
session_start();
function Connect()
{
    $server = "localhost";
    $user = "root";
    $password = '';
    $database = 'blood_donation';
    $conn = mysqli_connect($server, $user, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        return $conn;
    }
}
