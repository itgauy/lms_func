<?php
session_start();
include 'config.php'; //connection ng db
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user'])) {
  header('Location: ../index');  //IF NOT LOGGED IN
  exit;
}

$new_pass = $_POST['new_pass'];
$confirm_pass = $_POST['confirm_pass'];

if ($new_pass !== $confirm_pass) {
  $_SESSION['error'] = "Passwords do not match";
  header('Location: ../mandatory-password');
  exit;
}

// Hash the new password
$hashed_password = password_hash($new_pass, PASSWORD_DEFAULT);

$username = $_SESSION['user'];
// $fullname = $_SESSION['fullname'];

// Update the password and AccNew in the database based on user type
if ($_SESSION['UserType'] == "Admin") {
  $sql = "UPDATE Admins_Tbl SET Password='$hashed_password' WHERE Username='$username';";
  if ($conn->query($sql) === FALSE) {
    echo "Error updating password in Admins_Tbl: " . $conn->error;
    exit;
  }
} else if ($_SESSION['UserType'] == "Instructor") {
  $sql = "UPDATE Instructors_Tbl SET Password='$hashed_password' WHERE Username='$username';";
  if ($conn->query($sql) === FALSE) {
    echo "Error updating password in Instructors_Tbl: " . $conn->error;
    exit;
  }
} else if ($_SESSION['UserType'] == "Student") {
  $sql = "UPDATE Students_Tbl SET Password='$hashed_password' WHERE Username='$username';";
  if ($conn->query($sql) === FALSE) {
    echo "Error updating password in Students_Tbl: " . $conn->error;
    exit;
  }
}

$sql = "UPDATE Users_Tbl SET Password='$hashed_password', NewAcc=0 WHERE Username='$username';";
if ($conn->query($sql) === FALSE) {
  echo "Error updating password in Users_Tbl: " . $conn->error;
  exit;
}

unset($_SESSION['error']);
// Check the user type and redirect accordingly
header('Location: ../index?message=success');
session_unset();
session_destroy();