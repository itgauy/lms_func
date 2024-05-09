<?php
session_start();
include 'config.php';
include 'logs.php';


$username = $_GET['username'];


$username = mysqli_real_escape_string($conn, $username);


$sql_user_type = "SELECT UserType FROM Users_Tbl WHERE Username = '$username'";
$result = $conn->query($sql_user_type);
$row = $result->fetch_assoc();
$userType = $row['UserType'];


if ($userType == 'Student') {
  $sql_insert = "INSERT INTO UserArchives_Tbl (StudentID, FirstName, MiddleName, LastName, Suffix, StudentNum, BirthDate, Program, Class, Section, YrLvl, Username, Password, Email, UserType, created_at)
                 SELECT s.StudentID, s.FirstName, s.MiddleName, s.LastName, s.Suffix, s.StudentNum, s.BirthDate, s.Program, s.Class, s.Section, s.YrLvl, s.Username, s.Password, s.Email, u.UserType, s.created_at
                 FROM Students_Tbl s
                 JOIN Users_Tbl u ON s.Username = u.Username
                 WHERE s.Username = '$username'";
} elseif ($userType == 'Instructor') {
  $sql_insert = "INSERT INTO UserArchives_Tbl (InstructorID, FirstName, MiddleName, LastName, Suffix, EmployeeNum, BirthDate, Department, Username, Password, Email, UserType, created_at)
                 SELECT s.InstructorID, s.FirstName, s.MiddleName, s.LastName, s.Suffix, s.EmployeeNum, s.BirthDate, s.Department, s.Username, s.Password, s.Email, u.UserType, s.created_at
                 FROM Instructors_Tbl s
                 JOIN Users_Tbl u ON s.Username = u.Username
                 WHERE s.Username = '$username'";
} elseif ($userType == 'Admin') {
  $sql_insert = "INSERT INTO UserArchives_Tbl (AdminID, FirstName, MiddleName, LastName, Suffix, EmployeeNum, BirthDate, Department, Username, Password, Email, UserType, created_at)
                 SELECT s.AdminID, s.FirstName, s.MiddleName, s.LastName, s.Suffix, s.EmployeeNum, s.BirthDate, s.Department, s.Username, s.Password, s.Email, u.UserType, s.created_at
                 FROM Admins_Tbl s
                 JOIN Users_Tbl u ON s.Username = u.Username
                 WHERE s.Username = '$username'";
}


if ($conn->query($sql_insert) === TRUE) {
  echo "Record inserted successfully";
} else {
  echo "Error inserting record: " . $conn->error;
}


if ($userType == 'Student') {
  $sql_delete = "DELETE FROM Students_Tbl WHERE Username = '$username'";
} elseif ($userType == 'Instructor') {
  $sql_delete = "DELETE FROM Instructors_Tbl WHERE Username = '$username'";
} elseif ($userType == 'Admin') {
  $sql_delete = "DELETE FROM Admins_Tbl WHERE Username = '$username'";
}


$action = '';
if ($userType == 'Student') {
  $action = 'Student Account Archiving';
} elseif ($userType == 'Instructor') {
  $action = 'Instructor Account Archiving';
} elseif ($userType == 'Admin') {
  $action = 'Admin Account Archiving';
}


if ($conn->query($sql_delete) === TRUE) {
  insert_log($_SESSION['Username'], 'Administrator', $action, $username);
  if ($userType == 'Student') {
    header('Location: ../admin/admin-user-student?archive_success=true');
  } elseif ($userType == 'Instructor') {
    header('Location: ../admin/admin-user-instructor?archive_success=true');
  } elseif ($userType == 'Admin') {
    header('Location: ../admin/admin-user-admin?archive_success=true');
  }
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
