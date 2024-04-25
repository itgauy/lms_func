<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Management System | Archive</title>
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
      <h1 class="font-bold text-4xl text-corn-flower-blue">Archive</h1>
      <div class="flex space-y-4 sm:space-y-0 items-center justify-end pb-6 pt-8">
        <!-- Search and filter bar -->
        <div class="flex">
          <!-- <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your</label> -->
          <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-white bg-neon-blue rounded-s-md hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano transition ease-in-out duration-300" type="button">Roles
            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
            </svg>
          </button>
          <!-- dropdown - tabi ng search bar -->
          <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg drop-shadows w-44">
            <ul class="py-2 text-sm text-deep-koamaru" aria-labelledby="dropdown-button">
              <li>
                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-ghost-white hover:text-neon-blue transition duration-300 ease-in-out">--</button>
              </li>
              <li>
                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-ghost-white hover:text-neon-blue transition duration-300 ease-in-out">--</button>
              </li>
              <li>
                <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-ghost-white hover:text-neon-blue transition duration-300 ease-in-out">--</button>
              </li>
            </ul>
          </div>
          <div class="relative w-[15rem]">
            <!-- Search -->
            <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm border border-lavender text-deep-koamaru bg-lav-sant rounded-e-lg focus:ring-neon-blue focus:border-neon-blue placeholder-moody-blue transition ease-in-out duration-300" placeholder="Search...">
            <!-- Search Button -->
            <button type="submit" class="absolute top-0 end-0 p-2.5 px-4 text-sm font-medium h-full text-white bg-neon-blue rounded-e-md hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano transition duration-300 ease-in-out">
              <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
              <span class="sr-only">Search</span>
            </button>
          </div>
        </div>
      </div>
      <!-- Tab Component for Enrolled and Unenrolled -->
      <div class="mb-4">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center transition duration-300 ease-in-out" id="default-tab" data-tabs-toggle="tab-content" role="tablist" data-tabs-inactive-classes="text-moody-blue" data-tabs-active-classes="text-neon-blue border-neon-blue bg-ghost-lavender">
          <li class="me-2" role="presentation">
            <button class="inline-block px-4 py-2 hover:bg-ghost-lavender transition duration-300 ease-in-out border-b-2 rounded-t-lg" id="users-table-tab" data-tabs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="false">Users</button>
          </li>
          <li class="me-2" role="presentation">
            <button class="inline-block px-4 py-2 hover:bg-ghost-lavender transition duration-300 ease-in-out border-b-2 rounded-t-lg" id="programs-table-tab" data-tabs-target="#programs" type="button" role="tab" aria-controls="programs" aria-selected="false">Programs</button>
          </li>
          <li class="me-2" role="presentation">
            <button class="inline-block px-4 py-2 hover:bg-ghost-lavender transition duration-300 ease-in-out border-b-2 rounded-t-lg" id="courses-table-tab" data-tabs-target="#courses" type="button" role="tab" aria-controls="courses" aria-selected="false">Courses</button>
          </li>
        </ul>
      </div>
      <!-- // Tab Component for Enrolled and Unenrolled -->
      <div id="tab-content">
        <!-- Users Table -->
        <div class="hidden relative overflow-x-auto sm:rounded-lg" id="users" role="tabpanel" aria-labelledby="users-table-tab">
          <div class="max-h-[480px] overflow-y-auto">
            <table class="w-full text-sm text-left rtl:text-right text-deep-koamaru">
              <thead class="text-xs text-corn-flower-blue uppercase bg-ghost-lavender sticky top-0">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    User ID
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Full Name
                  </th>
                  <th scope="col" class="px-6 py-3">
                    User Type
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Username
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Email
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Active Last
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-white border-b border-indigo-100">
                  <th scope="row" class="px-6 py-4 font-medium text-deep-koamaru whitespace-nowrap">
                    1
                  </th>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                </tr>
                <tr class="bg-white border-b border-indigo-100">
                  <th scope="row" class="px-6 py-4 font-medium text-deep-koamaru whitespace-nowrap">
                    --
                  </th>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                </tr>
                <tr class="bg-white border-b border-indigo-100">
                  <th scope="row" class="px-6 py-4 font-medium text-deep-koamaru whitespace-nowrap">
                    --
                  </th>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- // Users Table -->
        <!-- Programs Table -->
        <div class="hidden relative overflow-x-auto sm:rounded-lg" id="programs" role="tabpanel" aria-labelledby="programs-table-tab">
          <div class="max-h-[480px] overflow-y-auto">
            <table class="w-full text-sm text-left rtl:text-right text-deep-koamaru">
              <thead class="text-xs text-corn-flower-blue uppercase bg-ghost-lavender sticky top-0">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    User ID
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Full Name
                  </th>
                  <th scope="col" class="px-6 py-3">
                    User Type
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Username
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Email
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Active Last
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-white border-b border-indigo-100">
                  <th scope="row" class="px-6 py-4 font-medium text-deep-koamaru whitespace-nowrap">
                    2
                  </th>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                </tr>
                <tr class="bg-white border-b border-indigo-100">
                  <th scope="row" class="px-6 py-4 font-medium text-deep-koamaru whitespace-nowrap">
                    --
                  </th>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                </tr>
                <tr class="bg-white border-b border-indigo-100">
                  <th scope="row" class="px-6 py-4 font-medium text-deep-koamaru whitespace-nowrap">
                    --
                  </th>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- // Programs Table -->
        <!-- Courses Table -->
        <div class="hidden relative overflow-x-auto sm:rounded-lg" id="courses" role="tabpanel" aria-labelledby="courses-table-tab">
          <div class="max-h-[480px] overflow-y-auto">
            <table class="w-full text-sm text-left rtl:text-right text-deep-koamaru">
              <thead class="text-xs text-corn-flower-blue uppercase bg-ghost-lavender sticky top-0">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    User ID
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Full Name
                  </th>
                  <th scope="col" class="px-6 py-3">
                    User Type
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Username
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Email
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Active Last
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-white border-b border-indigo-100">
                  <th scope="row" class="px-6 py-4 font-medium text-deep-koamaru whitespace-nowrap">
                    3
                  </th>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                </tr>
                <tr class="bg-white border-b border-indigo-100">
                  <th scope="row" class="px-6 py-4 font-medium text-deep-koamaru whitespace-nowrap">
                    --
                  </th>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                </tr>
                <tr class="bg-white border-b border-indigo-100">
                  <th scope="row" class="px-6 py-4 font-medium text-deep-koamaru whitespace-nowrap">
                    --
                  </th>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                  <td class="px-6 py-4">
                    --
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- // Courses Table -->
      </div>
    </div>
  </div>

  <!-- Flowbite cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <!-- Tailwind colors -->
  <script src="../assets/tailwind.config.js"></script>
</body>

</html>