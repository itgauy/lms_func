<?php
include 'config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['programCode'])) {
  $programCode = $_POST['programCode'];
} else {
  $programCode = ""; // default value pero no need
}

$sql = "SELECT * FROM Sections_Tbl WHERE ProgramCode = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $programCode);
$stmt->execute();
$result = $stmt->get_result();

$sections = array();

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $sections[] = $row["SectionName"];
  }
}

if (empty($sections)) {
  echo 'No sections';
} else {
  echo json_encode($sections);
}

$conn->close();