<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Management System | Admin Layout</title>
  <!-- Tailwind cdn -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <!-- Flowbite cdn -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <!-- Icon -->
  <link rel="icon" type="image/png" href="../assets/images/LMS-logo.png" />
  <!-- Css link -->
  <link rel="stylesheet" href="../assets/style.css">
  <style>
    .ProseMirror:focus {
      outline: none;
    }

    .tiptap ul p,
    .tiptap ol p {
      display: inline;
    }

    .tiptap p.is-editor-empty:first-child::before {
      font-size: 14px;
      content: attr(data-placeholder);
      float: left;
      height: 0;
      pointer-events: none;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="bg-ghost-white">
  <!-- Top navigation -->
  <nav class="fixed top-0 z-50 w-full bg-lav-sant border-b border-lavender-blue">
    <div class="px-3 py-4 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start rtl:justify-end">
          <!-- Sidebar responsive -->
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
              </path>
            </svg>
          </button>
          <a href="#" class="flex ms-2 md:me-24">
            <img src="../assets/images/LMS-logo.png" class="h-7 me-5" alt="LMS Logo" />
            <span class="self-center text-xl font-semibold sm:text-lg whitespace-nowrap text-corn-flower-blue">Learning
              Management System</span>
          </a>
        </div>
        <div class="flex items-center">
          <!-- Notication bell sample -->
          <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="relative inline-flex items-center text-sm font-medium text-center text-deep-koamaru hover:text-neon-blue transition duration-300 ease-in-out focus:outline-none mr-3 focus:text-neon-blue" type="button">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
              <path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
            </svg>
            <div class="absolute block w-3 h-3 bg-red-500 border-2 border-lav-sant rounded-full -top-0.5 start-2.5">
            </div>
          </button>
          <!-- Dropdown menu ng notif bell-->
          <div id="dropdownNotification" class="z-20 hidden w-full max-w-sm bg-white divide-y divide-indigo-100 rounded-2xl drop-shadows" aria-labelledby="dropdownNotificationButton">
            <div class="block px-4 py-2 font-medium text-center text-deep-koamaru rounded-t-2xl bg-white">
              Notifications
            </div>
            <div class="divide-y divide-indigo-100">
              <a href="#" class="flex px-4 py-3 hover:bg-lav-sant transition duration-300 ease-in-out">
                <div class="flex-shrink-0">
                  <img class="w-11 h-auto rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                  <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-lime-600 border border-white rounded-full">
                    <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                      <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                      <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                    </svg>
                  </div>
                </div>
                <div class="w-full ps-3">
                  <div class="text-deep-koamaru text-sm mb-1.5">New task from <span class="font-bold text-deep-koamaru">Professor Manandeg</span>: "SE101 - Midterm Quiz 1"</div>
                  <div class="text-xs text-neon-blue">a few moments ago</div>
                </div>
              </a>
              <a href="#" class="flex px-4 py-3 hover:bg-lav-sant transition duration-300 ease-in-out">
                <div class="flex-shrink-0">
                  <img class="w-11 h-auto rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                  <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-lime-600 border border-white rounded-full">
                    <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                      <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                      <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                    </svg>
                  </div>
                </div>
                <div class="w-full ps-3">
                  <div class="text-deep-koamaru text-sm mb-1.5">New material from <span class="font-bold text-deep-koamaru">Professor Manandeg</span>: "SE101 - Midterm Week 3"</div>
                  <div class="text-xs text-neon-blue">10 minutes ago</div>
                </div>
              </a>
              <a href="#" class="flex px-4 py-3 hover:bg-lav-sant transition duration-300 ease-in-out">
                <div class="flex-shrink-0">
                  <img class="w-11 h-auto rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                  <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-lime-600 border border-white rounded-full">
                    <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                      <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                      <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                    </svg>
                  </div>
                </div>
                <div class="w-full ps-3">
                  <div class="text-deep-koamaru text-sm mb-1.5">New material from <span class="font-bold text-deep-koamaru">Professor Manandeg</span>: "SE101 - Midterm Week 2"</div>
                  <div class="text-xs text-neon-blue">44 minutes ago</div>
                </div>
              </a>
              <a href="#" class="flex px-4 py-3 hover:bg-lav-sant transition duration-300 ease-in-out">
                <div class="flex-shrink-0">
                  <img class="w-11 h-auto rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                  <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-lime-600 border border-white rounded-full">
                    <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                      <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                      <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z" />
                    </svg>
                  </div>
                </div>
                <div class="w-full ps-3">
                  <div class="text-deep-koamaru text-sm mb-1.5">New task from <span class="font-bold text-deep-koamaru">Professor Manandeg</span>: "SE101 - Midterm Activity 1"</div>
                  <div class="text-xs text-neon-blue">1 hour ago</div>
                </div>
              </a>
            </div>
            <a href="#" class="block py-2 text-sm font-medium text-center text-deep-koamaru rounded-b-2xl bg-white hover:bg-lav-sant hover:text-neon-blue transtion duration-300 ease-in-out">
              <div class="inline-flex items-center hover:text-neon-blue">
                <svg class="w-4 h-4 me-2 text-deep-koamaru hover:text-neon-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                  <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                </svg>
                View all
              </div>
            </a>
          </div>
          <!-- TODO: Notification Content -->
          <div class="flex items-center ms-3">
            <div>
              <!-- Profile sa taas -->
              <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-700 hover:bg-neon-blue transition duration-300 ease-in-out rounded-full md:me-0 focus:ring-4 focus:ring-perano focus:bg-neon-blue" type="button">
                <span class="sr-only">Open user menu</span>
                <svg class="w-6 h-6 text-lav-sant" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd" />
                </svg>
              </button>
              <!-- Dropdown menu -->
              <div id="dropdownAvatar" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-2xl drop-shadows w-56">
                <div class="px-4 py-3 text-sm text-deep-koamaru flex flex-col justify-center items-center">
                  <img class="w-14 h-auto rounded-full mb-3" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                  <div class="font-medium"><?php echo $_SESSION['fullname']; ?></div>
                  <div class="truncate"><?php echo $_SESSION['email']; ?></div>
                </div>
                <ul class="py-2 text-sm font-medium text-deep-koamaru text-center" aria-labelledby="dropdownUserAvatarButton">
                  <li>
                    <a href="./admin-settings.php" class="block px-4 py-2 hover:bg-ghost-white hover:text-neon-blue transtion duration-300 ease-in-out">Settings</a>
                  </li>
                  <li>
                    <a data-modal-target="sign-out-modal" data-modal-toggle="sign-out-modal" class="block px-4 py-2 hover:bg-ghost-white hover:text-neon-blue transtion duration-300 ease-in-out cursor-pointer">Log
                      out</a>
                  </li>
                </ul>
              </div>
              <!-- Sign Out Modal -->
              <div id="sign-out-modal" tabindex="-1" data-modal-backdrop="static" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
                <div class="relative p-4 w-full max-w-md max-h-full">
                  <div class="relative bg-white rounded-2xl py-8">
                    <div class="p-4 md:p-5">
                      <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                      <h3 class="mb-12 text-lg font-normal text-center text-deep-koamaru px-6">Are you sure you want
                        to logout?</h3>
                      <div class="gap-4 flex justify-center">
                        <a href="../models/logout.php/" data-modal-hide="sign-out-modal" class="text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                          Yes
                        </a>
                        <button data-modal-hide="sign-out-modal" type="button" class="text-deep-koamaru bg-transparent border border-purple-blue hover:bg-ghost-lavender focus:ring-4 focus:outline-none focus:ring-perano font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">No</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- // Sign Out Modal -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- Left Sidebar -->
  <aside id="logo-sidebar" class="fixed top-0 left-0 z-30 w-64 h-screen pt-20 transition-transform -translate-x-full bg-lav-sant border-r border-lavender-blue sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-lav-sant">
      <ul class="space-y-2 font-medium">
        <li>
          <!-- Link -->
          <a href="./home" class="flex items-center p-3 text-corn-flower-blue rounded-lg hover:bg-ghost-lavender group transition duration-300 ease-in-out hover:text-neon-blue">
            <svg class="w-5 h-5 text-corn-flower-blue group-hover:text-neon-blue transition duration-300 ease-in-out" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M4.857 3A1.857 1.857 0 0 0 3 4.857v4.286C3 10.169 3.831 11 4.857 11h4.286A1.857 1.857 0 0 0 11 9.143V4.857A1.857 1.857 0 0 0 9.143 3H4.857Zm10 0A1.857 1.857 0 0 0 13 4.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 9.143V4.857A1.857 1.857 0 0 0 19.143 3h-4.286Zm-10 10A1.857 1.857 0 0 0 3 14.857v4.286C3 20.169 3.831 21 4.857 21h4.286A1.857 1.857 0 0 0 11 19.143v-4.286A1.857 1.857 0 0 0 9.143 13H4.857Zm10 0A1.857 1.857 0 0 0 13 14.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 21 19.143v-4.286A1.857 1.857 0 0 0 19.143 13h-4.286Z" clip-rule="evenodd" />
            </svg>
            <span class="ms-3">Dashboard</span>
          </a>
        </li>
        <!-- Programs Button -->
        <button class="flex items-center w-full p-3 text-base text-corn-flower-blue rounded-lg group hover:bg-ghost-lavender transition duration-300 ease-in-out hover:text-neon-blue justify-between" data-popover-target="programs-popover" data-popover-placement="right">
          <div class="flex justify-center items-center" data-modal-target="programs-modal" data-modal-toggle="programs-modal">
            <svg class="flex-shrink-0 w-5 h-5 text-corn-flower-blue transition duration-75 group-hover:text-neon-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2c.6 0 1-.4 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
            </svg>
            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-corn-flower-blue hover:text-neon-blue">Programs</span>
          </div>
        </button>
        <!-- // Programs Button -->
        <!-- Programs Popover -->
        <div data-popover id="programs-popover" role="tooltip" class="absolute z-10 invisible inline-block w-auto text-sm text-gray-500 transition-opacity duration-300 bg-white rounded-lg shadow-[10px_10px_30px_-16px_rgba(224,227,246)] opacity-0">
          <div class="px-3 py-2.5 bg-white border-b border-gray-200 rounded-t-lg">
            <h3 class="font-medium text-base text-deep-koamaru">Programs</h3>
          </div>
          <div class="px-3 py-1">
            <?php
            include '../models/config.php';
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            $sql = "SELECT * FROM Programs_Tbl ORDER BY updated_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo '<ul class="py-2 grid grid-flow-col grid-rows-3 gap-3">';
              while ($row = $result->fetch_assoc()) {
                echo '<li class="row-span-1">';
                echo '<button data-modal-target="year-term-modal" data-modal-toggle="year-term-modal" class="flex justify-center items-center w-full p-2 px-12 text-corn-flower-blue transition duration-300 ease-in-out rounded-lg hover:bg-ghost-lavender bg-ghost-white hover:text-neon-blue">' . $row["ProgramCode"] . '</button>';
                echo '</li>';
              }
              echo '</ul>';
            } else {
              echo '0 results';
            }
            $conn->close();
            ?>
          </div>
          <div data-popper-arrow></div>
        </div>
        <!-- // Programs Popover -->
        <!-- Users -->
        <button type="button" class="flex items-center w-full p-3 text-base text-corn-flower-blue rounded-lg group hover:bg-ghost-lavender transition duration-300 ease-in-out hover:text-neon-blue" data-popover-target="users-popover" data-popover-placement="right">
          <svg class="flex-shrink-0 w-5 h-5 text-corn-flower-blue transition duration-75 group-hover:text-neon-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z" clip-rule="evenodd" />
          </svg>
          <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-corn-flower-blue hover:text-neon-blue">Users</span>
        </button>
        <!-- // User -->
        <!-- Users Popover -->
        <div data-popover id="users-popover" role="tooltip" class="absolute z-10 invisible inline-block w-auto text-sm text-gray-500 transition-opacity duration-300 bg-white rounded-lg shadow-[10px_10px_30px_-16px_rgba(224,227,246)] opacity-0">
          <div class="px-3 py-2.5 bg-white border-b border-gray-200 rounded-t-lg">
            <h3 class="font-medium text-base text-deep-koamaru">Users</h3>
          </div>
          <div class="px-3 py-1">
            <ul class="py-2 grid grid-flow-col grid-rows-3 gap-3">
              <li class="row-span-1">
                <a href="./admin-user-student" type="button" class="flex justify-center items-center w-full p-2 px-12 text-corn-flower-blue transition duration-300 ease-in-out rounded-lg hover:bg-ghost-lavender bg-ghost-white hover:text-neon-blue">Student</a>
              </li>
              <li class="row-span-1">
                <a href="./admin-user-instructor" type="button" class="flex justify-center items-center w-full p-2 px-12 text-corn-flower-blue transition duration-300 ease-in-out rounded-lg hover:bg-ghost-lavender bg-ghost-white hover:text-neon-blue">Instructor</a>
              </li>
              <li class="row-span-1">
                <a href="./admin-user-admin" type="button" class="flex justify-center items-center w-full p-2 px-12 text-corn-flower-blue transition duration-300 ease-in-out rounded-lg hover:bg-ghost-lavender bg-ghost-white hover:text-neon-blue">Admin</a>
              </li>
            </ul>
          </div>
          <div data-popper-arrow></div>
        </div>
        <!-- // Users Popover -->
        <!-- Section -->
        <button type="button" class="flex items-center w-full p-3 text-base text-corn-flower-blue rounded-lg group hover:bg-ghost-lavender transition duration-300 ease-in-out hover:text-neon-blue" data-popover-target="sections-popover" data-popover-placement="right">
          <svg class="flex-shrink-0 w-5 h-5 text-corn-flower-blue transition duration-75 group-hover:text-neon-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd" />
          </svg>
          <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-corn-flower-blue hover:text-neon-blue">Sections</span>
        </button>
        <!-- // Section -->
        <!-- Section Popover -->
        <div data-popover id="sections-popover" role="tooltip" class="absolute z-10 invisible inline-block w-auto text-sm text-gray-500 transition-opacity duration-300 bg-white rounded-lg shadow-[10px_10px_30px_-16px_rgba(224,227,246)] opacity-0">
          <div class="px-3 py-2.5 bg-white border-b border-gray-200 rounded-t-lg">
            <h3 class="font-medium text-base text-deep-koamaru">Sections</h3>
          </div>
          <div class="px-3 py-1">
            <?php
            include '../models/config.php';
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            $sql = "SELECT * FROM Programs_Tbl ORDER BY updated_at DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              echo '<ul class="py-2 grid grid grid-flow-col grid-rows-3 gap-3">';
              while ($row = $result->fetch_assoc()) {
                echo '<li class="row-span-1">';
                echo '<button onclick="openSectionModal(\'' . $row["ProgramCode"] . '\')" data-modal-target="section-modal" data-modal-toggle="section-modal" class="clickProg flex justify-center items-center w-full p-2 px-12 text-corn-flower-blue transition duration-300 ease-in-out rounded-lg hover:bg-ghost-lavender bg-ghost-white hover:text-neon-blue">' . $row["ProgramCode"] . '</button>';
                echo '</li>';
              }
              echo '</ul>';
            } else {
              echo '0 results';
            }
            $conn->close();
            ?>
          </div>
          <div data-popper-arrow></div>
        </div>
        <!-- // Section Popover -->
        <!-- Activity Logs -->
        <li>
          <a href="./admin-activity-logs" class="flex items-center p-3 text-corn-flower-blue rounded-lg hover:bg-ghost-lavender group transition duration-300 ease-in-out hover:text-neon-blue">
            <svg class="w-5 h-5 text-corn-flower-blue group-hover:text-neon-blue transition duration-300 ease-in-out" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M8 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1h2a2 2 0 0 1 2 2v15a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h2Zm6 1h-4v2H9a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2h-1V4Zm-3 8a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Zm2 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-2-1a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2H9Z" clip-rule="evenodd" />
            </svg>
            <span class="ms-3">Activity Logs</span>
          </a>
        </li>
        <!-- Archive -->
        <li>
          <a href="./admin-archive" class="flex items-center p-3 text-corn-flower-blue rounded-lg hover:bg-ghost-lavender group transition duration-300 ease-in-out hover:text-neon-blue">
            <svg class="w-5 h-5 text-corn-flower-blue group-hover:text-neon-blue transition duration-300 ease-in-out" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M20 10H4v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8ZM9 13v-1h6v1a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1Z" clip-rule="evenodd" />
              <path d="M2 6a2 2 0 0 1 2-2h16a2 2 0 1 1 0 4H4a2 2 0 0 1-2-2Z" />
            </svg>
            <span class="ms-3">Archive</span>
          </a>
        </li>
        <!-- Announcement -->
        <li>
          <button class="w-full flex items-center p-3 text-corn-flower-blue rounded-lg hover:bg-ghost-lavender group transition duration-300 ease-in-out hover:text-neon-blue" data-modal-backdrop="static" data-modal-target="announcement-modal" data-modal-toggle="announcement-modal">
            <svg class="w-5 h-5 text-corn-flower-blue group-hover:text-neon-blue transition duration-300 ease-in-out" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
              <path fill-rule="evenodd" d="M18.458 3.11A1 1 0 0 1 19 4v16a1 1 0 0 1-1.581.814L12 16.944V7.056l5.419-3.87a1 1 0 0 1 1.039-.076ZM22 12c0 1.48-.804 2.773-2 3.465v-6.93c1.196.692 2 1.984 2 3.465ZM10 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6V8Zm0 9H5v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3Z" clip-rule="evenodd" />
            </svg>
            <span class="ms-3">Announcement</span>
          </button>
        </li>
      </ul>
    </div>
  </aside>
  <!-- Main Modal for Announcement -->
  <div id="announcement-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-2xl shadow">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-indigo-100">
          <h3 class="text-2xl font-bold text-corn-flower-blue">
            Post General Announcement
          </h3>
          <button type="button" id="" class="rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center text-neon-blue focus:outline-none hover:bg-ghost-lavender focus:ring-4 focus:ring-deep-lav-blue transition ease-in-out duration-300 hover:scale-105 cursor-pointer" data-modal-toggle="announcement-modal" data-modal-hide="announcement-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-8 md:p-5">
          <!-- Tiptap -->
          <div class="border border-purple-blue rounded-xl overflow-hidden">
            <div id="hs-editor-tiptap">
              <div class="flex align-middle gap-x-0.5 border-b border-purple-blue p-2 bg-ghost-white">
                <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-deep-koamaru dark:hover:bg-ghost-lavender" type="button" data-hs-editor-bold="">
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 12a4 4 0 0 0 0-8H6v8"></path>
                    <path d="M15 20a4 4 0 0 0 0-8H6v8Z"></path>
                  </svg>
                </button>
                <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-deep-koamaru dark:hover:bg-ghost-lavender" type="button" data-hs-editor-italic="">
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" x2="10" y1="4" y2="4"></line>
                    <line x1="14" x2="5" y1="20" y2="20"></line>
                    <line x1="15" x2="9" y1="4" y2="20"></line>
                  </svg>
                </button>
                <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-deep-koamaru dark:hover:bg-ghost-lavender" type="button" data-hs-editor-underline="">
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M6 4v6a6 6 0 0 0 12 0V4"></path>
                    <line x1="4" x2="20" y1="20" y2="20"></line>
                  </svg>
                </button>
                <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-deep-koamaru dark:hover:bg-ghost-lavender" type="button" data-hs-editor-strike="">
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 4H9a3 3 0 0 0-2.83 4"></path>
                    <path d="M14 12a4 4 0 0 1 0 8H6"></path>
                    <line x1="4" x2="20" y1="12" y2="12"></line>
                  </svg>
                </button>
                <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-deep-koamaru dark:hover:bg-ghost-lavender" type="button" data-hs-editor-link="">
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                  </svg>
                </button>
                <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-deep-koamaru dark:hover:bg-ghost-lavender" type="button" data-hs-editor-ol="">
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="10" x2="21" y1="6" y2="6"></line>
                    <line x1="10" x2="21" y1="12" y2="12"></line>
                    <line x1="10" x2="21" y1="18" y2="18"></line>
                    <path d="M4 6h1v4"></path>
                    <path d="M4 10h2"></path>
                    <path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"></path>
                  </svg>
                </button>
                <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-deep-koamaru dark:hover:bg-ghost-lavender" type="button" data-hs-editor-ul="">
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="8" x2="21" y1="6" y2="6"></line>
                    <line x1="8" x2="21" y1="12" y2="12"></line>
                    <line x1="8" x2="21" y1="18" y2="18"></line>
                    <line x1="3" x2="3.01" y1="6" y2="6"></line>
                    <line x1="3" x2="3.01" y1="12" y2="12"></line>
                    <line x1="3" x2="3.01" y1="18" y2="18"></line>
                  </svg>
                </button>
                <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-deep-koamaru dark:hover:bg-ghost-lavender" type="button" data-hs-editor-blockquote="">
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 6H3"></path>
                    <path d="M21 12H8"></path>
                    <path d="M21 18H8"></path>
                    <path d="M3 12v6"></path>
                  </svg>
                </button>
                <button class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-deep-koamaru dark:hover:bg-ghost-lavender" type="button" data-hs-editor-code="">
                  <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m18 16 4-4-4-4"></path>
                    <path d="m6 8-4 4 4 4"></path>
                    <path d="m14.5 4-5 16"></path>
                  </svg>
                </button>
              </div>

              <div class="h-[10rem] overflow-auto p-5" data-hs-editor-field=""></div>
            </div>
          </div>
          <!-- End Tiptap -->
          <!-- Post Button -->
          <div class="flex w-full justify-end items-center">
            <button type="button" class="mt-4 text-white bg-neon-blue hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano font-medium rounded-md text-sm px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Post</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- //Main Modal for Announcement -->
  <!-- Main Modal for Programs -->
  <div id="programs-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
    <div class="relative p-4 w-full max-w-5xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-ghost-white rounded-2xl shadow">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-indigo-100">
          <h3 class="text-2xl font-bold text-corn-flower-blue">
            Programs
          </h3>
          <button type="button" id="ex-programs" class="rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center text-neon-blue focus:outline-none hover:bg-ghost-lavender focus:ring-4 focus:ring-deep-lav-blue transition ease-in-out duration-300 hover:scale-105 cursor-pointer" data-modal-toggle="programs-modal" data-modal-hide="programs-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
          <div class="flex justify-end items-center gap-4 px-5 mb-6">
            <!-- Add Program -->
            <button class="inline-flex gap-1 items-center justify-center pl-3 pr-4 py-2 bg-neon-blue text-white font-medium cursor-pointer transition ease-in-out duration-300 hover:scale-105 rounded-md hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano" data-modal-target="add-program-modal" data-modal-toggle="add-program-modal">
              <svg class="w-5 h-5 mr-1 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
              </svg>
              Add
            </button>
          </div>
          <!-- Add Program Modal -->
          <div id="add-program-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
            <div class="relative p-4 w-full max-w-md max-h-full">
              <div class="relative bg-white rounded-2xl py-7 px-7">
                <div class="p-4 md:p-5">
                  <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  <h3 class="mb-8 text-md font-normal text-deep-koamaru text-center">By proceeding with this
                    action, you ensure all necessary approvals have been obtained and that the implications of this
                    addition have been thoroughly considered.</h3>
                  <form action="../models/add_program" method="post">
                    <!-- Program Code -->
                    <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Program
                      Code:</label>
                    <input type="text" id="progcode" name="progcode" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="BSCS" required><br>
                    <!-- Program Title -->
                    <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Program
                      Title:</label>
                    <input type="text" id="progtitle" name="progtitle" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="Bachelor of Science in Computer Shop" required>
                    <div class="flex gap-4 pt-8">
                      <!-- Cancel -->
                      <button data-modal-hide="add-program-modal" type="button" class="w-full text-deep-koamaru bg-transparent focus:outline-none hover:bg-ghost-lavender border border-purple-blue focus:ring-4 focus:ring-perano font-medium rounded-md text-base px-5 py-2.5 transition ease-in-out duration-300 hover:scale-105">Cancel</button>
                      <!-- Continue -->
                      <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none text-base focus:ring-blue-300 font-medium rounded-md px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Add</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Add Program Success Modal -->
          <!-- <div id="add-program-success-modal" tabindex="-1"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
            <div class="relative p-4 w-full max-w-md max-h-full">
              <div class="relative bg-white rounded-2xl py-8">
                <div class="p-4 md:p-5">
                  <svg class="mx-auto mb-4 text-green-400 w-16 h-16" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
                  </svg>
                  <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center">Program added successfully!</h3>
                  <div class="flex justify-center">
                    <button data-modal-hide="add-program-success-modal" type="button" id="add-success-ok"
                      class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                      OK
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <ul class="px-5 py-5 gap-6 grid grid-cols-3">
            <!-- Program Card 1 -->
            <?php
            include '../models/config.php';
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            $sql = "SELECT * FROM Programs_Tbl ORDER BY updated_at DESC";
            $result = $conn->query($sql);

            $counter = 1; // Initialize counter para lang maiba yung id nung dropdown, ayaw kasi gumana
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $dropdownId = "dropdown-button-" . $counter; // Unique id for each dropdown button
                $menuId = "dropdown-menu-" . $counter; // Unique id for each dropdown menu
                echo '<div class="relative block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex flex-col justify-between cursor-pointer">';
                echo '<div data-modal-target="year-term-modal" data-modal-toggle="year-term-modal">';
                echo '<h1 class="text-xl font-bold text-neon-blue bg-ghost-lavender px-4 py-3 rounded-xl text-center">' . $row["ProgramCode"] . '</h1>';
                echo '<h5 class="mt-4 text-base font-normal tracking-tight text-corn-flower-blue">' . $row["ProgramTitle"] . '</h5>';
                echo '</div>';
                echo '<div class="flex justify-end items-center">';
                echo '<button type="button" id="' . $dropdownId . '" data-dropdown-toggle="' . $menuId . '" data-dropdown-placement="right" class="text-deep-koamaru hover:bg-ghost-lavender hover:text-neon-blue focus:ring-4 focus:outline-none focus:ring-deep-lav-blue focus:bg-ghost-lavender font-medium rounded-full text-sm p-2 text-center inline-flex items-center transition duration-300 ease-in-out">';
                echo '<svg class="w-7 h-7 text-deep-koamaru" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">';
                echo '<path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 6h.01M12 12h.01M12 18h.01" />';
                echo '</svg>';
                echo '<span class="sr-only">Actions</span>';
                echo '</button>';
                echo '</div>';
                echo '</div>';
                echo '<div id="' . $menuId . '" class="z-10 hidden bg-white divide-y divide-indigo-100 rounded-lg drop-shadows w-auto">';
                echo '<ul class="py-2 text-sm text-deep-koamaru" aria-labelledby="dropdown-button-1">';
                echo '<li>';
                echo '<button class="w-full px-4 py-2 font-medium hover:bg-ghost-white hover:text-neon-blue transtion duration-300 ease-in-out" data-modal-target="edit-program-modal" data-modal-toggle="edit-program-modal">Edit Program</button>';
                echo '</li>';
                echo '<li>';
                echo '<button onclick=\'openProgArchiveModal("' . $row["ProgramCode"] . '")\' class="archives w-full px-4 py-2 font-medium hover:bg-ghost-white hover:text-neon-blue transtion duration-300 ease-in-out" data-modal-target="archive-program-modal" data-modal-toggle="archive-program-modal">Archive Program</button>';
                echo '</li>';
                echo '</ul>';
                echo '</div>';
                $counter++;
              }
            } else {
              echo '0 results';
            }
            $conn->close();
            ?>

            <!-- Edit Program Modal -->
            <div id="edit-program-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
              <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-2xl py-7 px-7">
                  <div class="p-4 md:p-5">
                    <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-8 text-lg font-normal text-deep-koamaru text-center px-6">Type kekeburichi to edit a
                      programerist.</h3>
                    <!-- Program Code -->
                    <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Program
                      Code:</label>
                    <input type="text" id="first-name" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="BSCS" required><br>
                    <!-- Program Title -->
                    <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Program
                      Title:</label>
                    <input type="text" id="first-name" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="Bachelor of Science in Computer Shop" required>
                    <div class="flex gap-4 pt-8">
                      <!-- Cancel -->
                      <button data-modal-hide="edit-program-modal" type="button" class="w-full text-deep-koamaru bg-transparent focus:outline-none hover:bg-ghost-lavender border border-purple-blue focus:ring-4 focus:ring-perano font-medium rounded-md text-base px-5 py-2.5 transition ease-in-out duration-300 hover:scale-105">Cancel</button>
                      <!-- Continue -->
                      <button data-modal-hide="edit-program-modal" data-modal-target="edit-program-success-modal" data-modal-toggle="edit-program-success-modal" type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none text-base focus:ring-blue-300 font-medium rounded-md px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Edit</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Edit Program Success Modal -->
            <div id="edit-program-success-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
              <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-2xl py-8">
                  <div class="p-4 md:p-5">
                    <svg class="mx-auto mb-4 text-green-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
                    </svg>
                    <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center">Program edited successfully!
                    </h3>
                    <div class="flex justify-center">
                      <button data-modal-hide="edit-program-success-modal" type="button" class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                        OK
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Archive Program Confirmation Modal -->
            <div id="archive-program-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-10 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
              <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-2xl py-7 px-7">
                  <div class="p-4 md:p-5">
                    <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <form onsubmit="return checkArchiveNumber()" id="noReloadProg">
                      <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center px-6">Are you sure you want to
                        archive
                        this account? To confirm, type <b id='archive-number'></b> in the box below.
                      </h3>
                      <label for="student-number" class="block mb-2 text-sm font-medium text-deep-koamaru">Enter
                        Here:</label>
                      <input type="text" id="program-number-input" class="bg-ghost-white border border-lavender text-deep-koamaru text-sm rounded-lg focus:ring-neon-blue focus:border-neon-blue block w-full p-2.5 placeholder-moody-blue transition ease-in-out duration-300" placeholder="" required>
                      <div id="error-message-prog" class="text-red-500"></div>
                      <div class="flex gap-4 pt-8">
                        <!-- Cancel -->
                        <button data-modal-hide="archive-program-modal" type="button" id="removeLabelListProg" class="w-full text-deep-koamaru bg-transparent focus:outline-none hover:bg-ghost-lavender border border-purple-blue focus:ring-4 focus:ring-perano font-medium rounded-md text-base px-5 py-2.5 transition ease-in-out duration-300 hover:scale-105">Cancel</button>
                        <!-- Continue -->
                        <button onclick="checkArchiveNumber()" type="submit" class="archive-button w-full text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none text-base focus:ring-red-300 font-medium rounded-md px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Archive</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- // -->
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Main modal for Year and Terms -->
  <div id="year-term-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
    <div class="relative p-4 w-full max-w-3xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-ghost-white rounded-2xl shadow">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-indigo-100">
          <h3 class="text-2xl font-bold text-corn-flower-blue">
            Year and Terms
          </h3>
          <button type="button" class="rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center text-neon-blue focus:outline-none hover:bg-ghost-lavender focus:ring-4 focus:ring-deep-lav-blue transition ease-in-out duration-300 hover:scale-105 cursor-pointer" data-modal-toggle="year-term-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
          <ul class="px-5 py-5 gap-4 grid grid-cols-2">
            <li class="col-span-1">
              <!-- 1st Year 1st Semester -->
              <a href="#" class="relative block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex justify-between items-center">
                <div class="block space-y-2">
                  <div class="w-full text-xl font-bold text-corn-flower-blue">1Y1</div>
                  <div class="w-full text-normal text-deep-koamaru">1st Year, 1st Semester</div>
                </div>
                <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </li>
            <li class="col-span-1">
              <!-- 1st Year 2nd Semester -->
              <a href="#" class="relative block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex justify-between items-center">
                <div class="block space-y-2">
                  <div class="w-full text-xl font-bold text-corn-flower-blue">1Y2</div>
                  <div class="w-full text-normal text-deep-koamaru">1st Year, 2nd Semester</div>
                </div>
                <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </li>
            <li class="col-span-1">
              <!-- 2nd Year 1st Semester -->
              <a href="#" class="relative block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex justify-between items-center">
                <div class="block space-y-2">
                  <div class="w-full text-xl font-bold text-corn-flower-blue">2Y1</div>
                  <div class="w-full text-normal text-deep-koamaru">2nd Year, 1st Semester</div>
                </div>
                <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </li>
            <li class="col-span-1">
              <!-- 2nd Year 2nd Semester -->
              <a href="./admin-course-management" class="relative block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex justify-between items-center">
                <div class="block space-y-2">
                  <div class="w-full text-xl font-bold text-corn-flower-blue">2Y2</div>
                  <div class="w-full text-normal text-deep-koamaru">2nd Year, 2nd Semester</div>
                </div>
                <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </li>
            <li class="col-span-1">
              <!-- 3rd Year 1st Semester -->
              <a href="#" class="relative block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex justify-between items-center">
                <div class="block space-y-2">
                  <div class="w-full text-xl font-bold text-corn-flower-blue">3Y1</div>
                  <div class="w-full text-normal text-deep-koamaru">3rd Year, 1st Semester</div>
                </div>
                <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </li>
            <li class="col-span-1">
              <!-- 3rd Year 2nd Semester -->
              <a href="#" class="relative block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex justify-between items-center">
                <div class="block space-y-2">
                  <div class="w-full text-xl font-bold text-corn-flower-blue">3Y2</div>
                  <div class="w-full text-normal text-deep-koamaru">3rd Year, 2nd Semester</div>
                </div>
                <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </li>
            <li class="col-span-1">
              <!-- 4th Year 1st Semester -->
              <a href="#" class="relative block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex justify-between items-center">
                <div class="block space-y-2">
                  <div class="w-full text-xl font-bold text-corn-flower-blue">4Y1</div>
                  <div class="w-full text-normal text-deep-koamaru">4th Year, 1st Semester</div>
                </div>
                <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </li>
            <li class="col-span-1">
              <!-- 4th Year 2nd Semester -->
              <a href="#" class="relative block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex justify-between items-center">
                <div class="block space-y-2">
                  <div class="w-full text-xl font-bold text-corn-flower-blue">4Y2</div>
                  <div class="w-full text-normal text-deep-koamaru">4th Year, 2nd Semester</div>
                </div>
                <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Main modal for Sections List -->
  <div id="section-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
    <div class="relative p-4 w-full max-w-xl max-h-full">
      <!-- Modal content -->
      <div class="relative bg-ghost-white rounded-2xl shadow">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-indigo-100">
          <h3 class="text-2xl font-bold text-corn-flower-blue">
            Sections List
          </h3>
          <button type="button" class="rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center text-neon-blue focus:outline-none hover:bg-ghost-lavender focus:ring-4 focus:ring-deep-lav-blue transition ease-in-out duration-300 hover:scale-105 cursor-pointer" data-modal-toggle="section-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 md:p-5">
          <div class="flex justify-end items-center gap-4 px-5 mb-6">
            <!-- Remove Section -->
            <button class="inline-flex gap-1 items-center justify-center pl-3 pr-4 py-2 bg-ghost-lavender text-neon-blue font-medium cursor-pointer transition ease-in-out duration-300 hover:scale-105 rounded-md hover:bg-lavender-blue focus:ring-4 focus:outline-none focus:ring-deep-lav-blue" data-modal-target="remove-section-modal" data-modal-toggle="remove-section-modal">
              <svg class="w-5 h-5 mr-1 text-neon-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14" />
              </svg>
              Remove
            </button>
            <!-- Add Section -->
            <button class="inline-flex gap-1 items-center justify-center pl-3 pr-4 py-2 bg-neon-blue text-white font-medium cursor-pointer transition ease-in-out duration-300 hover:scale-105 rounded-md hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano" data-modal-target="add-section-modal" data-modal-toggle="add-section-modal">
              <svg class="w-5 h-5 mr-1 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5" />
              </svg>
              Add
            </button>
          </div>
          <div id="sections-list">
            <!-- DITO LAGAY THE DATA YES -->
            <!-- PLEASE PA HEART REACT SA BABA :)) -->
          </div>
        </div>
        <!-- Add Section Modal -->
        <div id="add-section-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-7 px-7">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-8 text-md font-normal text-deep-koamaru text-center">
                  <b>Are you sure you want to add new sections?</b><br>
                  This will add new sections to each year levels and will be based on the existing sections if
                  applicable.
                </h3>
                <form action="" method="">
                  <div class="flex gap-4 pt-8">
                    <!-- Cancel -->
                    <button data-modal-hide="add-section-modal" type="button" class="w-full text-deep-koamaru bg-transparent focus:outline-none hover:bg-ghost-lavender border border-purple-blue focus:ring-4 focus:ring-perano font-medium rounded-md text-base px-5 py-2.5 transition ease-in-out duration-300 hover:scale-105">Cancel</button>
                    <!-- Continue -->
                    <button type="submit" data-modal-target="add-section-success-modal" data-modal-hide="add-section-modal" data-modal-toggle="add-section-success-modal" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none text-base focus:ring-blue-300 font-medium rounded-md px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Add</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- // Add Section Modal -->
        <!-- Add Section Success Modal -->
        <div id="add-section-success-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-8">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-green-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center">Section added successfully!</h3>
                <div class="flex justify-center">
                  <button data-modal-hide="add-section-success-modal" type="button" class="ok-section text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                    OK
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- // Add Section Success Modal -->
        <!-- Remove Section Modal -->
        <div id="remove-section-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-7 px-7">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-corn-flower-blue w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-8 text-md font-normal text-deep-koamaru text-center">
                  <b>Are you sure you want to delete sections?</b><br>
                  Just take note that by removing the last sections based on each year levels, this action can't be
                  undone.
                </h3>
                <form action="" method="">
                  <div class="flex gap-4 pt-8">
                    <!-- Cancel -->
                    <button data-modal-hide="remove-section-modal" type="button" class="w-full text-deep-koamaru bg-transparent focus:outline-none hover:bg-ghost-lavender border border-purple-blue focus:ring-4 focus:ring-perano font-medium rounded-md text-base px-5 py-2.5 transition ease-in-out duration-300 hover:scale-105">Cancel</button>
                    <!-- Continue -->
                    <button type="submit" data-modal-target="remove-section-success-modal" data-modal-hide="remove-section-modal" data-modal-toggle="remove-section-success-modal" class="w-full text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none text-base focus:ring-red-300 font-medium rounded-md px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105">Remove</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- // Remove Section Modal -->
        <!-- Remove Section Success Modal -->
        <div id="remove-section-success-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
          <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-2xl py-8">
              <div class="p-4 md:p-5">
                <svg class="mx-auto mb-4 text-green-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
                </svg>
                <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center">Section removed successfully!</h3>
                <div class="flex justify-center">
                  <button data-modal-hide="remove-section-success-modal" type="button" class="ok-section text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                    OK
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- // Remove Section Success Modal -->
      </div>
    </div>
  </div>
  <script>
    $('.ok-section').click(function() {
      location.reload();
    });
  </script>
  <script>
    // JS for state persistence of dropdown in sidebar
    document.addEventListener("DOMContentLoaded", function() {
      const dropdownButtons = document.querySelectorAll('[data-collapse-toggle]');

      // Check and set the initial state based on localStorage
      dropdownButtons.forEach((button) => {
        const dropdownId = button.getAttribute('data-collapse-toggle');
        const dropdown = document.getElementById(dropdownId);

        const isDropdownOpen = localStorage.getItem(dropdownId) === 'true';

        if (isDropdownOpen) {
          dropdown.classList.remove('hidden');
        }
      });

      // Toggle dropdown visibility and store the state in localStorage
      dropdownButtons.forEach((button) => {
        button.addEventListener('click', function() {
          const dropdownId = this.getAttribute('data-collapse-toggle');
          const dropdown = document.getElementById(dropdownId);

          dropdown.classList.toggle('hidden');

          const isDropdownOpen = !dropdown.classList.contains('hidden');
          localStorage.setItem(dropdownId, isDropdownOpen.toString());
        });
      });
    });

    var currentProgramCode; // global variable para sa program bat di ko naisip agad

    function openSectionModal(programCode) { // !!!!! Took me roughly 6 hours to just make the display of sections work !!!!!
      currentProgramCode = programCode;

      $.ajax({ //                                 If you found this, please heart react for appreciation :c
        type: "POST", //                          HEART REACT BELOW
        url: "../models/fetch_sections.php", //                        ♥ 1
        data: {
          programCode: programCode
        },
        success: function(response) {
          if (response === 'No sections') {
            // Clear the sections list pag walang section para hindi nakukuha yung sa previous
            var html = 'No section found. Click Add button to create your first one.';
            $('#section-modal #sections-list').html(html);
          } else {
            var sections = JSON.parse(response);
            var html = '<ul class="px-5 py-5 gap-4 space-y-4">';
            for (var i = 0; i < sections.length; i++) {
              html += '<li class="">';
              html += '<a href="#" class="relative block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex justify-between items-center">';
              html += '<h1 class="w-full text-xl font-bold text-corn-flower-blue">' + sections[i] + '</h1>';
              html += '<svg class="w-4 h-4 ms-3 rtl:rotate-180 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">';
              html += '<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />';
              html += '</svg>';
              html += '</a>';
              html += '</li>';
            }
            html += '</ul>';
            // update ng modal here
            $('#section-modal #sections-list').html(html);
          }
        }
      });
    }

    // add section here
    $('button[data-modal-target="add-section-success-modal"]').click(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "../models/add_section.php",
        data: {
          programCode: currentProgramCode
        },
        success: function(response) {

        }
      });
    });

    // remove section here
    $('button[data-modal-target="remove-section-success-modal"]').click(function(e) {
      e.preventDefault();
      $.ajax({
        type: "POST",
        url: "../models/delete_section.php",
        data: {
          programCode: currentProgramCode
        },
        success: function(response) {}
      });
    });


    // FORDA SN NG STUDENT SA ARCHIVE
    var user; // Declare username in the global scope

    function openProgArchiveModal(username) {
      user = username; // PLSSS Dito ako pinaka nahirapan, declare ng global para kung ano cinlick yun maselect :')
      document.getElementById('archive-number').innerText = username;
    }

    document.getElementById('noReloadProg').addEventListener('submit', function(event) {
      event.preventDefault();
      checkArchiveNumber();
    });

    function checkArchiveNumber() {
      var input = document.getElementById('program-number-input').value;
      var currentStudentNumber = document.getElementById('archive-number').innerText;
      if (input !== currentStudentNumber) {
        if (input !== '') {
          document.getElementById('error-message-prog').innerText = 'Student Number do not match.';
        }
        return false;
      } else {
        window.location.href = '../models/archiveProg.php?username=' + user;
      }
    }

    var remub = document.getElementById('removeLabelListProg');

    remub.addEventListener('click', function() {
      document.getElementById('error-message-prog').innerText = '';
    });
  </script>
  <!-- WYSIWYG Script -->
  <script type="module">
    // Tiptap
    import {
      Editor
    } from 'https://esm.sh/@tiptap/core';
    import Placeholder from 'https://esm.sh/@tiptap/extension-placeholder';
    import StarterKit from 'https://esm.sh/@tiptap/starter-kit';
    import Paragraph from 'https://esm.sh/@tiptap/extension-paragraph';
    import Bold from 'https://esm.sh/@tiptap/extension-bold';
    import Underline from 'https://esm.sh/@tiptap/extension-underline';
    import Link from 'https://esm.sh/@tiptap/extension-link';
    import BulletList from 'https://esm.sh/@tiptap/extension-bullet-list';
    import OrderedList from 'https://esm.sh/@tiptap/extension-ordered-list';
    import ListItem from 'https://esm.sh/@tiptap/extension-list-item';
    import Blockquote from 'https://esm.sh/@tiptap/extension-blockquote';

    const editor = new Editor({
      element: document.querySelector('#hs-editor-tiptap [data-hs-editor-field]'),
      extensions: [
        Placeholder.configure({
          placeholder: 'Enter your activity submission here...',
          emptyNodeClass: 'text-moody-blue'
        }),
        StarterKit,
        Paragraph.configure({
          HTMLAttributes: {
            class: 'text-deep-koamaru'
          }
        }),
        Bold.configure({
          HTMLAttributes: {
            class: 'font-bold'
          }
        }),
        Underline,
        Link.configure({
          HTMLAttributes: {
            class: 'inline-flex items-center gap-x-1 text-blue-600 decoration-2 hover:underline font-medium dark:text-white'
          }
        }),
        BulletList.configure({
          HTMLAttributes: {
            class: 'list-disc list-inside text-gray-800 dark:text-white'
          }
        }),
        OrderedList.configure({
          HTMLAttributes: {
            class: 'list-decimal list-inside text-gray-800 dark:text-white'
          }
        }),
        ListItem,
        Blockquote.configure({
          HTMLAttributes: {
            class: 'text-gray-800 sm:text-xl dark:text-white'
          }
        })
      ]
    });
    const actions = [{
        id: '#hs-editor-tiptap [data-hs-editor-bold]',
        fn: () => editor.chain().focus().toggleBold().run()
      },
      {
        id: '#hs-editor-tiptap [data-hs-editor-italic]',
        fn: () => editor.chain().focus().toggleItalic().run()
      },
      {
        id: '#hs-editor-tiptap [data-hs-editor-underline]',
        fn: () => editor.chain().focus().toggleUnderline().run()
      },
      {
        id: '#hs-editor-tiptap [data-hs-editor-strike]',
        fn: () => editor.chain().focus().toggleStrike().run()
      },
      {
        id: '#hs-editor-tiptap [data-hs-editor-link]',
        fn: () => {
          const url = window.prompt('URL');
          editor.chain().focus().extendMarkRange('link').setLink({
            href: url
          }).run();
        }
      },
      {
        id: '#hs-editor-tiptap [data-hs-editor-ol]',
        fn: () => editor.chain().focus().toggleOrderedList().run()
      },
      {
        id: '#hs-editor-tiptap [data-hs-editor-ul]',
        fn: () => editor.chain().focus().toggleBulletList().run()
      },
      {
        id: '#hs-editor-tiptap [data-hs-editor-blockquote]',
        fn: () => editor.chain().focus().toggleBlockquote().run()
      },
      {
        id: '#hs-editor-tiptap [data-hs-editor-code]',
        fn: () => editor.chain().focus().toggleCode().run()
      }
    ];

    actions.forEach(({
      id,
      fn
    }) => {
      const action = document.querySelector(id);

      if (action === null) return;

      action.addEventListener('click', fn);
    });
  </script>
  <!-- Flowbite cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <!-- Tailwind colors -->
  <script src="../assets/tailwind.config.js"></script>
  <!-- <script src="../controllers/add_student.js"></script> -->

</body>

</html>