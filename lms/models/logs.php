<?php
include 'config.php';

// Function to insert log into the database
function insert_log($actor, $privilege, $action, $target)
{
  global $conn;

  date_default_timezone_set('Asia/Manila');

  $timestamp = date('Y-m-d H:i:s');

  $sql = "INSERT INTO Logs_Tbl (actor, privilege, action, target, timestamp)
  VALUES ('$actor', '$privilege', '$action', '$target', '$timestamp')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}