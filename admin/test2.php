<?php
include '../models/config.php';

if (isset($_POST['programCode'])) {
  $programCode = $_POST['programCode'];
} else {
  $programCode = "BSIT"; // default value if no program is clicked
}

$sql = "SELECT * FROM Sections_Tbl WHERE ProgramCode =? ORDER BY SectionName ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $programCode);
$stmt->execute();
$result = $stmt->get_result();

$sections = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $sections[] = $row;
  }
}

echo json_encode($sections);

$conn->close();
?>