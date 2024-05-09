<?php
session_start(); // Start the session
include 'config.php'; //connection ng db
include 'logs.php'; //para sa activity logs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//pang retrieve ng form data galing sa index.html
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$suffix = isset($_POST['suffix']) ? $_POST['suffix'] : "";
if ($suffix == "NONE") {
  $suffix = "";
}
$sn = $_POST['sn'];
$dob = $_POST['dob'];
$dept = $_POST['department'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT); // Hash the password
$username = $_POST['user'];
$status = "ACTIVE";

//sql query lang pag insert sa db. yan lang alam ko :) ty sir riz
$sql = "INSERT INTO Admins_Tbl (FirstName, MiddleName, LastName, Suffix, EmployeeNum, BirthDate, Department, Email, Password, Username)
VALUES ('$fname', '$mname', '$lname', '$suffix', '$sn', '$dob', '$dept', '$email', '$hashed_pass', '$username');";

// New query for users_tbl to
$userType = 'Admin';
$sql .= "INSERT INTO Users_Tbl(Username, Password, UserType, NewAcc, Status, Email) VALUES('$username', '$hashed_pass', '$userType', 1, '$status', '$email');";

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
  insert_log($_SESSION['Username'], 'Administrator', 'Admin Account Registration', $username);
  header('Location: ../admin/admin-user-admin?showModal=true');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();