<?php
// $host = 'localhost'; // Your database server hostname
// $username = 'elavatet_elavate_arshad'; // Your database username
// $password = 'Arshad@123#admin'; // Your database password
// $database = 'elavatet_elavatetaxsolution'; // Your database name

// $conn = mysqli_connect($host, $username, $password, $database);

// // Check the connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }



$host = 'localhost'; // Your database server hostname
$username = 'root'; // Your database username
$password = ''; // Your database password
$database = 'elavatetaxsolution'; // Your database name

$conn = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
