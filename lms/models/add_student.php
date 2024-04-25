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
$prog = $_POST['prog'];
$class = $_POST['class'];
$section = $_POST['section'];
if (empty($section)) {
  $section = "IRREGULAR";
}
$email = $_POST['email'];
$pass = $_POST['pass'];
$hashed_pass = password_hash($pass, PASSWORD_DEFAULT); // Hash the password
$yrLvl = $_POST['yrLvl'];
$username = $_POST['user'];
$status = "ACTIVE";

//sql query lang pag insert sa db. yan lang alam ko :) ty sir riz
$sql = "INSERT INTO Students_Tbl (FirstName, MiddleName, LastName, Suffix, StudentNum, BirthDate, Program, Class, Section, Email, Password, YrLvl, Username)
VALUES ('$fname', '$mname', '$lname', '$suffix', '$sn', '$dob', '$prog', '$class', '$section', '$email', '$hashed_pass', '$yrLvl', '$username');";

// New query for users_tbl to
$userType = 'Student';
$sql .= "INSERT INTO Users_Tbl(Username, Password, Email, UserType, NewAcc, Status) VALUES('$username', '$hashed_pass', '$email', '$userType', 1, '$status');";

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
  insert_log($_SESSION['Username'], 'Administrator', 'Account Registration', $username);
  header('Location: ../admin/admin-user-student?showModal=true');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();