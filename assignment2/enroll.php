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
$department = $_POST[department];
$courseNumber = $_POST[courseNumber];
$grade = $_POST[grade];
$term = $_POST[term];

// Define query
$sql = "INSERT INTO Enroll (sid, department, courseNumber, grade, term) VALUES ('$sid', '$department', '$courseNumber', '$grade', '$term')";

// Send query
if (mysqli_query($conn, $sql)) {
    echo "Student enrollment inserted!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
