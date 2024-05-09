<?php
session_start(); // Start the session
include 'config.php'; //connection ng db
include 'logs.php'; //para sa activity logs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Retrieve form data
$fname = $_POST['fname1'];
$mname = $_POST['mname1'];
$lname = $_POST['lname1'];
$suffix = isset($_POST['suffix']) ? $_POST['suffix1'] : "";
if ($suffix == "NONE") {
  $suffix = "";
}
$sn = $_POST['sn1'];
$dob = $_POST['dob1'];
$dept = $_POST['department1'];
$email = $_POST['email1'];
$username = $_POST['user1'];
$status = "ACTIVE";

// SQL query to update student data
$sql = "UPDATE Instructors_Tbl SET FirstName='$fname', MiddleName='$mname', LastName='$lname', Suffix='$suffix', BirthDate='$dob', Department='$dept', Email='$email', Username='$username' WHERE EmployeeNum='$sn';";

$sql .= "UPDATE Users_Tbl SET Email='$email', Username='$username' WHERE Username='$username';";

//execution ng sql query
if ($conn->multi_query($sql) === TRUE) {
  // Fetch all result sets from the previous multi_query call
  while ($conn->more_results() && $conn->next_result()) {
    // free each result set
    if ($result = $conn->store_result()) {
      $result->free();
    }
  }
  // INSERT LOG HERE :)))))))
  insert_log($_SESSION['Username'], 'Administrator', 'Instructor Account Update', $username);
  header('Location: ../admin/admin-user-instructor?showModalEdit=true');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();