<?php
include 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['programCode'])) {
  $programCode = $_POST['programCode'];

  // Get the last section for the given program code
  $sql = "SELECT * FROM Sections_Tbl WHERE ProgramCode = ? ORDER BY SectionName DESC LIMIT 1";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $programCode);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();
  $lastSectionName = $row["SectionName"];

  // Extract the suffix from the last section name
  $suffix = substr($lastSectionName, -1);

  // Delete the sections with the same suffix
  $sql = "DELETE FROM Sections_Tbl WHERE ProgramCode = ? AND RIGHT(SectionName, 1) = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $programCode, $suffix);
  $stmt->execute();
}

$conn->close();