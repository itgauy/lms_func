<?php
session_start();
include 'config.php'; //connection ng db
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$username = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM Users_Tbl WHERE Username='$username'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  if (password_verify($pass, $row['Password'])) {
    $_SESSION['user'] = $username;
    $_SESSION['Username'] = $row['Username'];
    $_SESSION['NewAcc'] = $row['NewAcc']; // Store NewAcc in session
    $_SESSION['UserType'] = $row['UserType']; // Store UserType in session
    $_SESSION['email'] = $row['Email'];


    if ($row['UserType'] == "Admin") { //ADMIN
      if ($row['NewAcc'] == 1) {
        header('Location: ../mandatory-password'); // redirect to password change form
        exit;
      }
      $sql1 = "SELECT * FROM Admins_Tbl WHERE Username='$username'";
      $result1 = $conn->query($sql1);
      if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        // I added this para sa settings ni admin
        $_SESSION['fname'] = $row1['FirstName'];
        $_SESSION['mname'] = $row1['MiddleName'];
        $_SESSION['lname'] = $row1['LastName'];
        $_SESSION['suffix'] = $row1['Suffix'];
        $_SESSION['employeenum'] = $row1['EmployeeNum'];
        $_SESSION['dept'] = $row1['Department'];
        $date = new DateTime($row1['BirthDate']);
        $_SESSION['dob'] = $date->format('F d, Y');
        $_SESSION['fullname'] = $row1['FirstName'] . ' ' . $row1['MiddleName'] . ' ' . $row1['LastName'] . ' ' . $row1['Suffix'];
      }
      header('Location: ../admin/home');
      exit;
    } else if ($row['UserType'] == "Instructor") {
      if ($row['NewAcc'] == 1) {
        header('Location: ../mandatory-password'); // redirect to password change form
        exit;
      }
      $sql2 = "SELECT * FROM Instructors_Tbl WHERE Username='$username'";
      $result2 = $conn->query($sql2);
      if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        $_SESSION['fname'] = $row2['FirstName'];
        $_SESSION['mname'] = $row2['MiddleName'];
        $_SESSION['lname'] = $row2['LastName'];
        $_SESSION['suffix'] = $row2['Suffix'];
        $_SESSION['fullname'] = $row2['FirstName'] . ' ' . $row2['MiddleName'] . ' ' . $row2['LastName'] . ' ' . $row2['Suffix'];
      }
      header('Location: ../instructor/home'); // redirect to Instructor dashboard
      exit;
    } else if ($row['UserType'] == "Student") {
      if ($row['NewAcc'] == 1) {
        header('Location: ../mandatory-password'); // redirect to password change form
        exit;
      }
      $sql3 = "SELECT * FROM Students_Tbl WHERE Username='$username'";
      $result3 = $conn->query($sql3);
      if ($result3->num_rows > 0) {
        $row3 = $result3->fetch_assoc();
        $_SESSION['fname'] = $row3['FirstName'];
        $_SESSION['mname'] = $row3['MiddleName'];
        $_SESSION['lname'] = $row3['LastName'];
        $_SESSION['suffix'] = $row3['Suffix'];
        $_SESSION['fullname'] = $row3['FirstName'] . ' ' . $row3['MiddleName'] . ' ' . $row3['LastName'] . ' ' . $row3['Suffix'];
      }
      header('Location: ../student/home'); // redirect to student dashboard
      exit;
    }
  } else {
    $_SESSION['error'] = "Username or password is incorrect.";
    header('Location: ../index');
    exit;
  }
} else {
  $_SESSION['error'] = "Username or password is incorrect.";
  header('Location: ../index');
  exit;
}

$conn->close();
