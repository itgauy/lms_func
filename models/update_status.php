<?php
session_start();
include 'config.php';
include 'logs.php';

if (isset($_POST['username']) && isset($_POST['status'])) {
  $username = $_POST['username'];
  $status = $_POST['status'];
  $adminUsername = $_POST['adminUsername']; // admin's username forda log

  // Fetch the Usertype for the given username
  $sql_usertype = "SELECT UserType FROM Users_Tbl WHERE Username='$username'";
  $result = $conn->query($sql_usertype);
  $row = $result->fetch_assoc();
  $usertype = $row['UserType'];

  // Determine the action message sa archive based on the Usertype
  $action = '';
  if ($usertype == 'Student') {
    $action = $status == 'ACTIVE' ? 'Student Account Reactivation' : 'Student Account Deactivation';
  } elseif ($usertype == 'Instructor') {
    $action = $status == 'ACTIVE' ? 'Instructor Account Reactivation' : 'Instructor Account Deactivation';
  } elseif ($usertype == 'Admin') {
    $action = $status == 'ACTIVE' ? 'Admin Account Reactivation' : 'Admin Account Deactivation';
  }

  $sql = "UPDATE Users_Tbl SET Status='$status' WHERE Username='$username'";

  if ($conn->query($sql) === TRUE) {
    // INSERT LOG
    echo 1;
    insert_log($_SESSION['Username'], 'Administrator', $action, $username);
  } else {
    echo 0;
  }
  $conn->close();
}
