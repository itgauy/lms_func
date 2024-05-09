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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Management System | Course Management</title>
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
  <div class="p-4 sm:ml-64">
    <div class="pt-4 px-5 rounded-2xl mt-14">
      <div class="flex items-center justify-between">
        <span class="space-y-2">
          <h1 class="font-bold text-4xl text-corn-flower-blue">BS in Information Technology</h1>
          <h5 class="font-medium text-xl text-deep-koamaru">2nd Year, 2nd Semester</h5>
        </span>
      </div>
      <!-- Add Course butones -->
      <button class="inline-flex gap-1 items-center justify-center pl-3 pr-4 py-2 bg-neon-blue text-white font-medium cursor-pointer transition ease-in-out duration-300 hover:scale-105 rounded-md hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano mt-12" data-modal-target="add-course-modal" data-modal-toggle="add-course-modal">
        <svg class="w-5 h-5 mr-1 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
        </svg>
        Add Course
      </button>
      <!-- Add Course Modal -->
      <div id="add-course-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
        <div class="relative p-4 w-full max-w-md max-h-full">
          <div class="relative bg-white rounded-2xl py-7 px-7">
            <div class="p-4 md:p-5">
              <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
              <h3 class="mb-8 text-lg font-normal text-deep-koamaru text-center px-6">Type kekeburichi to add a
                courserist.</h3>
              <!-- Course Code -->
              <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Course
                Code:</label>
              <input type="text" id="first-name" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="SE101" required><br>
              <!-- Course Title -->
              <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Course
                Title:</label>
              <input type="text" id="first-name" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="Software Engineering" required><br>
              <!-- Course Unit -->
              <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Course
                Unit:</label>
              <input type="text" id="first-name" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="3" required>
              <div class="flex gap-4 pt-8">
                <!-- Cancel -->
                <button data-modal-hide="add-course-modal" type="button" class="w-full text-deep-koamaru bg-transparent focus:outline-none hover:bg-ghost-lavender border border-purple-blue focus:ring-4 focus:ring-perano font-medium rounded-md text-base px-5 py-2.5 transition ease-in-out duration-300 hover:scale-105">Cancel</button>
                <!-- Continue -->
                <button data-modal-hide="add-course-modal" data-modal-target="add-course-success-modal" data-modal-toggle="add-course-success-modal" type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none text-base focus:ring-blue-300 font-medium rounded-md px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Add</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- // Add Course Modal -->
      <!-- Add Course Success Modal -->
      <div id="add-course-success-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
        <div class="relative p-4 w-full max-w-md max-h-full">
          <div class="relative bg-white rounded-2xl py-8">
            <div class="p-4 md:p-5">
              <svg class="mx-auto mb-4 text-green-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
              </svg>
              <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center">Course added successfully!
              </h3>
              <div class="flex justify-center">
                <button data-modal-hide="add-course-success-modal" type="button" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                  OK
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- // Add Course Success Modal -->
      <!-- Cards Man Container -->
      <div class="grid grid-cols-3 mt-12 gap-6">
        <!-- Course Card 1 -->
        <div class="relative block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex flex-col justify-between">
          <a href="./course-content-management.php">
            <div class="relative">
              <img src="../assets/images/course-card-illustration.png" class="rounded-xl w-full" alt="Course Card Illustration" draggable="false">
              <h5 class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 mb-3 text-4xl font-bold tracking-tight text-white">
                SE101</h5>
            </div>
            <h5 class="mt-7 text-2xl font-medium tracking-tight text-corn-flower-blue">Software Engineering</h5>
            <!-- Semester Indicator -->
          </a>
          <div class="flex justify-between items-center mt-4">
            <span class="inline-flex items-center bg-ghost-lavender text-neon-blue text-sm font-medium px-4 py-2 rounded-full">
              3 Units
            </span>
            <!-- Action Buttons -->
            <button type="button" id="dropdown-menu-1" data-dropdown-toggle="dropdown-menu" data-dropdown-placement="right" class="text-deep-koamaru hover:bg-ghost-lavender hover:text-neon-blue focus:ring-4 focus:outline-none focus:ring-deep-lav-blue focus:bg-ghost-lavender font-medium rounded-full text-sm p-2 text-center inline-flex items-center transition duration-300 ease-in-out">
              <svg class="w-7 h-7 text-deep-koamaru" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01" />
              </svg>
              <span class="sr-only">Actions</span>
            </button>
          </div>
        </div>
        <!-- Dropdown Content for Course -->
        <div id="dropdown-menu" class="z-10 hidden bg-white divide-y divide-indigo-100 rounded-lg drop-shadows w-auto">
          <ul class="py-2 text-sm text-deep-koamaru" aria-labelledby="dropdown-menu-1">
            <li>
              <button class="w-full px-4 py-2 font-medium hover:bg-ghost-white hover:text-neon-blue transtion duration-300 ease-in-out" data-modal-target="edit-course-modal" data-modal-toggle="edit-course-modal">Edit
                Course</a>
              </button>
            </li>
            <li>
              <button class="w-full px-4 py-2 font-medium hover:bg-ghost-white hover:text-neon-blue transtion duration-300 ease-in-out" data-modal-target="archive-course-modal" data-modal-toggle="archive-course-modal">Archive
                Course</a>
              </button>
            </li>
          </ul>
        </div>
        <!-- // Dropdown Content for Course -->
        <!-- Edit Course Modal -->
        <div id="edit-course-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-7 px-7">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-8 text-lg font-normal text-deep-koamaru text-center px-6">Type kekeburichi to edit a
                  courserist.</h3>
                <!-- Course Code -->
                <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Course
                  Code:</label>
                <input type="text" id="first-name" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="SE101" required><br>
                <!-- Course Title -->
                <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Course
                  Title:</label>
                <input type="text" id="first-name" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="Software Engineering" required><br>
                <!-- Course Unit -->
                <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Course
                  Unit:</label>
                <input type="text" id="first-name" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="3" required>
                <div class="flex gap-4 pt-8">
                  <!-- Cancel -->
                  <button data-modal-hide="edit-course-modal" type="button" class="w-full text-deep-koamaru bg-transparent focus:outline-none hover:bg-ghost-lavender border border-purple-blue focus:ring-4 focus:ring-perano font-medium rounded-md text-base px-5 py-2.5 transition ease-in-out duration-300 hover:scale-105">Cancel</button>
                  <!-- Continue -->
                  <button data-modal-hide="edit-course-modal" data-modal-target="edit-course-success-modal" data-modal-toggle="edit-course-success-modal" type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none text-base focus:ring-blue-300 font-medium rounded-md px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Edit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- // Edit Course Modal -->
        <!-- Edit Course Success Modal -->
        <div id="edit-course-success-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-8">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-green-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center">Course edited successfully!
                </h3>
                <div class="flex justify-center">
                  <button data-modal-hide="edit-course-success-modal" type="button" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                    OK
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- // Edit Course Success Modal -->
        <!-- Archive Course Confirmation Modal -->
        <div id="archive-course-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-7 px-7">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center px-6">Enter your kemeruterist in
                  order to archive the courserist, papara papa.</h3>
                <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Mcdo
                  yamberjer</label>
                <input type="text" id="first-name" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="Mcdo vs. Jabee" required>
                <div class="flex gap-4 pt-8">
                  <!-- Cancel -->
                  <button data-modal-hide="archive-course-modal" type="button" class="w-full text-deep-koamaru bg-transparent focus:outline-none hover:bg-ghost-lavender border border-purple-blue focus:ring-4 focus:ring-perano font-medium rounded-md text-base px-5 py-2.5 transition ease-in-out duration-300 hover:scale-105">Cancel</button>
                  <!-- Continue -->
                  <button data-modal-hide="archive-course-modal" data-modal-target="archive-course-success-modal" data-modal-toggle="archive-course-success-modal" type="submit" class="w-full text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none text-base focus:ring-red-300 font-medium rounded-md px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Archive</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- // Archive Course Confirmation Modal -->
        <!-- Archive Coourse Success Modal -->
        <div id="archive-course-success-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-8">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-green-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center">Course archived successfully!
                </h3>
                <div class="flex justify-center">
                  <button data-modal-hide="archive-course-success-modal" type="button" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                    OK
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- // Archive Coourse Success Modal -->
      </div>
    </div>
  </div>

  <!-- Flowbite cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <!-- Tailwind colors -->
  <script src="../assets/tailwind.config.js"></script>
</body>

</html>