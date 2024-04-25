<?php
session_start(); //Start session muna tsk
include 'config.php';
include 'logs.php';

if (isset($_POST['username']) && isset($_POST['status'])) {
  $username = $_POST['username'];
  $status = $_POST['status'];
  $adminUsername = $_POST['adminUsername']; // admin's username forda log

  $sql = "UPDATE Users_Tbl SET Status='$status' WHERE Username='$username'";

  if ($conn->query($sql) === TRUE) {
    // INSERT LOG :))))))))))
    echo 1;
    $action = $status == 'ACTIVE' ? 'Student Account Activation' : 'Student Account Deactivation';
    insert_log($_SESSION['Username'], 'Administrator', $action, $username);
  } else {
    echo 0;
  }
  $conn->close();
}