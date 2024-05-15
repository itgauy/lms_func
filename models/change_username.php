<?php
session_start();
include 'config.php'; //connection to db
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user'])) {
  header('Location: ../index');  //IF NOT LOGGED IN
  exit;
}

$current_pass = $_POST['current_pass'];
$new_username = $_POST['new_username'];

// Fetch the current password from the database
$sql = "SELECT Password FROM Users_Tbl WHERE Username='" . $_SESSION['user'] . "';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$hashed_password = $row['Password'];

// Verify the current password
if (!password_verify($current_pass, $hashed_password)) {
  $_SESSION['error'] = "Invalid current password";
  header('Location: ../admin/admin-settings');

  exit;
}

// Update the username in the database based on user type
if ($_SESSION['UserType'] == "Admin") {
  $sql = "UPDATE Admins_Tbl SET Username='$new_username' WHERE Username='" . $_SESSION['user'] . "';";
  if ($conn->query($sql) === FALSE) {
    echo "Error updating username in Admins_Tbl: " . $conn->error;
    exit;
  }
} else if ($_SESSION['UserType'] == "Instructor") {
  $sql = "UPDATE Instructors_Tbl SET Username='$new_username' WHERE Username='" . $_SESSION['user'] . "';";
  if ($conn->query($sql) === FALSE) {
    echo "Error updating username in Instructors_Tbl: " . $conn->error;
    exit;
  }
} else if ($_SESSION['UserType'] == "Student") {
  $sql = "UPDATE Students_Tbl SET Username='$new_username' WHERE Username='" . $_SESSION['user'] . "';";
  if ($conn->query($sql) === FALSE) {
    echo "Error updating username in Students_Tbl: " . $conn->error;
    exit;
  }
}

$sql = "UPDATE Users_Tbl SET Username='$new_username' WHERE Username='" . $_SESSION['user'] . "';";
if ($conn->query($sql) === FALSE) {
  echo "Error updating username in Users_Tbl: " . $conn->error;
  exit;
}

$_SESSION['user'] = $new_username;

unset($_SESSION['error']);
session_write_close();
header('Location: ../admin/admin-settings');