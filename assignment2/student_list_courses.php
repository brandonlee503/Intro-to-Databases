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

// Define query
$sql = "SELECT * FROM Enroll WHERE sid='$sid'";

// Make Query
$result = mysqli_query($conn, $sql);

// Print results
echo "Results for the sid: " . $sid;
echo "<br />";
echo "Database Format: ";
echo "<br />";
echo "department coursenumber grade term";
echo "<br />";

while ($row = mysqli_fetch_array($result)) {
    echo $row['department'] . " ";
    echo $row["courseNumber"] . " ";

    if (is_null($row["grade"])) {
        echo "NULL ";
    } else {
        echo $row["grade"] . " ";
    }
    
    echo $row["term"] . " ";
    echo "<br />";
}

mysqli_close($conn);
?>
