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
  <title>Learning Management System | Admin Dashboard</title>
  <!-- Tailwind cdn -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <!-- Flowbite cdn -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <!-- Icon -->
  <link rel="icon" type="image/png" href="../assets/images/LMS-logo.png" />
  <!-- Css link -->
  <link rel="stylesheet" href="../assets/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<!-- Admin side/navigation bar -->
<?php
include_once './side-nav-bar.php';
?>

<body class="bg-ghost-white">
  <div class="p-4 sm:ml-64">
    <div class="pt-4 px-5 mt-14">
      <h1 class="font-bold text-4xl text-corn-flower-blue pb-8">Dashboard</h1>
      <!-- Dashboard Content -->
      <div class="grid grid-cols-7 gap-4">
        <div class="col-span-2">
          <!-- Test -->
          <div class="w-full h-auto bg-white rounded-xl shadow-[10px_10px_30px_-16px_rgba(224,227,246)] p-4 md:p-6">
            <div class="flex justify-between mb-5">
              <div>
                <h5 class="leading-none text-3xl font-bold text-corn-flower-blue pb-2">12</h5>
                <p class="text-base font-normal text-slate-600">User Count</p>
              </div>
              <div
                class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 dark:text-green-500 text-center">
                23%
                <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                  viewBox="0 0 10 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 13V1m0 0L1 5m4-4 4 4" />
                </svg>
              </div>
            </div>
            <!-- ADD PROGRAM SUCCESS -->
            <div id="add-program-success-modal" tabindex="-1" data-modal-target="programs-modal"
              data-modal-toggle="programs-modal"
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
            </div>
            <div id="legend-chart"></div>
            <?php
            include '../models/config.php';

            // Set the PHP timezone
            date_default_timezone_set('Asia/Manila'); // Set your desired timezone
            
            // Fetch user count for each day from students_tbl
            $sql_students = "SELECT DATE(CONVERT_TZ(created_at, @@session.time_zone, '+08:00')) AS date, COUNT(*) AS user_count FROM Students_Tbl GROUP BY DATE(CONVERT_TZ(created_at, @@session.time_zone, '+08:00'))";
            $result_students = $conn->query($sql_students);

            // Fetch user count for each day from instructor_tbl
            $sql_instructors = "SELECT DATE(CONVERT_TZ(created_at, @@session.time_zone, '+08:00')) AS date, COUNT(*) AS user_count FROM Instructors_Tbl GROUP BY DATE(CONVERT_TZ(created_at, @@session.time_zone, '+08:00'))";
            $result_instructors = $conn->query($sql_instructors);

            $data_students = [];
            $data_instructors = [];
            $categories = [];

            if ($result_students->num_rows > 0) {
              while ($row = $result_students->fetch_assoc()) {
                $categories[] = $row['date'];
                $data_students[] = (int) $row['user_count'];
              }
            }

            if ($result_instructors->num_rows > 0) {
              while ($row = $result_instructors->fetch_assoc()) {
                if (!in_array($row['date'], $categories)) {
                  $categories[] = $row['date'];
                }
                $data_instructors[] = (int) $row['user_count'];
              }
            }

            // Sort the categories array
            sort($categories);

            // Close database connection
            $conn->close();
            ?>
          </div>

          <!-- // Test -->
        </div>
        <!-- Number of users -->
        <div class="col-start-3 col-end-5 grid grid-rows-3 gap-4 ">
          <!-- Total Students -->
          <div
            class="bg-white rounded-2xl flex justify-between px-10 items-center shadow-[10px_10px_30px_-16px_rgba(224,227,246)]">
            <div class="inline-flex gap-3 justify-center items-center">
              <svg class="w-4 h-4 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                  d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
              <span class="font-medium text-md text-corn-flower-blue">Total Students</span>
            </div>
            <?php
            include '../Models/config.php';
            // Fetch total user count from students_tbl
            $sql = "SELECT COUNT(*) AS total_students FROM Students_Tbl";
            $result = $conn->query($sql);

            $total_students = 0;
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $total_students = $row['total_students'];
              }
            }
            // Close database connection
            $conn->close();
            ?>
            <span
              class="text-neon-blue bg-ghost-lavender px-4 py-2 font-bold rounded-md"><?php echo $total_students; ?></span>
          </div>
          <!-- Total Instructor -->
          <div
            class="bg-white rounded-2xl flex justify-between px-10 items-center shadow-[10px_10px_30px_-16px_rgba(224,227,246)]">
            <div class="inline-flex gap-3 justify-center items-center">
              <svg class="w-4 h-4 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                  d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
              <span class="font-medium text-md text-corn-flower-blue">Total Instructors</span>
            </div>
            <?php
            include '../models/config.php';
            // Fetch total user count from students_tbl
            $sql = "SELECT COUNT(*) AS total_instructors FROM instructors_tbl";
            $result = $conn->query($sql);

            $total_instructors = 0;
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $total_instructors = $row['total_instructors'];
              }
            }
            // Close database connection
            $conn->close();
            ?>
            <span
              class="text-neon-blue bg-ghost-lavender px-4 py-2 font-bold rounded-md"><?php echo $total_instructors; ?></span>
          </div>
          <!-- Temp -->
          <div
            class="bg-white rounded-2xl flex justify-between px-10 items-center shadow-[10px_10px_30px_-16px_rgba(224,227,246)]">
            <div class="inline-flex gap-3 justify-center items-center">
              <svg class="w-4 h-4 text-corn-flower-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                  d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
              <span class="font-medium text-md text-corn-flower-blue">Total Programs</span>
            </div>
            <span class="text-neon-blue bg-ghost-lavender px-4 py-2 font-bold rounded-md">0</span>
          </div>
        </div>
        <!-- Activity Logs Overview -->
        <div class="col-start-5 col-end-8 h-auto">
          <a href="./admin-activity-logs.php">
            <div
              class="bg-white rounded-2xl drop-shadows transition duration-700 ease-in-out overflow-y-auto border-b-4 border-transparent hover:border-neon-blue h-full flex-col p-8 shadow-[10px_10px_30px_-16px_rgba(224,227,246)] max-h-auto">
              <h1 class="font-bold text-2xl text-corn-flower-blue">Activity Logs Overview</h1>
              <ul class="mt-6 space-y-4 overflow-y-auto max-h-full">
                <!-- FORDA ACTIVITY LOG OVERVIEW -->
                <?php
                include '../models/config.php'; //connection ng db
                $sql = "SELECT * FROM Logs_Tbl ORDER BY timestamp DESC LIMIT 3";
                $result = $conn->query($sql);

                $actionMapping = [          // First time to use associative array. Galing now ko lang nalaman :))
                  "Student Account Archiving" => "archived a student account",
                  "Instructor Account Archiving" => "archived an instructor account",
                  "Admin Account Archiving" => "archived an admin account",
                  "Student Account Registration" => "enrolled a student account",
                  "Instructor Account Registration" => "registered an instructor account",
                  "Admin Account Registration" => "registered an admin account",
                  "Student Account Update" => "updated a student account details",
                  "Instructor Account Update" => "updated an instructor account details",
                  "Admin Account Update" => "updated an admin account details",
                  "Student Account Deactivation" => "deactivated a student account",
                  "Student Account Reactivation" => "reactivated a student account",
                  "Instructor Account Deactivation" => "deactivated an instructor account",
                  "Instructor Account Reactivation" => "reactivated an instructor account",
                  "Admin Account Deactivation" => "deactivated an admin account",
                  "Admin Account Reactivation" => "reactivated an admin account",
                  "Program Implementation" => "implemented a new program",
                  "Program Archiving" => "archived a program",
                ];

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    $actionSentence = isset($actionMapping[$row["Action"]]) ? $actionMapping[$row["Action"]] : $row["Action"];
                    $phrase = $row["Action"] == "Program Implementation" || $row["Action"] == "Program Archiving" ? "with a program code of" : "with a username of";

                    echo "<li>";
                    echo '<h5 class="text-xs mb-1.5 text-slate-500 font-normal">' . $row["Timestamp"] . "</h5>";
                    echo '<div class="bg-ghost-white py-3 px-4 rounded-md">';
                    echo '<span class="text-deep-koamaru text-sm">';
                    echo '<span class="text-neon-blue font-medium">' . $row["Actor"] . '</span>';
                    echo ' ' . $actionSentence . ' ' . $phrase . ' ' . $row["Target"] . '.';
                    echo '</span>';
                    echo '</div>';
                    echo "</li>";
                  }
                } else {
                  echo '<li><div class="bg-ghost-white py-3 px-4 rounded-md"><span class="text-deep-koamaru text-sm">0 results</span></div></li>';
                }
                $conn->close();
                ?>


              </ul>
            </div>
          </a>
        </div>
      </div>
      <!-- All Courses -->
      <h1 class="font-bold text-4xl text-corn-flower-blue py-8">All Courses</h1>
      <div class="grid grid-cols-3 gap-5 pb-4">
        <div class="col-span-1">
          <!-- Course Card 1 -->
          <div
            class="relative h-full block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex flex-col justify-between">
            <a href="#">
              <div class="relative">
                <img src="../assets/images/course-card-illustration.png" class="rounded-xl w-full"
                  alt="Course Card Illustration" draggable="false">
                <h5
                  class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 mb-3 text-4xl font-bold tracking-tight text-white">
                  SE101</h5>
              </div>
              <h5 class="mt-7 text-2xl font-medium tracking-tight text-corn-flower-blue">Software Engineering</h5>
              <!-- Semester Indicator -->
            </a>
            <div class="flex justify-between items-center mt-4">
              <span
                class="inline-flex items-center bg-ghost-lavender text-neon-blue text-sm font-medium px-4 py-2 rounded-full">
                3 Units
              </span>
            </div>
          </div>
        </div>
        <div class="col-span-1">
          <!-- Course Card 2 -->
          <div
            class="relative h-full block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex flex-col justify-between">
            <a href="#">
              <div class="relative">
                <img src="../assets/images/course-card-illustration.png" class="rounded-xl w-full"
                  alt="Course Card Illustration" draggable="false">
                <h5
                  class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 mb-3 text-4xl font-bold tracking-tight text-white">
                  HCI101</h5>
              </div>
              <h5 class="mt-7 text-2xl font-medium tracking-tight text-corn-flower-blue">Introduction to Human Computer
                Interaction</h5>
              <!-- Semester Indicator -->
            </a>
            <div class="flex justify-between items-center mt-4">
              <span
                class="inline-flex items-center bg-ghost-lavender text-neon-blue text-sm font-medium px-4 py-2 rounded-full">
                3 Units
              </span>
            </div>
          </div>
        </div>
        <div class="col-span-1">
          <!-- Course Card 3 -->
          <div
            class="relative h-full block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex flex-col justify-between">
            <a href="#">
              <div class="relative">
                <img src="../assets/images/course-card-illustration.png" class="rounded-xl w-full"
                  alt="Course Card Illustration" draggable="false">
                <h5
                  class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 mb-3 text-4xl font-bold tracking-tight text-white">
                  IPT101</h5>
              </div>
              <h5 class="mt-7 text-2xl font-medium tracking-tight text-corn-flower-blue">Integrative Programmin and
                Technologies 1</h5>
              <!-- Semester Indicator -->
            </a>
            <div class="flex justify-between items-center mt-4">
              <span
                class="inline-flex items-center bg-ghost-lavender text-neon-blue text-sm font-medium px-4 py-2 rounded-full">
                3 Units
              </span>
            </div>
          </div>
        </div>
        <div class="col-span-1">
          <!-- Course Card 4 -->
          <div
            class="relative h-full block p-6 bg-white rounded-2xl hover:shadow-[15px_15px_30px_-3px_rgba(224,227,246)] transition duration-700 ease-in-out col-span-1 overflow-y-auto border-b-4 border-transparent hover:border-neon-blue flex flex-col justify-between">
            <a href="#">
              <div class="relative">
                <img src="../assets/images/course-card-illustration.png" class="rounded-xl w-full"
                  alt="Course Card Illustration" draggable="false">
                <h5
                  class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 mb-3 text-4xl font-bold tracking-tight text-white">
                  MS101</h5>
              </div>
              <h5 class="mt-7 text-2xl font-medium tracking-tight text-corn-flower-blue">Advanced Database Systems</h5>
              <!-- Semester Indicator -->
            </a>
            <div class="flex justify-between items-center mt-4">
              <span
                class="inline-flex items-center bg-ghost-lavender text-neon-blue text-sm font-medium px-4 py-2 rounded-full">
                3 Units
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Archive Program Success Modal -->
      <div id="archive-program-success-modal" tabindex="-1" data-modal-target="programs-modal"
        data-modal-toggle="programs-modal"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-0rem)] max-h-full backdrop-blur-sm bg-ghost-lavender bg-opacity-50">
        <div class="relative p-4 w-full max-w-md max-h-full">
          <div class="relative bg-white rounded-2xl py-8">
            <div class="p-4 md:p-5">
              <svg class="mx-auto mb-4 text-green-400 w-16 h-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6" />
              </svg>
              <h3 class="mb-12 text-lg font-normal text-deep-koamaru text-center">Program archived successfully!
              </h3>
              <div class="flex justify-center">
                <button type="button" id="okina-archivee"
                  class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-lg font-medium inline-flex items-center px-7 py-2.5 text-center transition duration-300 ease-in-out hover:scale-105">
                  OK
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- // END -->


      <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
      <script>
        var categories = <?php echo json_encode($categories); ?>;

        const options = {
          // add data series via arrays, learn more here: https://apexcharts.com/docs/series/
          series: [{
            name: "Students",
            data: <?php echo json_encode($data_students); ?>,
            color: "#1A56DB",
          },
          {
            name: "Instructors",
            data: <?php echo json_encode($data_instructors); ?>,
            color: "#7E3BF2",
          },
          ],
          chart: {
            height: "100%",
            maxWidth: "100%",
            type: "area",
            fontFamily: "Inter, sans-serif",
            dropShadow: {
              enabled: false,
            },
            toolbar: {
              show: false,
            },
          },
          tooltip: {
            enabled: true,
            x: {
              show: false,
            },
          },
          legend: {
            show: true
          },
          fill: {
            type: "gradient",
            gradient: {
              opacityFrom: 0.55,
              opacityTo: 0,
              shade: "#1C64F2",
              gradientToColors: ["#1C64F2"],
            },
          },
          dataLabels: {
            enabled: false,
          },
          stroke: {
            width: 6,
          },
          grid: {
            show: false,
            strokeDashArray: 4,
            padding: {
              left: 2,
              right: 2,
              top: -26
            },
          },
          xaxis: {
            categories: categories,
            labels: {
              show: false,
            },
            axisBorder: {
              show: false,
            },
            axisTicks: {
              show: false,
            },
          },
          yaxis: {
            show: false,
          },
        }

        if (document.getElementById("legend-chart") && typeof ApexCharts !== 'undefined') {
          const chart = new ApexCharts(document.getElementById("legend-chart"), options);
          chart.render();
        }
      </script>

    </div>
  </div>
  <!-- Flowbite cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
  <!-- Tailwind colors -->
  <script src="../assets/tailwind.config.js"></script>
  <script>
    var modalProgSuccess;
    var modalProg;

    document.addEventListener('DOMContentLoaded', function () {

      var urlParams = new URLSearchParams(window.location.search);
      var hi = true;
      if (urlParams.get('showModalProg') === 'true' && hi === true) {   // ADD-PROGRAM-SUCCESS-MODAL
        modalProg = document.getElementById('programs-modal');
        modalProgSuccess = document.getElementById('add-program-success-modal');
        modalProgSuccess.style.display = 'flex';
      }

      // archive to pasingit
      var urlParamss = new URLSearchParams(window.location.search);
      var hii = true;
      if (urlParamss.get('archive_progsuccess') === 'true' && hii === true) {
        var modalArchs = document.getElementById('archive-program-success-modal');
        modalArchs.style.display = 'flex';
      }

      var okinaArchivee = document.getElementById('okina-archivee');

      okinaArchivee.addEventListener('click', function () {
        hii = false;
        modalArchs.style.display = 'none';
        history.pushState({}, null, "http://localhost/lms/admin/home");
      });
    });

    var addProgOk = document.getElementById("add-success-ok");         //Change ng URL and remove ng msuccess modal (ADD)
    addProgOk.addEventListener("click", function () {
      // Change URL ng hindi nag rereload (PUSHSTATE PATANDAAN QUACKOVERFLOW >:c)
      history.pushState({}, null, "http://localhost/lms/admin/home");
      modalProgSuccess.style.display = 'none';
    })
  </script>
</body>

</html>