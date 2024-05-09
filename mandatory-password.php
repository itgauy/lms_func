<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user'])) {
  header('Location: ./index');  //IF NOT YET LOGGED IN
  exit;
} else if (isset($_SESSION['NewAcc']) != 1) { //PAG DI NA BAGO :P
  if ($_SESSION['UserType'] == "Admin") {
    header('Location: admin/home');
  } else if ($_SESSION['UserType'] == "Instructor") {
    header('Location: instructor/home');
  } else {
    header('Location: student/home');
  }
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Management System | New Password</title>
  <!-- Tailwind cdn -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <!-- Flowbite cdn -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  <!-- Icon -->
  <link rel="icon" type="image/png" href="./assets/images/LMS-logo.png" />
  <!-- Css link -->
  <link rel="stylesheet" href="./assets/style.css">
</head>

<body class="bg-ghost-white">
  <div class="p-12 h-screen">
    <span class="inline-flex items-center fixed">
      <img src="./assets/images/LMS-logo.png" alt="LMS Logo" class="h-9 w-auto mr-6">
      <h3 class="font-medium text-deep-koamaru text-xl">Learning Management System</h3>
    </span>

    <div class="flex-col flex items-center justify-center h-full">
      <div class="w-full max-w-sm p-4 bg-white rounded-2xl drop-shadows sm:p-6 md:p-8">
        <!-- Form -->
        <form class="space-y-3" action="./models/change_password.php" method="post">
          <h5 class="text-xl font-medium text-deep-koamaru mb-3">New Password</h5>
          <p class="block text-sm font-normal text-deep-koamaru pb-5">Lorem ipsum dolor sit amet, consectetur adipis.
          </p>
          <?php
          if (isset($_SESSION['error'])) {
            echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
          }
          ?>
          <label for="user" class="block text-sm font-medium text-deep-koamaru">New Password</label>
          <!-- New Password Input -->
          <input type="password" id="new_pass" name="new_pass" required
            class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-md focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
            placeholder="Your password" required>
          <label for="user" class="block text-sm font-medium text-deep-koamaru pt-4">Confirm New Password</label>
          <!-- Confirm New Password Input -->
          <input type="password" id="confirm_pass" name="confirm_pass" required
            class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-md focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
            placeholder="Your password" required><br>
          <!-- Error Message for validation -->
          <!-- <p class="text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, snapp!</span> Some error message.</p> -->
          <!-- Submit Button -->
          <button type="submit"
            class="w-full text-white bg-neon-blue hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano font-medium rounded-md text-sm px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Flowbite cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
  <!-- Tailwind colors -->
  <script src="./assets/tailwind.config.js"></script>
</body>

</html>