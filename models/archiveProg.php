<?php
session_start();
include 'config.php';
include 'logs.php';

$username = $_GET['username'];

$username = mysqli_real_escape_string($conn, $username);

$sql_user_type = "SELECT * FROM Programs_Tbl WHERE ProgramCode = '$username'";
$result = $conn->query($sql_user_type);
$row = $result->fetch_assoc();

$sql_insert = "INSERT INTO ProgramArchives_Tbl (ProgramID, ProgramCode, ProgramTitle) SELECT ProgramID, ProgramCode, ProgramTitle FROM Programs_Tbl WHERE ProgramCode = '$username'";
if ($conn->query($sql_insert) === TRUE) {
  echo "Record inserted successfully";
} else {
  echo "Error inserting record: " . $conn->error;
}

$delete_section = "DELETE FROM Sections_Tbl WHERE ProgramCode = '$username'";
if ($conn->query($delete_section) === TRUE) {
  echo "Record inserted successfully";
} else {
  echo "Error inserting record: " . $conn->error;
}


$sql_deletee = "DELETE FROM Programs_Tbl WHERE ProgramCode = '$username'";
if ($conn->query($sql_deletee) === TRUE) {
  insert_log($_SESSION['Username'], 'Administrator', 'Program Archiving', $username);
  header('Location: ../admin/home?archive_progsuccess=true');
} else {
  echo "Error inserting record: " . $conn->error;
}