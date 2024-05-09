<?php
// session_start();
// if (!isset($_SESSION['user'])) {
//   header('Location: ../index');  IF NOT YET LOGGED IN
//   exit;
// }
// if (isset($_SESSION['user'])) {
//   $UserType = $_SESSION['UserType'];
//   if ($UserType == 'Student') {
//     header('Location: ../student/home');
//   } elseif ($UserType == 'Instructor') {
//     header('Location: ../instructor/home');
//     exit;
//   }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Management System | Section</title>
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
      <h1 class="font-bold text-4xl text-corn-flower-blue"><span>BSIT-1A</span> | Class List</h1>
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
      <!-- Table -->
      <div class="relative overflow-x-auto sm:rounded-lg">
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
                    Classification
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Email
                  </th>
                  <th scope="col" class="px-4 py-3">
                    Birthdate
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
                    echo '<td class="pl-4 py-4 truncate">' . $row["Class"] . "</td>";
                    echo '<td class="px-4 py-4 truncate">' . $row["Email"] . "</td>";
                    echo '<td class="px-4 py-4 truncate">' . $row["BirthDate"] . "</td>";
                    echo "<td class='flex items-center px-4 py-4'>";
                    echo "<button data-modal-target='unenroll-modal' data-modal-toggle='unenroll-modal' class='unenrolls font-medium text-red-600 dark:text-red-500 hover:underline'>Unenroll</button></td>";
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
    </div>
  </div>

  <!-- Flowbite cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <!-- Tailwind colors -->
  <script src="../assets/tailwind.config.js"></script>
</body>

</html>