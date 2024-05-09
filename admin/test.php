<?php
if (isset($_POST['programCode'])) {
  $_SESSION['programCode'] = $_POST['programCode'];
  echo 'Received programCode: ' . $_POST['programCode'];
  $programCode = $_POST['programCode'];
} else {
  echo 'No programCode received.';
}