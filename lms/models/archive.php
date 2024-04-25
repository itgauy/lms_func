<?php
session_start();
include 'config.php';
include 'logs.php';

// Fetch the username from the URL parameter
$username = $_GET['username'];

// Sanitize the username
$username = mysqli_real_escape_string($conn, $username);

// SQL query to insert data from Students_Tbl into UserArchives_Tbl
$sql_insert = "INSERT INTO UserArchives_Tbl (StudentID, FirstName, MiddleName, LastName, Suffix, StudentNum, BirthDate, Program, Class, Section, YrLvl, Username, Password, Email, created_at)
               SELECT StudentID, FirstName, MiddleName, LastName, Suffix, StudentNum, BirthDate, Program, Class, Section, YrLvl, Username, Password, Email, created_at
               FROM Students_Tbl
               WHERE Username = '$username'";

// Execute the INSERT query
if ($conn->query($sql_insert) === TRUE) {
  echo "Record inserted successfully";
} else {
  echo "Error inserting record: " . $conn->error;
}

// SQL query to delete data from Students_Tbl
$sql_delete = "DELETE FROM Students_Tbl WHERE Username = '$username'";

// Execute the DELETE query
if ($conn->query($sql_delete) === TRUE) {
  insert_log($_SESSION['Username'], 'Administrator', 'Account Archiving', $username);
  header('Location: ../admin/admin-user-student?archive_success=true');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>