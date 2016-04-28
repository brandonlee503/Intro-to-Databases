<?php

// Define database connection constants
$servername = 'mysql.cs.orst.edu';
$username = 'cs340_leebran';
$password ='9792';
$dbname = 'cs340_leebran';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}

// Declare variables
$sid = $_POST[sid];
$firstname = $_POST[firstname];
$lastname = $_POST[lastname];
$major = $_POST[major];

// Define query
$sql = "UPDATE Students SET first_name='$firstname', last_name='$lastname', major='$major' WHERE sid='$sid'";

// Send query
if (mysqli_query($conn, $sql)) {
    echo "Student record updated!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
