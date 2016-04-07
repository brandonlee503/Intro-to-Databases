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
$firstname = $_POST[firstname];
$lastname = $_POST[lastname];
$address = $_POST[address];
$city = $_POST[city];
$state = $_POST[state];
$gender = $_POST[gender];
$age = $_POST[age];
$major = $_POST[major];

// Define query
$sql = "INSERT INTO Students (first_name, last_name, address, city, state, gender, age, major) VALUES ('$firstname', '$lastname', '$address', '$city', '$state', '$gender', '$age', '$major')";

// Send query
if (mysqli_query($conn, $sql)) {
    echo "Student record inserted!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
