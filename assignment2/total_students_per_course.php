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

// Define query
$courseSQL = "SELECT * FROM Courses WHERE 1";
$enrollSQL = "SELECT * FROM Enroll WHERE 1";

// Make Query
$courseResult = mysqli_query($conn, $courseSQL);
$enrollResult = mysqli_query($conn, $enrollSQL);

// Print results
echo "<h1>" . "Courses and Number of Students" . "</h1>";
echo "<br />";
echo "<table border='1'>
<tr>
<th>department</th>
<th>courseNumber</th>
<th>name</th>
<th>number of students</th>
</tr>";

// Instantiate and fill array of enrolled data
$enrollArray = array();
while ($enrollRow = mysqli_fetch_array($enrollResult)) {
    $enrollArray[] = $enrollRow['department'] . $enrollRow['courseNumber'];
}

// For every row in Courses, print out department and name
while ($courseRow = mysqli_fetch_array($courseResult)) {
    echo "<tr>";
    echo "<td>" . $courseRow['department'] . "</td>";
    echo "<td>" . $courseRow['number'] . "</td>";
    echo "<td>" . $courseRow['name'] . "</td>";

    $totalStudents = 0;

    // For each row in courses, count total number of students
    foreach ($enrollArray as $enrollItem) {
        if ($enrollItem == $courseRow['department'] . $courseRow['number']) {
            $totalStudents++;
        }
    }
    echo "<td>" . $totalStudents . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>
