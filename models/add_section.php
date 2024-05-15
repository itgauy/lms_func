<?php
session_start();
include 'config.php';
include 'logs.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['programCode'])) {
  $programCode = $_POST['programCode'];
  $sql = "SELECT COUNT(*) as count FROM Sections_Tbl WHERE ProgramCode = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $programCode);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $count = $row['count'];
  $char = chr(65 + floor($count / 4)); // 65 is the ASCII value for 'A' REMEMBER ME, DO I HAVE TO SAY GOODBYE

  for ($i = 1; $i <= 4; $i++) {
    $sectionName = $programCode . '-' . $i . $char;
    $sql = "INSERT INTO Sections_Tbl (ProgramCode, SectionName) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $programCode, $sectionName);
    $stmt->execute();
  }
  insert_log($_SESSION['Username'], 'Administrator', 'Section Creation', $programCode);
}

$conn->close();