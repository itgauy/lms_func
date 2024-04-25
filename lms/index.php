<?php
session_start();

if (isset($_SESSION['user'])) {
  $UserType = $_SESSION['UserType'];
  if ($UserType == 'Student') {
    header('Location: student/home');
  } elseif ($UserType == 'Admin') {
    header('Location: admin/home');
  } elseif ($UserType == 'Instructor') {
    header('Location: instructor/home');
  }
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Management System | Login</title>
  <!-- Tailwind cdn -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <!-- Flowbite cdn -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <!-- Icon -->
  <link rel="icon" type="image/png" href="./assets/images/LMS-logo.png" />
  <!-- Css link -->
  <link rel="stylesheet" href="./assets/style.css">
</head>

<body class="bg-ghost-white">
  <div class="h-screen grid md:grid-cols-2">
    <!-- Left side -->
    <!-- bg-gradient-to-t from-violet-50 to-violet-300 , alternative incase magkaproblem sa screen size  -->
    <div class="col-span-1 hidden md:block">
      <div id="default-carousel" class="relative w-full h-full" data-carousel="slide">
        <!-- Carousel wrapper -->
        <div class="relative h-full overflow-hidden">
          <!-- Comment this out for a gradient color background instead of this image -->
          <img src="./assets/images/illustration-background.png" class="object-cover w-full h-full block absolute"
            alt="Illustration Background">
          <!-- Illustration 1 -->
          <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src="./assets/images/learn-illustration.png"
              class="absolute block pr-[8rem] w-[33rem] flex justify-center h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
              alt="">
          </div>
          <!-- Illustration 2 -->
          <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src="./assets/images/educate-illustration.png"
              class="absolute block pr-[10rem] w-[46rem] pb-24 flex justify-center h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
              alt="">
          </div>
          <!-- Illustration 3 -->
          <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src="./assets/images/organize-illustration.png"
              class="absolute block pr-[13rem] w-[50rem] flex justify-center h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
              alt="">
          </div>
          <!-- Illustration 4 -->
          <div class="hidden duration-1000 ease-in-out" data-carousel-item>
            <img src="./assets/images/empower-illustration.png"
              class="absolute block pr-[10rem] w-[38rem] flex justify-center h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
              alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- Right side -->
    <div class="col-span-1 p-12">
      <span class="inline-flex items-center">
        <img src="./assets/images/LMS-logo.png" alt="LMS Logo" class="h-9 w-auto mr-6">
        <h3 class="font-medium text-deep-koamaru text-xl">Learning Management System</h3>
      </span>
      <!-- Greeting -->
      <div class="flex-col flex items-center justify-center h-full">
        <h1 class="font-bold text-deep-koamaru text-4xl mb-8">Welcome to LMS!</h1>
        <div class="w-full max-w-sm p-4 bg-white rounded-2xl drop-shadows sm:p-6 md:p-8">
          <!-- Form -->
          <?php
          if (isset($_SESSION['error'])) {
            echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
            unset($_SESSION['error']);
          }
          if (isset($_GET['message']) && $_GET['message'] == 'success') {
            echo "<p style='color:green'>You successfully changed your password.</p>";
          }

          ?>
          <form class="space-y-3" action="Models/login_users.php" method="post">
            <h5 class="text-xl font-medium text-deep-koamaru mb-7">Sign In to your account</h5>
            <!-- Username Input -->
            <label for="user" class="block text-sm font-medium text-deep-koamaru">Username</label>
            <div class="flex">
              <span
                class="inline-flex items-center px-3 text-sm text-witty-blue bg-ghost-lavender border rounded-e-0 border-lavender rounded-s-md">
                <svg class="w-6 h-6 text-witty-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd"
                    d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z"
                    clip-rule="evenodd" />
                </svg>
              </span>
              <input type="text" id="user" name="user"
                class="rounded-none rounded-e-md bg-ghost-white border text-deep-koamaru focus:ring-neon-blue focus:border-neon-blue block flex-1 min-w-0 w-full text-sm border-lavender p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                placeholder="Your username" required>
            </div>
            <!-- Password Input -->
            <label for="password" class="block text-sm font-medium text-deep-koamaru pt-3">Password</label>
            <div class="flex">
              <span
                class="inline-flex items-center px-3 text-sm text-witty-blue bg-ghost-lavender border rounded-e-0 border-lavender rounded-s-md">
                <svg class="w-6 h-6 text-witty-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd"
                    d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7c0-1.1.9-2 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6c.6 0 1 .4 1 1v3a1 1 0 1 1-2 0v-3c0-.6.4-1 1-1Z"
                    clip-rule="evenodd" />
                </svg>
              </span>
              <input type="password" id="pass" name="pass"
                class="rounded-none rounded-e-md bg-ghost-white border text-deep-koamaru focus:ring-neon-blue focus:border-neon-blue block flex-1 min-w-0 w-full text-sm border-lavender p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                placeholder="Your password">
            </div>
            <!-- Show and Forgot Password container -->
            <div class="flex justify-between pb-4">
              <div class="flex items-start">
                <div class="flex items-center h-5">
                  <input id="remember" type="checkbox" onclick="togglePasswordVisibility()" value=""
                    class="w-4 h-4 border border-lavender rounded bg-ghost-white focus:ring-3 focus:ring-neon-blue text-neon-blue cursor-pointer transition ease-in-out duration-300">
                </div>
                <label for="remember" class="ms-2 text-sm font-medium text-deep-koamaru">Show Password</label>
              </div>
              <a href="./forgot-password.php" data-popover-target="forgot-pass-popover" data-popover-placement="bottom"
                class="text-neon-blue hover:underline text-sm font-medium">Forgot Password?</a>
            </div>
            <!-- Error Message for validation -->
            <!-- <p class="text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oh, snapp!</span> Some error message.</p> -->
            <!-- Login Button -->
            <button type="submit"
              class="w-full text-white bg-neon-blue hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano font-medium rounded-md text-sm px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Login</button>
            <!-- Popver for admin login link -->
            <div data-popover id="forgot-pass-popover" role="tooltip"
              class="absolute z-10 invisible inline-block w-64 text-sm text-deep-koamaru transition-opacity duration-300 bg-white border border-quartz rounded-lg shadow-sm opacity-0">
              <div class="px-3 py-2 bg-ghost-white border-b border-quartz rounded-t-lg">
                <h3 class="font-semibold text-deep-koamaru">Forgot Password Page</h3>
              </div>
              <div class="px-3 py-2">
                <p class="text-deep-koamaru">Click this link and you'll be directed to the forgot password page.</p>
              </div>
              <div data-popper-arrow></div>
            </div>
          </form>
        </div>
        <!-- Footer -->
        <span id="year" class="block text-sm text-deep-koamaru sm:text-center mt-11"></span>
      </div>
    </div>
  </div>
  <script>
    // For password visibility
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('pass');
      passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }
    // Footer date
    document.addEventListener('DOMContentLoaded', function () {
      const yearSpan = document.getElementById('year');
      const currentYear = new Date().getFullYear();
      yearSpan.innerHTML = `© ${currentYear} <a href="https://qcu.edu.ph/" data-popover-target="qcu-popover" class="hover:underline text-neon-blue" target="_blank">LMS</a>. All Rights Reserved.`;
    });
  </script>
  <!-- Flowbite cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <!-- Tailwind colors -->
  <script src="./assets/tailwind.config.js"></script>
  <script>
    window.onload = function () {
      history.pushState({}, null, "http://localhost/lms/");
    }
  </script>
</body>

</html>