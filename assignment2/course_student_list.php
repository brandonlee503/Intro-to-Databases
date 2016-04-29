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
$department = $_POST[department];
$courseNumber = $_POST[courseNumber];

// Define query
$sql = "SELECT Students.first_name, Students.last_name
        FROM Students
        INNER JOIN Enroll
        ON Students.sid=Enroll.sid
        WHERE Enroll.department='$department' AND Enroll.courseNumber='$courseNumber'";


// Make Query
$result = mysqli_query($conn, $sql);

// Print results
echo "Results for students in course: " . $department . " " . $courseNumber;
echo "<br />";

while ($row = mysqli_fetch_array($result)) {
    echo $row['first_name'] . " " . $row['last_name'];
    echo "<br />";
}

mysqli_close($conn);
?>
