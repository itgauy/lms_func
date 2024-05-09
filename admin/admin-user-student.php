<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: ../index');  //IF NOT YET LOGGED IN
  exit;
}
if (isset($_SESSION['user'])) {
  $UserType = $_SESSION['UserType'];
  if ($UserType == 'Student') {
    header('Location: ../student/home');
  } elseif ($UserType == 'Instructor') {
    header('Location: ../instructor/home');
    exit;
  }
}

if (isset($_GET['sn'])) {
  include '../models/config.php';
  $studentNum = $_GET['sn'];
  $sql = "SELECT * FROM Students_Tbl WHERE StudentNum = '$studentNum'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Fetch the data
    $row = $result->fetch_assoc();
    // JSON HEHE
    echo json_encode($row);
  } else {
    echo "No results found";
  }

  $conn->close();
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Management System | Admin User - Student</title>
  <!-- Tailwind cdn -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <!-- Flowbite cdn -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <!-- Icon -->
  <link rel="icon" type="image/png" href="../assets/images/LMS-logo.png" />
  <!-- Css link -->
  <link rel="stylesheet" href="../assets/style.css">
</head>
<!-- Admin side/navigation bar -->
<?php
include_once './side-nav-bar.php';
?>

<body class="bg-ghost-white">
  <div class="p-4 sm:ml-64 h-screen flex flex-col">
    <div class="pt-4 px-5 mt-14 flex-grow flex flex-col">
      <h1 class="font-bold text-4xl text-corn-flower-blue">Student List</h1>
      <!-- Main Container -->
      <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-6 pt-8">
        <!-- Register new account -->
        <button type="button" data-modal-target="register-modal" data-modal-toggle="register-modal"
          class="px-5 py-2.5 text-sm font-medium inline-flex items-center rounded-md bg-neon-blue text-white cursor-pointer transition ease-in-out duration-300 hover:scale-105 hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano">
          <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 24 24">
            <path fill-rule="evenodd"
              d="M8 7V2.2a2 2 0 0 0-.5.4l-4 3.9a2 2 0 0 0-.3.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.1a5 5 0 0 0-4.7 1.4l-6.7 6.6a3 3 0 0 0-.8 1.6l-.7 3.7a3 3 0 0 0 3.5 3.5l3.7-.7a3 3 0 0 0 1.5-.9l4.2-4.2V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
              clip-rule="evenodd" />
            <path fill-rule="evenodd"
              d="M17.4 8a1 1 0 0 1 1.2.3 1 1 0 0 1 0 1.6l-.3.3-1.6-1.5.4-.4.3-.2Zm-2.1 2.1-4.6 4.7-.4 1.9 1.9-.4 4.6-4.7-1.5-1.5ZM17.9 6a3 3 0 0 0-2.2 1L9 13.5a1 1 0 0 0-.2.5L8 17.8a1 1 0 0 0 1.2 1.1l3.7-.7c.2 0 .4-.1.5-.3l6.6-6.6A3 3 0 0 0 18 6Z"
              clip-rule="evenodd" />
          </svg>
          Register
        </button>
        <!-- Main modal -->
        <div id="register-modal" data-modal-backdrop="static" tabindex="-1"
          class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-2xl shadow py-4">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-indigo-100">
                <h1 class="text-4xl font-bold text-corn-flower-blue">
                  Create account and Enroll
                </h1>
                <!-- Close modal -->
                <button type="button"
                  class="rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center text-neon-blue focus:outline-none hover:bg-ghost-lavender focus:ring-4 focus:ring-deep-lav-blue transition ease-in-out duration-300 hover:scale-105 cursor-pointer"
                  data-modal-toggle="register-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
              </div>
              <!-- Modal body -->
              <form class="p-6 bg-white" action="../models/add_student.php" method="post">
                <!-- Student number -->
                <div class="grid gap-6 mb-6 md:grid-cols-7">
                  <div class="col-span-2">
                    <label for="req" class="text-sm font-medium text-red-500"><b>
                        Required *</b></label><br>
                    <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Student
                      number:<b class="text-red-500"> *</b></label>
                    <input type="text" id="sn" name="sn"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      pattern="[0-9]{2}-[0-9]{4}" placeholder="XX-XXXX" required>
                  </div>
                </div>
                <!-- Personal data section -->
                <hr class="h-px my-4 bg-indigo-100 border-0 border-indigo-100">
                <h3 class="text-2xl font-medium text-deep-koamaru mb-6">
                  Personal
                </h3>
                <div class="grid gap-6 mb-6 md:grid-cols-7">
                  <!-- First name -->
                  <div class="col-span-2">
                    <label for="first-name" class="block mb-2 text-sm font-medium text-deep-koamaru">First name:<b
                        class="text-red-500"> *</b></label>
                    <input type="text" id="fname" name="fname"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="Juan" required>
                  </div>
                  <!-- Middle name -->
                  <div class="col-span-2">
                    <label for="middle-name" class="block mb-2 text-sm font-medium text-deep-koamaru">Middle
                      name</label>
                    <input type="text" id="mname" name="mname"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="Dela">
                  </div>
                  <!-- Last name -->
                  <div class="col-span-2">
                    <label for="last-name" class="block mb-2 text-sm font-medium text-deep-koamaru">Last name:<b
                        class="text-red-500"> *</b></label>
                    <input type="text" id="lname" name="lname"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="Dela Cruz" required>
                  </div>
                  <!-- Suffix -->
                  <div class="col-span-1">
                    <label for="suffix" class="block mb-2 text-sm font-medium text-deep-koamaru">Suffix</label>
                    <select id="suffix" name="suffix"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300">
                      <option value="" selected>Select</option>
                      <option value="JR.">JR.</option>
                      <option value="SR.">SR.</option>
                      <option value="II">II</option>
                      <option value="III">III</option>
                    </select>
                  </div>
                  <!-- Birth date -->
                  <div class="col-span-2">
                    <label for="birth-date" class="block mb-2 text-sm font-medium text-deep-koamaru">Date of
                      birth:<b class="text-red-500"> *</b></label>
                    <div class="relative max-w-sm">
                      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-moody-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                          fill="currentColor" viewBox="0 0 20 20">
                          <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                      </div>
                      <input datepicker datepicker-autohide type="date" id="dob" name="dob"
                        class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full ps-10 p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                        placeholder="Select date" required>
                    </div>
                  </div>
                </div>
                <!-- Academic data section -->
                <hr class="h-px my-4 bg-indigo-100 border-0 border-indigo-100">
                <h3 class="text-2xl font-medium text-deep-koamaru mb-6">
                  Academic
                </h3>
                <div class="grid gap-6 mb-6 md:grid-cols-7">
                  <!-- Program -->
                  <div class="col-span-2">
                    <label for="program" class="block mb-2 text-sm font-medium text-deep-koamaru">Program:<b
                        class="text-red-500"> *</b></label>
                    <?php
                    include '../models/config.php';
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    $sql = "SELECT * FROM Programs_Tbl ORDER BY updated_at DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      echo '<select id="prog" name="prog" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" required>';
                      echo '<option value="" selected disabled>Select</option>';
                      while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["ProgramCode"] . '">' . $row["ProgramCode"] . '</option>';
                      }
                      echo '</select>';
                    } else {
                      echo '0 results';
                    }
                    $conn->close();
                    ?>

                  </div>
                  <!-- Year level -->
                  <div class="col-span-2">
                    <label for="year-level" class="block mb-2 text-sm font-medium text-deep-koamaru">Year level:<b
                        class="text-red-500"> *</b></label>
                    <select id="yrLvl" name="yrLvl"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      required>
                      <option value="" selected disabled value>Select</option>
                      <option value="1ST YEAR">1ST YEAR</option>
                      <option value="2ND YEAR">2ND YEAR</option>
                      <option value="3RD YEAR">3RD YEAR</option>
                      <option value="4TH YEAR">4TH YEAR</option>
                    </select>
                  </div>
                  <!-- Classification -->
                  <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-deep-koamaru class">Classification:<b
                        class="text-red-500"> *</b></label>
                    <div class="flex mt-4">
                      <div class="flex items-center me-10">
                        <input id="regular" type="radio" id="reg" value="REGULAR" name="class"
                          class="w-4 h-4 text-neon-blue bg-ghost-white border-lavender focus:ring-neon-blue focus:ring-2 cursor-pointer transition duration-300 ease-in-out"
                          onchange="toggleSectionReadonly(false); addRequiredLabel()" required>
                        <label for="regular" class="class ms-2 text-sm font-medium text-deep-koamaru">Regular</label>
                      </div>
                      <div class="flex items-center me-4">
                        <input id="irregular" type="radio" id="irreg" value="IRREGULAR" name="class"
                          class="w-4 h-4 text-neon-blue bg-ghost-white border-lavender focus:ring-neon-blue focus:ring-2 cursor-pointer transition duration-300 ease-in-out"
                          onchange="toggleSectionReadonly(true); removeRequiredLabel()">
                        <label for="irregular"
                          class=" class ms-2 text-sm font-medium text-deep-koamaru">Irregular</label>
                      </div>
                    </div>
                  </div>
                  <!-- Section -->
                  <div class="col-span-1">
                    <label for="section" class="block mb-2 text-sm font-medium text-deep-koamaru">Section:<span
                        id="sectionRequired"></span></label>
                    <input type="text" id="section" name="section"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="SBIT-1A" required readonly>
                  </div>
                </div>
                <!-- Account data section -->
                <hr class="h-px my-4 bg-indigo-100 border-0 dark:border-indigo-100">
                <h3 class="text-2xl font-medium text-deep-koamaru mb-6">
                  Account
                </h3>
                <div class="grid gap-6 mb-6 md:grid-cols-7">
                  <!-- Email address -->
                  <div class="col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-deep-koamaru">Email address:<b
                        class="text-red-500"> *</b></label>
                    <input type="email" id="email" name="email"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="juan.dela.cruz@gmail.com" required>
                  </div>
                  <!-- Username -->
                  <div class="col-span-2">
                    <label for="username" class="block mb-2 text-sm font-medium text-deep-koamaru">Username</label>
                    <input type="text" id="user" name="user"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="(Auto-Generated)" required readonly>
                  </div>
                  <!-- Temporary password -->
                  <div class="col-span-2">
                    <label for="password" class="block mb-2 text-sm font-medium text-deep-koamaru">Temporary
                      password</label>
                    <input type="text" id="pass" name="pass"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="(Auto-Generated)" required readonly>
                  </div>
                </div>

                <!-- Modal footer -->
                <div class="border-t border-indigo-100 pt-6">
                  <!-- Register button -->
                  <button data-modal-target="register-confirmation-modal"
                    data-modal-toggle="register-confirmation-modal" type="button"
                    class="text-white bg-neon-blue hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano font-medium rounded-md text-sm px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Register</button>
                  <!-- Cancel button -->
                  <button data-modal-hide="register-modal" type="button"
                    class="ms-3 text-neon-blue bg-ghost-lavender hover:bg-lavender-blue focus:ring-4 focus:outline-none focus:ring-deep-lav-blue rounded-md text-sm font-medium px-5 py-2.5 focus:z-10 transition duration-300 ease-in-out hover:scale-105">Cancel</button>
                </div>
                <!-- Confirmation Modal Content -->
                <div id="register-confirmation-modal" tabindex="-1" data-modal-backdrop="static"
                  class="hidden fixed inset-0 flex items-center justify-center z-50 overflow-y-auto overflow-x-hidden backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
                  <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-2xl py-8">
                      <div class="p-4 md:p-5">
                        <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <h3 class="mb-12 text-lg font-normal text-center px-6 text-deep-koamaru">Are you sure you want
                          to
                          register and
                          enroll the account?</h3>
                        <div class="gap-4 flex justify-center">
                          <button data-modal-hide="register-confirmation-modal" type="submit" id="konperm" class="
                          text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none
                          focus:ring-blue-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7
                          py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                            Yes
                          </button>
                          <button data-modal-hide="register-confirmation-modal" type="button" id="kansel"
                            class="text-deep-koamaru bg-transparent border border-purple-blue hover:bg-ghost-lavender focus:ring-4 focus:outline-none focus:ring-perano font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">No</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- // Confirmation Modal Content -->
              </form>
            </div>
          </div>
        </div>
        <!-- // Main Modal -->
        <!-- Success Modal -->
        <div id="success-modal" tabindex="-1" data-modal-backdrop="static"
          class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-8">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-green-500 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-center text-deep-koamaru">Student account registered and
                  enrolled
                  successfully!</h3>
                <div class="flex justify-center">
                  <button data-modal-hide="success-modal" type="button" id="oktyyy"
                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                    OK
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- // Success Modal -->
        <!-- Search and filter bar -->
        <div class="flex">
          <!-- <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your</label> -->
          <button id="dropdown-button" data-dropdown-toggle="dropdown"
            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white bg-neon-blue rounded-s-md hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano transition ease-in-out duration-300"
            type="button">All programs
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 4 4 4-4" />
            </svg>
          </button>
          <!-- programs dropdown - tabi ng search bar -->
          <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg drop-shadows w-44">
            <ul class="py-2 text-sm text-deep-koamaru" aria-labelledby="dropdown-button">
              <li>
                <button type="button"
                  class="inline-flex w-full px-4 py-2 hover:bg-ghost-white hover:text-neon-blue transition duration-300 ease-in-out">BSIT</button>
              </li>
              <li>
                <button type="button"
                  class="inline-flex w-full px-4 py-2 hover:bg-ghost-white hover:text-neon-blue transition duration-300 ease-in-out">BSCS</button>
              </li>
              <li>
                <button type="button"
                  class="inline-flex w-full px-4 py-2 hover:bg-ghost-white hover:text-neon-blue transition duration-300 ease-in-out">BSIS</button>
              </li>
            </ul>
          </div>
          <div class="relative w-[15rem]">
            <!-- Search -->
            <input type="search" id="search-dropdown"
              class="block p-2.5 w-full z-20 text-sm border border-lavender text-deep-koamaru bg-lav-sant rounded-e-lg focus:ring-neon-blue focus:border-neon-blue placeholder-moody-blue transition ease-in-out duration-300"
              placeholder="Search...">
            <!-- Search Button -->
            <button type="submit"
              class="absolute top-0 end-0 p-2.5 px-4 text-sm font-medium h-full text-white bg-neon-blue rounded-e-md hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano transition duration-300 ease-in-out">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
              <span class="sr-only">Search</span>
            </button>
          </div>
        </div>
      </div>
      <!-- Tab Component for Enrolled and Unenrolled -->
      <div class="mb-4">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center transition duration-300 ease-in-out"
          id="default-tab" data-tabs-toggle="tab-content" role="tablist" data-tabs-inactive-classes="text-moody-blue"
          data-tabs-active-classes="text-neon-blue border-neon-blue bg-ghost-lavender">
          <li class="me-2" role="presentation">
            <button
              class="inline-block px-4 py-2 hover:bg-ghost-lavender transition duration-300 ease-in-out border-b-2 rounded-t-lg"
              id="enrolled-table-tab" data-tabs-target="#enrolled" type="button" role="tab" aria-controls="enrolled"
              aria-selected="false">Enrolled</button>
          </li>
          <li class="me-2" role="presentation">
            <button
              class="inline-block px-4 py-2 hover:bg-ghost-lavender transition duration-300 ease-in-out border-b-2 rounded-t-lg"
              id="unenrolled-table-tab" data-tabs-target="#unenrolled" type="button" role="tab"
              aria-controls="unenrolled" aria-selected="false">Unenrolled</button>
          </li>
        </ul>
      </div>
      <!-- Enrolled Table -->
      <div id="tab-content">
        <div class="hidden relative overflow-x-auto sm:rounded-lg" id="enrolled" role="tabpanel"
          aria-labelledby="enrolled-table-tab">
          <div class="max-h-[480px] overflow-y-auto">
            <table class="w-full text-sm text-left rtl:text-right text-deep-koamaru">
              <thead class="text-xs text-corn-flower-blue uppercase bg-ghost-lavender sticky top-0">
                <tr>
                  <th scope="col" class="px-4 py-3">
                    Student name
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Student number
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Program
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Classification
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Year
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Section
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../models/config.php';
                // Fetch data from Students_Tbl
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                $sql = "SELECT s.* FROM Students_Tbl s JOIN Users_Tbl u ON s.Username = u.Username WHERE u.Status='ACTIVE' ORDER BY updated_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Output data of each row                      ENROLLED
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr class='bg-white border-b border-indigo-100'>";
                    echo '<td style="display:none;">' . $row["Username"] . '</td>';
                    echo '<th scope="row" class="px-4 py-4 font-medium text-deep-koamaru whitespace-nowrap">' . $row["FirstName"] . " " . $row["MiddleName"] . " " . $row["LastName"] . " " . $row["Suffix"] . "</th>";
                    echo '<td class="px-4 py-4 truncate">' . $row["StudentNum"] . "</td>";
                    echo '<td class="px-4 py-4 truncate">' . $row["Program"] . "</td>";
                    echo '<td class="pl-4 py-4 truncate">' . $row["Class"] . "</td>";
                    echo '<td class="px-4 py-4 truncate">' . $row["YrLvl"] . "</td>";
                    echo '<td class="px-4 py-4 truncate">' . $row["Section"] . "</td>";
                    echo "<td class='flex items-center px-4 py-4'><button data-modal-target='edit-student-modal' data-modal-toggle='edit-student-modal' class='edit-button font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</button>";
                    echo "<button data-modal-target='unenroll-modal' data-modal-toggle='unenroll-modal' class='unenrolls font-medium text-red-600 dark:text-red-500 hover:underline ms-3'>Unenroll</button></td>";
                    echo "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo '<td class="px-4 py-4">0 results</td>';
                }
                $conn->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Edit Student Modal -->
        <div id="edit-student-modal" data-modal-backdrop="static" tabindex="-1"
          class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-2xl shadow">
              <!-- Modal header -->
              <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-indigo-100">
                <h1 class="text-4xl font-bold text-corn-flower-blue">
                  Edit Account
                </h1>
                <!-- Close modal -->
                <button type="button"
                  class="rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center text-neon-blue focus:outline-none hover:bg-ghost-lavender focus:ring-4 focus:ring-deep-lav-blue transition ease-in-out duration-300 hover:scale-105 cursor-pointer"
                  data-modal-toggle="edit-student-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                  </svg>
                  <span class="sr-only">Close modal</span>
                </button>
              </div>
              <!-- Modal body -->
              <!-- Your edit form here -->
              <form class="p-6 bg-white" action="../models/edit_student.php" method="post">
                <!-- Student number -->
                <div class="grid gap-6 mb-6 md:grid-cols-7">
                  <div class="col-span-2">
                    <label for="req" class="text-sm font-medium text-red-500"><b>
                        Required *</b></label><br>
                    <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Student
                      number:<b class="text-red-500"> *</b></label>
                    <input type="text" id="sn1" name="sn1"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      pattern="[0-9]{2}-[0-9]{4}" placeholder="XX-XXXX" required>
                  </div>
                </div>
                <!-- Personal data section -->
                <hr class="h-px my-4 bg-indigo-100 border-0 border-indigo-100">
                <h3 class="text-2xl font-medium text-deep-koamaru mb-6">
                  Personal
                </h3>
                <div class="grid gap-6 mb-6 md:grid-cols-7">
                  <!-- First name -->
                  <div class="col-span-2">
                    <label for="first-name" class="block mb-2 text-sm font-medium text-deep-koamaru">First name:<b
                        class="text-red-500"> *</b></label>
                    <input type="text" id="fname1" name="fname1"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="Juan" required>
                  </div>
                  <!-- Middle name -->
                  <div class="col-span-2">
                    <label for="middle-name" class="block mb-2 text-sm font-medium text-deep-koamaru">Middle
                      name</label>
                    <input type="text" id="mname1" name="mname1"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="Dela">
                  </div>
                  <!-- Last name -->
                  <div class="col-span-2">
                    <label for="last-name" class="block mb-2 text-sm font-medium text-deep-koamaru">Last name:<b
                        class="text-red-500"> *</b></label>
                    <input type="text" id="lname1" name="lname1"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="Dela Cruz" required>
                  </div>
                  <!-- Suffix -->
                  <div class="col-span-1">
                    <label for="suffix" class="block mb-2 text-sm font-medium text-deep-koamaru">Suffix</label>
                    <select id="suffix1" name="suffix1"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300">
                      <option value="" selected>Select</option>
                      <option value="JR.">JR.</option>
                      <option value="SR.">SR.</option>
                      <option value="II">II</option>
                      <option value="III">III</option>
                    </select>
                  </div>
                  <!-- Birth date -->
                  <div class="col-span-2">
                    <label for="birth-date" class="block mb-2 text-sm font-medium text-deep-koamaru">Date of
                      birth:<b class="text-red-500"> *</b></label>
                    <div class="relative max-w-sm">
                      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-moody-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                          fill="currentColor" viewBox="0 0 20 20">
                          <path
                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                      </div>
                      <input datepicker datepicker-autohide type="date" id="dob1" name="dob1"
                        class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full ps-10 p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                        placeholder="Select date" required>
                    </div>
                  </div>
                </div>
                <!-- Academic data section -->
                <hr class="h-px my-4 bg-indigo-100 border-0 border-indigo-100">
                <h3 class="text-2xl font-medium text-deep-koamaru mb-6">
                  Academic
                </h3>
                <div class="grid gap-6 mb-6 md:grid-cols-7">
                  <!-- Program -->
                  <div class="col-span-2">
                    <label for="program" class="block mb-2 text-sm font-medium text-deep-koamaru">Program:<b
                        class="text-red-500"> *</b></label>
                    <?php
                    include '../models/config.php';
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);

                    $sql = "SELECT * FROM Programs_Tbl ORDER BY updated_at DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      echo '<select id="prog1" name="prog1" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" required>';
                      echo '<option value="" selected disabled>Select</option>';
                      while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row["ProgramCode"] . '">' . $row["ProgramCode"] . '</option>';
                      }
                      echo '</select>';
                    } else {
                      echo '0 results';
                    }
                    $conn->close();
                    ?>

                  </div>
                  <!-- Year level -->
                  <div class="col-span-2">
                    <label for="year-level" class="block mb-2 text-sm font-medium text-deep-koamaru">Year level:<b
                        class="text-red-500"> *</b></label>
                    <select id="yrLvl1" name="yrLvl1"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      required>
                      <option value="" selected disabled value>Select</option>
                      <option value="1ST YEAR">1ST YEAR</option>
                      <option value="2ND YEAR">2ND YEAR</option>
                      <option value="3RD YEAR">3RD YEAR</option>
                      <option value="4TH YEAR">4TH YEAR</option>
                    </select>
                  </div>
                  <!-- Classification -->
                  <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-deep-koamaru class">Classification:<b
                        class="text-red-500"> *</b></label>
                    <div class="flex mt-4">
                      <div class="flex items-center me-10">
                        <input id="regular1" type="radio" value="REGULAR" name="class1"
                          class="w-4 h-4 text-neon-blue bg-ghost-white border-lavender focus:ring-neon-blue focus:ring-2 cursor-pointer transition duration-300 ease-in-out"
                          onchange="toggleSectionReadonly(false); addRequiredLabel1()" required>
                        <label for="regular1" class="class ms-2 text-sm font-medium text-deep-koamaru">Regular</label>
                      </div>
                      <div class="flex items-center me-4">
                        <input id="irregular1" type="radio" value="IRREGULAR" name="class1"
                          class="w-4 h-4 text-neon-blue bg-ghost-white border-lavender focus:ring-neon-blue focus:ring-2 cursor-pointer transition duration-300 ease-in-out"
                          onchange="toggleSectionReadonly(true); removeRequiredLabel1()">
                        <label for="irregular1"
                          class=" class ms-2 text-sm font-medium text-deep-koamaru">Irregular</label>
                      </div>
                    </div>
                  </div>
                  <!-- Section -->
                  <div class="col-span-1">
                    <label for="section" class="block mb-2 text-sm font-medium text-deep-koamaru">Section:<span
                        id="sectionRequired1"></span></label>
                    <input type="text" id="section1" name="section1"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="SBIT-1A" required readonly>
                  </div>
                </div>
                <!-- Account data section -->
                <hr class="h-px my-4 bg-indigo-100 border-0 dark:border-indigo-100">
                <h3 class="text-2xl font-medium text-deep-koamaru mb-6">
                  Account
                </h3>
                <div class="grid gap-6 mb-6 md:grid-cols-7">
                  <!-- Email address -->
                  <div class="col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-deep-koamaru">Email address:<b
                        class="text-red-500"> *</b></label>
                    <input type="email" id="email1" name="email1"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="juan.dela.cruz@gmail.com" required>
                  </div>
                  <!-- Username -->
                  <div class="col-span-2">
                    <label for="username" class="block mb-2 text-sm font-medium text-deep-koamaru">Username</label>
                    <input type="text" id="user1" name="user1"
                      class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                      placeholder="(Auto-Generated)" required readonly>
                  </div>
                </div>
                <!-- Modal footer -->
                <div class="border-t border-indigo-100 pt-6">
                  <!-- Register button -->
                  <button data-modal-target="edit-confirmation-modal" data-modal-toggle="edit-confirmation-modal"
                    type="button" id="save_change"
                    class="text-white bg-neon-blue hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano font-medium rounded-md text-sm px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Save
                    Changes</button>
                  <!-- Cancel button -->
                  <button data-modal-hide="edit-student-modal" type="button"
                    class="ms-3 text-neon-blue bg-ghost-lavender hover:bg-lavender-blue focus:ring-4 focus:outline-none focus:ring-deep-lav-blue rounded-md text-sm font-medium px-5 py-2.5 focus:z-10 transition duration-300 ease-in-out hover:scale-105">Cancel</button>
                </div>
                <!-- Confirmation Modal Content -->
                <div id="edit-confirmation-modal" tabindex="-1" data-modal-backdrop="static"
                  class="hidden fixed inset-0 flex items-center justify-center z-50 overflow-y-auto overflow-x-hidden backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
                  <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-2xl py-8">
                      <div class="p-4 md:p-5">
                        <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true"
                          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        <h3 class="mb-12 text-lg font-normal text-center px-6 text-deep-koamaru">Are you sure you want
                          to
                          edit this account?</h3>
                        <div class="gap-4 flex justify-center">
                          <button data-modal-hide="edit-confirmation-modal" type="submit" id="konperm1" class="
                          text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none
                          focus:ring-blue-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7
                          py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                            Yes
                          </button>
                          <button data-modal-hide="edit-confirmation-modal" type="button" id="kansel1"
                            class="text-deep-koamaru bg-transparent border border-purple-blue hover:bg-ghost-lavender focus:ring-4 focus:outline-none focus:ring-perano font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">No</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- // Confirmation Modal Content -->
              </form>
            </div>
          </div>
        </div>
        <!-- // Edit Student Modal -->
        <!-- Success Modal -->
        <div id="edit-success-modal" tabindex="-1" data-modal-backdrop="static"
          class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-8">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-green-500 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-center text-deep-koamaru">Student account edited
                  successfully!</h3>
                <div class="flex justify-center">
                  <button data-modal-hide="edit-success-modal" type="button" id="oktyyy"
                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                    OK
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- // Success Modal -->
        <!-- Unenroll Confirmation Modal -->
        <div id="unenroll-modal" tabindex="-1" data-modal-backdrop="static"
          class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-8">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center px-6">Are you sure you want to
                  unenroll this student?</h3>
                <div class="gap-4 flex justify-center">
                  <button data-modal-hide="unenroll-modal" data-modal-target="unenroll-success-modal"
                    data-modal-toggle="unenroll-success-modal" type="button"
                    class="unenroll-button text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                    Yes
                  </button>
                  <button data-modal-hide="unenroll-modal" type="button"
                    class="text-deep-koamaru bg-transparent border border-purple-blue hover:bg-ghost-lavender focus:ring-4 focus:outline-none focus:ring-perano font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">No</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Unenroll Success Modal -->
        <div id="unenroll-success-modal" tabindex="-1" data-modal-backdrop="static"
          class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-8">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-green-500 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center">Student unenrolled successfully!
                </h3>
                <div class="flex justify-center">
                  <button data-modal-hide="unenroll-success-modal" type="button"
                    class="confirm-unenroll text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                    OK
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Unenrolled Table -->
        <div class="hidden relative overflow-x-auto sm:rounded-lg" id="unenrolled" role="tabpanel"
          aria-labelledby="unenrolled-table-tab">
          <div class="max-h-[480px] overflow-y-auto">
            <table class="w-full text-sm text-left rtl:text-right text-deep-koamaru">
              <thead class="text-xs text-corn-flower-blue uppercase bg-ghost-lavender sticky top-0">
                <tr>
                  <th scope="col" class="px-4 py-3">
                    Student name
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Student number
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Program
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Classification
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Year
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Section
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Actions
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                include '../models/config.php';
                // Fetch data from Students_Tbl
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                $sql = "SELECT s.* FROM Students_Tbl s JOIN Users_Tbl u ON s.Username = u.Username WHERE u.Status='INACTIVE' ORDER BY updated_at DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  // Output data of each row                          UNENROLLED
                  while ($row = $result->fetch_assoc()) {
                    echo "<tr class='bg-white border-b border-indigo-100'>";
                    echo '<td style="display:none;">' . $row["Username"] . '</td>';
                    echo '<th scope="row" class="px-4 py-4 font-medium text-deep-koamaru whitespace-nowrap">' . $row["FirstName"] . " " . $row["MiddleName"] . " " . $row["LastName"] . " " . $row["Suffix"] . "</th>";
                    echo '<td class="px-4 py-4 truncate">' . $row["StudentNum"] . "</td>";
                    echo '<td class="px-4 py-4 truncate">' . $row["Program"] . "</td>";
                    echo '<td class="pl-4 py-4 truncate">' . $row["Class"] . "</td>";
                    echo '<td class="px-4 py-4 truncate">' . $row["YrLvl"] . "</td>";
                    echo '<td class="px-4 py-4 truncate">' . $row["Section"] . "</td>";
                    echo "<td class='flex items-center px-4 py-4'><button data-modal-target='enroll-modal' data-modal-toggle='enroll-modal' class='enrolls font-medium text-blue-600 dark:text-blue-500 hover:underline'>Enroll</button>";
                    echo "<button onclick=\"openArchiveModal('" . $row["StudentNum"] . "', '" . $row["Username"] . "')\" data-modal-target='archive-modal' data-modal-toggle='archive-modal' class='archives font-medium text-red-600 dark:text-red-500 hover:underline ms-3'>Archive</button></td>";
                    echo "</td>";
                    echo "</tr>";
                  }
                } else {
                  echo '<td class="px-4 py-4">0 results</td>';
                }
                $conn->close();
                ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- Archive Confirmation Modal -->
        <div id="archive-modal" tabindex="-1"
          class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-7 px-7">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <form onsubmit="return checkStudentNumber()" id="noReload">
                  <h3 class="mb-8 text-lg font-normal text-deep-koamaru text-center px-6">Are you sure you want to
                    archive
                    this account? To confirm, type <b id='student-number-modal'></b> in the box below.</h3>
                  <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Enter
                    here:</label>
                  <input type="text" id="student-number-input"
                    class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300"
                    placeholder="XX-XXXX" required>
                  <div id="error-message" class="text-red-500"></div>
                  <div class="flex gap-4 pt-8">
                    <!-- Cancel -->
                    <button data-modal-hide="archive-modal" type="button" id="removeLabelist"
                      class="w-full text-deep-koamaru bg-transparent focus:outline-none hover:bg-ghost-lavender border border-purple-blue focus:ring-4 focus:ring-perano font-medium rounded-md text-base px-5 py-2.5 transition ease-in-out duration-300 hover:scale-105">Cancel</button>
                    <!-- Continue -->
                    <button onclick="checkStudentNumber()" type="submit"
                      class="archive-button w-full text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none text-base focus:ring-red-300 font-medium rounded-md px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Archive</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Archive Success Modal -->
        <div id="archive-success-modal" tabindex="-1"
          class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-8">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-green-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center">Account archived successfully!</h3>
                <div class="flex justify-center">
                  <button type="button" id="okina-archive"
                    class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                    OK
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Enroll Confirmation Modal -->
        <div id="enroll-modal" tabindex="-1" data-modal-backdrop="static"
          class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-8">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center px-6">Are you sure you want to
                  enroll this student?</h3>
                <div class="gap-4 flex justify-center">
                  <button data-modal-hide="enroll-modal" data-modal-target="enroll-success-modal"
                    data-modal-toggle="enroll-success-modal" type="button"
                    class="enroll-button text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                    Yes
                  </button>
                  <button data-modal-hide="enroll-modal" type="button"
                    class="text-deep-koamaru bg-transparent border border-purple-blue hover:bg-ghost-lavender focus:ring-4 focus:outline-none focus:ring-perano font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">No</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Enroll Success Modal -->
        <div id="enroll-success-modal" tabindex="-1" data-modal-backdrop="static"
          class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-8">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-green-500 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center">Student enrolled successfully!
                </h3>
                <div class="flex justify-center">
                  <button data-modal-hide="unenroll-success-modal" type="button"
                    class="confirm-enroll text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                    OK
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- //END MODAL -->
      </div>
    </div>
  </div>

  <!-- Flowbite cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <!-- Tailwind colors -->
  <script src="../assets/tailwind.config.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    // For changing ng URL para hindi lagi nag oopen yung modal
    var okButton = document.getElementById("oktyyy");
    var okArch = document.getElementById("okina-archive");

    // Add click event listener to the "OK" button OKAY?!
    okButton.addEventListener("click", function () {
      // Change URL ng hindi nag rereload (PUSHSTATE PATANDAAN QUACKOVERFLOW >:c)
      history.pushState({}, null, "http://localhost/lms/admin/admin-user-student");
    });
    okArch.addEventListener("click", function () {
      // Change URL ng hindi nag rereload (PUSHSTATE PATANDAAN QUACKOVERFLOW >:c)
      history.pushState({}, null, "http://localhost/lms/admin/admin-user-student");
    });

    $(document).ready(function () {

      // ETO I-UUNENROLL STUDENT
      $(".unenrolls").click(function () {
        var username = $(this).closest('tr').find('td:first').text();
        $(".unenroll-button").data('username', username);
      });

      $(".unenroll-button").click(function () {
        var username = $(this).data('username');
        $.ajax({
          url: '../models/update_status.php',
          type: 'post',
          data: {
            username: username,
            status: 'INACTIVE'
          },
          success: function (response) {
            if (response == 1) {
              console.log("YAY");
            } else {
              console.log("OHNO");
            }
          }
        });
      });
      $(".confirm-unenroll").click(function () {
        location.reload(); // reload the page
      });

      // ETO SA ANO TO SA PAG ENROLL ULET GALING UNENROLL
      $(".enrolls").click(function () {
        var username = $(this).closest('tr').find('td:first').text();
        $(".enroll-button").data('username', username);
      });

      $(".enroll-button").click(function () {
        var username = $(this).data('username');
        $.ajax({
          url: '../models/update_status.php',
          type: 'post',
          data: {
            username: username,
            status: 'ACTIVE'
          },
          success: function (response) {
            if (response == 1) {
              console.log("YAY");
            } else {
              console.log("OHNO");
            }
          }
        });
      });
      $(".confirm-enroll").click(function () {
        location.reload(); // reload the page
      });

      // ETO NAMAN FORDA ARCHIVE NA BYE BYE STUDENT
    });


    // FORDA SN NG STUDENT SA ARCHIVE
    var user; // Declare username in the global scope

    function openArchiveModal(studentNum, username) {
      user = username; // PLSSS Dito ako pinaka nahirapan, declare ng global para kung ano cinlick yun maselect :')
      document.getElementById('student-number-modal').innerText = studentNum;
    }

    document.getElementById('noReload').addEventListener('submit', function (event) {
      event.preventDefault();
      checkStudentNumber();
    });

    function checkStudentNumber() {
      var input = document.getElementById('student-number-input').value;
      var currentStudentNumber = document.getElementById('student-number-modal').innerText;
      if (input !== currentStudentNumber) {
        if (input !== '') {
          document.getElementById('error-message').innerText = 'Student Number do not match.';
        }
        return false;
      } else {
        window.location.href = '../models/archive.php?username=' + user;
      }
    }



    var remub = document.getElementById('removeLabelist');

    remub.addEventListener('click', function () {
      document.getElementById('error-message').innerText = '';
    });

    var sn1 = document.getElementById('sn1');
    sn1.addEventListener('input', function (e) {
      var target = e.target;
      var value = target.value.replace(/[^\d]/g, ''); //remove non-digits
      if (value.length > 6) value = value.slice(0, 6); //limit to 6 digits
      if (value.length > 2) value = value.slice(0, 2) + '-' + value.slice(2); //insert ng dash after second digit
      target.value = value;
    });
  </script>
  <script src="../controllers/edit_student.js"></script>
  <script src="../controllers/add_student.js"></script>

  <script>
    // This part is for fetching the data for the edit button of the student
    $(document).ready(function () {
      $('.edit-button').click(function () {
        // Get yung student number nung cinlick na row ng edit
        var row = $(this).closest('tr');

        // Fetch yun stduent numbber
        var studentNum = row.find('td:eq(1)').text(); // Adjust the index based on your table structure

        // my fav AJAX to fetch data
        $.ajax({
          url: 'admin-user-student.php', // The PHP file that fetches the data
          type: 'get',
          data: { sn: studentNum },
          success: function (response) {
            // Response here are the students data
            // Parse JSON (JavaScript Object Notation na hindi ko alam para saan) #QuackOverflow
            var student = JSON.parse(response);

            // Population ng fields
            $('#sn1').val(student.StudentNum);
            $('#fname1').val(student.FirstName);
            $('#mname1').val(student.MiddleName);
            $('#lname1').val(student.LastName);
            $('#suffix1').val(student.Suffix);
            $('#dob1').val(student.BirthDate);
            $('#prog1').val(student.Program);
            $('#class1').val(student.Class);
            $('#section1').val(student.Section);
            $('#email1').val(student.Email);
            $('#password1').val(student.Password);
            $('#yrLvl1').val(student.YrLvl);
            $('#user1').val(student.Username);
            // FORDA RADIO BUTTON SA CLASSIFIKASYON
            if (student.Class === 'REGULAR') {
              $('#regular1').prop('checked', true);
            } else if (student.Class === 'IRREGULAR') {
              $('#irregular1').prop('checked', true);
            }

          }
        });
      });
    });

  </script>


</body>

</html>