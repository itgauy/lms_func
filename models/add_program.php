<?php
session_start(); // Start the session
include 'config.php'; //connection ng db
include 'logs.php'; //para sa activity logs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//pang retrieve ng form data

$progcode = $_POST['progcode'];
$progtitle = $_POST['progtitle'];

//sql query lang pag insert sa db. yan lang alam ko :) ty sir riz
$sql = "INSERT INTO Programs_Tbl (ProgramCode, ProgramTitle)
VALUES ('$progcode', '$progtitle');";

//execution ng sql query
if ($conn->query($sql) === TRUE) {
  // INSERT LOG HERE :)))))))
  insert_log($_SESSION['Username'], 'Administrator', 'Program Implementation', $progcode);
  header('Location: ../admin/home?showModalProg=true');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();