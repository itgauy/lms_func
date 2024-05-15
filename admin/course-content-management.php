<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Management System | Course Content Management</title>
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
      <!-- Title -->
      <div class="flex items-center justify-start">
        <span class="gap-4 inline-flex justify-center items-center">
          <h1 class="font-bold text-4xl text-corn-flower-blue">BSIT | <span>Software Engineering</span></h1>
          <span class="inline-flex items-center bg-ghost-lavender text-neon-blue text-sm font-medium px-4 py-2 rounded-full">
            2nd Year 2nd Semester
          </span>
        </span>
      </div>
      <!-- Add Content Link -->
      <div class="flex justify-end">
        <a href="./add-course-content.php" class="inline-flex gap-1 items-center justify-center pl-3 pr-4 py-2 bg-neon-blue text-white font-medium cursor-pointer transition ease-in-out duration-300 hover:scale-105 rounded-md hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano mt-12">
          <svg class="w-5 h-5 mr-1 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
          </svg>
          Add Content
        </a>
      </div>
      <!-- Main content -->
      <div class="flex items-center justify-between mt-6 mb-6">
        <div class="grid grid-cols-8 gap-4 w-full">
          <div class="col-span-2">
            <ul class="space-y-3" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist" data-tabs-inactive-classes="text-moody-blue bg-lav-sant" data-tabs-active-classes="bg-ghost-lavender text-neon-blue border-neon-blue border-l-4 border-neon-blue font-medium">
              <!-- Week 1 Button -->
              <li role="presentation">
                <button class="rounded-lg hover:bg-ghost-lavender transition duration-300 ease-in-out w-full flex items-center justify-center p-3 w-full" id="week-1-tab" data-tabs-target="#week-1" type="button" role="tab" aria-controls="week-1" aria-selected="false">Week 1 - Course Orientation</button>
              </li>
              <!-- Week 2 & 3 Button -->
              <li role="presentation">
                <button class="rounded-lg hover:bg-ghost-lavender transition duration-300 ease-in-out w-full flex items-center justify-center p-3 w-full" id="week-2-3-tab" data-tabs-target="#week-2-3" type="button" role="tab" aria-controls="week-2-3" aria-selected="false">Week 2 & 3 - Web Basics Terminologies & Hypertext Markup Language</button>
              </li>
              <!-- Week 4 Button -->
              <li role="presentation">
                <button class="rounded-lg hover:bg-ghost-lavender transition duration-300 ease-in-out w-full flex items-center justify-center p-3 w-full" id="week-4-tab" data-tabs-target="#week-4" type="button" role="tab" aria-controls="week-4" aria-selected="false">Week 4 - Cascading Style Sheet</button>
              </li>
              <!-- Week 5 & 6 Button -->
              <li role="presentation">
                <button class="rounded-lg hover:bg-ghost-lavender transition duration-300 ease-in-out w-full flex items-center justify-center p-3 w-full" id="week-5-6-tab" data-tabs-target="#week-5-6" type="button" role="tab" aria-controls="week-5-6" aria-selected="false">Week 5 & 6 - Additional PDF Materials</button>
              </li>
              <!-- Week 7 Button -->
              <li role="presentation">
                <button class="rounded-lg hover:bg-ghost-lavender transition duration-300 ease-in-out w-full flex items-center justify-center p-3 w-full" id="week-7-tab" data-tabs-target="#week-7" type="button" role="tab" aria-controls="week-7" aria-selected="false">Week 7 - Additional PDF Materials</button>
              </li>
            </ul>
          </div>
          <div class="col-span-6 max-h-auto">
            <div id="default-tab-content">
              <!-- Week 1 Content -->
              <div class="hidden p-4 rounded-xl bg-white drop-shadows w-full" id="week-1" role="tabpanel" aria-labelledby="week-1-tab">
                <form action="">
                  <div class="grid grid-cols-2 p-4 gap-6">
                    <!-- Week Topic Title Input -->
                    <div class="col-span-1">
                      <label for="" class="block mb-5 text-sm font-medium text-deep-koamaru">Week Topic Title</label>
                      <span class="text-deep-koamaru font-bold bg-ghost-white p-3 rounded-lg">Week 1 - Course Orientation</span>
                    </div>
                    <!-- Learning Outcomes Input -->
                    <div class="col-start-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Learning Outcomes</label>
                      <div class="text-deep-koamaru text-sm font-regular bg-ghost-white p-3 rounded-lg">Analyze how the study of Web Systems and Technologies 1 shares achieving the vision and mission of the university.</div>
                    </div>
                    <!-- Topics -->
                    <div class="col-start-2">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Topics</label>
                      <div class="text-deep-koamaru text-sm font-regular bg-ghost-white p-3 rounded-lg">
                        <ul class="list-disc pl-5 text-deep-koamaru">
                          <li>Mission</li>
                          <li>Vission</li>
                          <li>Course Syllabus</li>
                          <li>Grading System</li>
                          <li>Class Policies</li>
                          <li>Course Requirements</li>
                        </ul>
                      </div>
                    </div>
                    <!-- Handouts -->
                    <div class="col-span-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Handouts</label>
                      <ul class="list-none text-deep-koamaru space-y-3">
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-royal-blue border border-royal-blue hover:bg-hawkes-blue focus:ring-4 focus:outline-none focus:ring-tropical-blue rounded-lg text-sm bg-solitude transition ease-in-out duration-300">
                            <svg class="w-3 h-3 me-2 text-royal-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2c.6 0 1-.4 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
                            </svg>
                            Week 1 - PowerPoint Presentation
                          </a>
                        </li>
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-royal-blue border border-royal-blue hover:bg-hawkes-blue focus:ring-4 focus:outline-none focus:ring-tropical-blue rounded-lg text-sm bg-solitude transition ease-in-out duration-300">
                            <svg class="w-3 h-3 me-2 text-royal-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2c.6 0 1-.4 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
                            </svg>
                            Week 1 - Additional PDF Materials
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- Assessment and Tasks -->
                    <div class="col-span-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Assessment and
                        Tasks</label>
                      <ul class="list-disc pl-5 text-deep-koamaru">
                        <li>Oral Recitation/Selected Responses</li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
              <!-- Week 2 & 3 Content -->
              <div class="hidden p-4 rounded-lg bg-white drop-shadows w-full" id="week-2-3" role="tabpanel" aria-labelledby="week-2-3-tab">
                <form action="">
                  <div class="grid grid-cols-2 p-4 gap-6">
                    <!-- Week Topic Title Input -->
                    <div class="col-span-1">
                      <label for="" class="block mb-5 text-sm font-medium text-deep-koamaru">Week Topic Title</label>
                      <div class="text-deep-koamaru font-bold bg-ghost-white p-3 rounded-lg">Week 2 & 3 - Web Basics Terminologies & Hypertext Markup Language</div>
                    </div>
                    <!-- Learning Outcomes Input -->
                    <div class="col-start-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Learning Outcomes</label>
                      <div class="text-deep-koamaru text-sm font-regular bg-ghost-white p-3 rounded-lg">Can apply the basic technology on internet and on website that incorporates using various technology. Can create and design a website using HTML.</div>
                    </div>
                    <!-- Topics -->
                    <div class="col-start-2">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Topics</label>
                      <div class="text-deep-koamaru text-sm font-regular bg-ghost-white p-3 rounded-lg">
                        <ul class="list-disc pl-5 text-deep-koamaru">
                          <li>Mission</li>
                          <li>Vission</li>
                          <li>Course Syllabus</li>
                          <li>Grading System</li>
                          <li>Class Policies</li>
                          <li>Course Requirements</li>
                        </ul>
                      </div>
                    </div>
                    <!-- Handouts -->
                    <div class="col-span-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Handouts</label>
                      <ul class="list-none text-deep-koamaru space-y-3">
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-royal-blue border border-royal-blue hover:bg-hawkes-blue focus:ring-4 focus:outline-none focus:ring-tropical-blue rounded-lg text-sm bg-solitude transition ease-in-out duration-300">
                            <svg class="w-3 h-3 me-2 text-royal-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2c.6 0 1-.4 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
                            </svg>
                            Week 1 - PowerPoint Presentation
                          </a>
                        </li>
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-royal-blue border border-royal-blue hover:bg-hawkes-blue focus:ring-4 focus:outline-none focus:ring-tropical-blue rounded-lg text-sm bg-solitude transition ease-in-out duration-300">
                            <svg class="w-3 h-3 me-2 text-royal-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2c.6 0 1-.4 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
                            </svg>
                            Week 1 - Additional PDF Materials
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- Assessment and Tasks -->
                    <div class="col-span-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Assessment and
                        Tasks</label>
                      <ul class="list-none text-gray-500 dark:text-gray-400 space-y-3">
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-camarone border border-camarone hover:bg-granny-apple focus:ring-4 focus:outline-none focus:ring-chinook rounded-lg transition duration-300 ease-in-out bg-off-green">
                            <svg class="w-3 h-3 me-2 text-camarone" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3c.6 0 1 .4 1 1v15c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V5c0-.6.4-1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                            </svg>
                            Laboratory Activity 1
                          </a>
                        </li>
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-camarone border border-camarone hover:bg-granny-apple focus:ring-4 focus:outline-none focus:ring-chinook rounded-lg transition duration-300 ease-in-out bg-off-green">
                            <svg class="w-3 h-3 me-2 text-camarone" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3c.6 0 1 .4 1 1v15c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V5c0-.6.4-1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                            </svg>
                            Assignment 1
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
              <!-- Week 4 Content -->
              <div class="hidden p-4 rounded-lg bg-white drop-shadows w-full" id="week-4" role="tabpanel" aria-labelledby="week-4-tab">
                <form action="">
                  <div class="grid grid-cols-2 p-4 gap-6">
                    <!-- Week Topic Title Input -->
                    <div class="col-span-1">
                      <label for="" class="block mb-5 text-sm font-medium text-deep-koamaru">Week Topic Title</label>
                      <div class="text-deep-koamaru font-bold bg-ghost-white p-3 rounded-lg">Week 4 - Cascading Style Sheet</div>
                    </div>
                    <!-- Learning Outcomes Input -->
                    <div class="col-start-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Learning Outcomes</label>
                      <div class="text-deep-koamaru text-sm font-regular bg-ghost-white p-3 rounded-lg">Can apply the basic technology on internet and on website that incorporates using HTML, CSS and JavaScript. Can Create and design a website using HTML and CSS.</div>
                    </div>
                    <!-- Topics -->
                    <div class="col-start-2">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Topics</label>
                      <div class="text-deep-koamaru text-sm font-regular bg-ghost-white p-3 rounded-lg">
                        <ul class="list-disc pl-5 text-deep-koamaru">
                          <li>Intorduction to CSS</li>
                          <li>CSS Properties</li>
                          <li>CSS Concepts</li>
                          <li>XML</li>
                        </ul>
                      </div>
                    </div>
                    <!-- Handouts -->
                    <div class="col-span-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Handouts</label>
                      <ul class="list-none text-gray-500 space-y-3">
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-royal-blue border border-royal-blue hover:bg-hawkes-blue focus:ring-4 focus:outline-none focus:ring-tropical-blue rounded-lg text-sm bg-solitude transition ease-in-out duration-300">
                            <svg class="w-3 h-3 me-2 text-royal-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2c.6 0 1-.4 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
                            </svg>
                            Week 4 - PowerPoint Presentation
                          </a>
                        </li>
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-royal-blue border border-royal-blue hover:bg-hawkes-blue focus:ring-4 focus:outline-none focus:ring-tropical-blue rounded-lg text-sm bg-solitude transition ease-in-out duration-300">
                            <svg class="w-3 h-3 me-2 text-royal-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2c.6 0 1-.4 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
                            </svg>
                            Week 4 - Additional PDF Materials
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- Assessment and Tasks -->
                    <div class="col-span-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Assessment and
                        Tasks</label>
                      <ul class="list-none text-gray-500 space-y-3">
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-camarone border border-camarone hover:bg-granny-apple focus:ring-4 focus:outline-none focus:ring-chinook rounded-lg transition duration-300 ease-in-out bg-off-green">
                            <svg class="w-3 h-3 me-2 text-camarone" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3c.6 0 1 .4 1 1v15c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V5c0-.6.4-1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                            </svg>
                            Laboratory Activity 2
                          </a>
                        </li>
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-camarone border border-camarone hover:bg-granny-apple focus:ring-4 focus:outline-none focus:ring-chinook rounded-lg transition duration-300 ease-in-out bg-off-green">
                            <svg class="w-3 h-3 me-2 text-camarone" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3c.6 0 1 .4 1 1v15c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V5c0-.6.4-1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                            </svg>
                            Assignment 2
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
              <!-- Week 5 & 6 Content -->
              <div class="hidden p-4 rounded-lg bg-white drop-shadows w-full" id="week-5-6" role="tabpanel" aria-labelledby="week-5-6-tab">
                <form action="">
                  <div class="grid grid-cols-2 p-4 gap-6">
                    <!-- Week Topic Title Input -->
                    <div class="col-span-1">
                      <label for="" class="block mb-5 text-sm font-medium text-deep-koamaru">Week Topic Title</label>
                      <div class="text-deep-koamaru font-bold bg-ghost-white p-3 rounded-lg">Week 5 & 6 - Intorduction to JavaScript</div>
                    </div>
                    <!-- Learning Outcomes Input -->
                    <div class="col-start-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Learning Outcomes</label>
                      <div class="text-deep-koamaru text-sm font-regular bg-ghost-white p-3 rounded-lg">Can apply the basic technology on internet and on website that incorporates using HTML, CSS and JavaScript. Can create a functional website using JavaScript.</div>
                    </div>
                    <!-- Topics -->
                    <div class="col-start-2">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Topics</label>
                      <div class="text-deep-koamaru text-sm font-regular bg-ghost-white p-3 rounded-lg">
                        <ul class="list-disc pl-5 pt-4 text-deep-koamaru">
                          <li>Intorduction to JavaScript</li>
                          <li>Functions and Objects</li>
                          <li>JavaScript Expressions</li>
                          <li>Javascript Event Handler</li>
                          <li>Javascript in Web Browsers</li>
                        </ul>
                      </div>
                    </div>
                    <!-- Handouts -->
                    <div class="col-span-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Handouts</label>
                      <ul class="list-none text-gray-500 dark:text-gray-400 space-y-3">
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-royal-blue border border-royal-blue hover:bg-hawkes-blue focus:ring-4 focus:outline-none focus:ring-tropical-blue rounded-lg text-sm bg-solitude transition ease-in-out duration-300">
                            <svg class="w-3 h-3 me-2 text-royal-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2c.6 0 1-.4 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
                            </svg>
                            Week 5 & 6 - PowerPoint Presentation
                            <!-- FIXME Lumiliit ang icon -->
                          </a>
                        </li>
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-royal-blue border border-royal-blue hover:bg-hawkes-blue focus:ring-4 focus:outline-none focus:ring-tropical-blue rounded-lg text-sm bg-solitude transition ease-in-out duration-300">
                            <svg class="w-3 h-3 me-2 text-royal-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2c.6 0 1-.4 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
                            </svg>
                            Week 5 & 6 - Additional PDF Materials
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- Assessment and Tasks -->
                    <div class="col-span-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Assessment and
                        Tasks</label>
                      <ul class="list-none text-gray-500 dark:text-gray-400 space-y-3">
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-camarone border border-camarone hover:bg-granny-apple focus:ring-4 focus:outline-none focus:ring-chinook rounded-lg transition duration-300 ease-in-out bg-off-green">
                            <svg class="w-3 h-3 me-2 text-camarone" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3c.6 0 1 .4 1 1v15c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V5c0-.6.4-1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                            </svg>
                            Laboratory Activity 3
                          </a>
                        </li>
                        <li>
                          <a href="./student-quiz.php" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-camarone border border-camarone hover:bg-granny-apple focus:ring-4 focus:outline-none focus:ring-chinook rounded-lg transition duration-300 ease-in-out bg-off-green">
                            <svg class="w-3 h-3 me-2 text-camarone" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3c.6 0 1 .4 1 1v15c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V5c0-.6.4-1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                            </svg>
                            Quiz 1
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
              <!-- Week 7 Content -->
              <div class="hidden p-4 rounded-lg bg-white drop-shadows w-full" id="week-7" role="tabpanel" aria-labelledby="week-7-tab">
                <form action="">
                  <div class="grid grid-cols-2 p-4 gap-6">
                    <!-- Week Topic Title Input -->
                    <div class="col-span-1">
                      <label for="" class="block mb-5 text-sm font-medium text-deep-koamaru">Week Topic Title</label>
                      <div class="text-deep-koamaru font-bold bg-ghost-white p-3 rounded-lg">Week 7 - Hypertext Preprocessor</div>
                    </div>
                    <!-- Learning Outcomes Input -->
                    <div class="col-start-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Learning Outcomes</label>
                      <div class="text-deep-koamaru text-sm font-regular bg-ghost-white p-3 rounded-lg">Can apply the basic technology on internet and on website in the electronic commerce project or online store. Familiarize Hypertext Processor & create and design a functional website using PHP.</div>
                    </div>
                    <!-- Topics -->
                    <div class="col-start-2">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Topics</label>
                      <div class="text-deep-koamaru text-sm font-regular bg-ghost-white p-3 rounded-lg">
                        <ul class="list-disc pl-5 pt-4 text-deep-koamaru">
                          <li>Intorduction to PHP</li>
                          <li>PHP Form</li>
                          <li>Handling</li>
                          <li>Validation</li>
                          <li>Cookies and Session</li>
                        </ul>
                      </div>
                    </div>
                    <!-- Handouts -->
                    <div class="col-span-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Handouts</label>
                      <ul class="list-none text-gray-500 dark:text-gray-400 space-y-3">
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-royal-blue border border-royal-blue hover:bg-hawkes-blue focus:ring-4 focus:outline-none focus:ring-tropical-blue rounded-lg text-sm bg-solitude transition ease-in-out duration-300">
                            <svg class="w-3 h-3 me-2 text-royal-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2c.6 0 1-.4 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
                            </svg>
                            Week 7 - PowerPoint Presentation
                          </a>
                        </li>
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-royal-blue border border-royal-blue hover:bg-hawkes-blue focus:ring-4 focus:outline-none focus:ring-tropical-blue rounded-lg text-sm bg-solitude transition ease-in-out duration-300">
                            <svg class="w-3 h-3 me-2 text-royal-blue" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path fill-rule="evenodd" d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2c.6 0 1-.4 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z" clip-rule="evenodd" />
                            </svg>
                            Week 7 - Additional PDF Materials
                          </a>
                        </li>
                      </ul>
                    </div>
                    <!-- Assessment and Tasks -->
                    <div class="col-span-1">
                      <label for="" class="block mb-2 text-sm font-medium text-deep-koamaru">Assessment and
                        Tasks</label>
                      <ul class="list-none text-gray-500 dark:text-gray-400 space-y-3">
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-camarone border border-camarone hover:bg-granny-apple focus:ring-4 focus:outline-none focus:ring-chinook rounded-lg transition duration-300 ease-in-out bg-off-green">
                            <svg class="w-3 h-3 me-2 text-camarone" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3c.6 0 1 .4 1 1v15c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V5c0-.6.4-1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                            </svg>
                            Laboratory Activity 4
                          </a>
                        </li>
                        <li>
                          <a href="#" class="w-full px-3 py-2 text-sm font-medium text-center inline-flex items-center text-camarone border border-camarone hover:bg-granny-apple focus:ring-4 focus:outline-none focus:ring-chinook rounded-lg transition duration-300 ease-in-out bg-off-green">
                            <svg class="w-3 h-3 me-2 text-camarone" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3c.6 0 1 .4 1 1v15c0 .6-.4 1-1 1H6a1 1 0 0 1-1-1V5c0-.6.4-1 1-1h3m0 3h6m-6 5h6m-6 4h6M10 3v4h4V3h-4Z" />
                            </svg>
                            Assignment 3
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
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