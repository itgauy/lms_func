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
</head>
<!-- Admin side/navigation bar -->
<?php
include_once './side-nav-bar.php';
?>

<body class="bg-ghost-white">
  <div class="p-4 sm:ml-64">
    <div class="pt-4 px-5 mt-14">
      <!-- Dashboard Content -->
      <div class="grid grid-cols-7 gap-4 max-[10rem]">
        <!-- Chart Test -->

        <div class="col-span-2">
          <!-- Test -->

          <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between mb-5">
              <div>
                <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">$12,423</h5>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Sales this week</p>
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
            <div id="legend-chart"></div>
            <?php
            include '../Models/config.php';

            // Set the PHP timezone
            date_default_timezone_set('Asia/Manila'); // Set your desired timezone
            
            // Fetch user count for each day from students_tbl
            $sql_students = "SELECT DATE(CONVERT_TZ(created_at, @@session.time_zone, '+08:00')) AS date, COUNT(*) AS user_count FROM students_tbl GROUP BY DATE(CONVERT_TZ(created_at, @@session.time_zone, '+08:00'))";
            $result_students = $conn->query($sql_students);

            // Fetch user count for each day from instructor_tbl
            $sql_instructors = "SELECT DATE(CONVERT_TZ(created_at, @@session.time_zone, '+08:00')) AS date, COUNT(*) AS user_count FROM instructors_tbl GROUP BY DATE(CONVERT_TZ(created_at, @@session.time_zone, '+08:00'))";
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
        <div class="col-start-3 col-end-5 grid grid-rows-3 gap-4 h-auto">
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
            <span class="text-neon-blue bg-ghost-lavender px-4 py-2 font-bold rounded-md">0</span>
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
            <span class="text-neon-blue bg-ghost-lavender px-4 py-2 font-bold rounded-md">0</span>
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
              <span class="font-medium text-md text-corn-flower-blue">Total Instructors</span>
            </div>
            <span class="text-neon-blue bg-ghost-lavender px-4 py-2 font-bold rounded-md">0</span>
          </div>
        </div>
        <!-- Activity Logs Overview -->
        <div class="col-start-5 col-end-8 h-auto">
          <div
            class="bg-white rounded-2xl drop-shadows transition duration-700 ease-in-out overflow-y-auto border-b-4 border-transparent hover:border-neon-blue h-full flex-col p-8 shadow-[10px_10px_30px_-16px_rgba(224,227,246)] max-h-auto">
            <h1 class="font-bold text-2xl text-corn-flower-blue">Activity Logs Overview</h1>
            <ul class="mt-6 space-y-4 overflow-y-auto">
              <!-- Sample Log -->
              <li>
                <h5 class="text-xs mb-1.5 text-slate-500 font-normal">2024-04-22 11:07:30</h5>
                <div class="bg-ghost-white py-3 px-4 rounded-md">
                  <span class="text-deep-koamaru text-sm">
                    <span class="text-neon-blue font-medium">Juan Dela Cruz</span>
                    created a bomba for kwaso.
                  </span>
                </div>
              </li>
              <li>
                <h5 class="text-xs mb-1.5 text-slate-500 font-normal">2024-04-22 11:07:30</h5>
                <div class="bg-ghost-white py-3 px-4 rounded-md">
                  <span class="text-deep-koamaru text-sm">
                    <span class="text-neon-blue font-medium">Juan Dela Cruz</span>
                    created a bomba for kwaso.
                  </span>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>

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
            labels: {
              formatter: function (value) {
                return '$' + value;
              }
            }
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
</body>

</html>