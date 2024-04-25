<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Learning Management System | Student Activity</title>
  <!-- Tailwind cdn -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <!-- Flowbite cdn -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <!-- Icon -->
  <link rel="icon" type="image/png" href="../assets/images/LMS-logo.png" />
  <!-- Css link -->
  <link rel="stylesheet" href="../assets/style.css">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/1beb5182c0.js" crossorigin="anonymous"></script>
</head>
<!-- Student side/navigation bar -->
<?php
include_once './side-nav-bar.php';
?>


<body class="bg-ghost-white">
  <div class="p-4 sm:ml-64 sm:mr-[22rem]">
    <div class="pt-4 pl-4 mt-14">
      <!-- Course/Activity Title -->
      <h1 class="font-bold text-4xl pb-6 text-corn-flower-blue mb-2">Software Engineering | Laboratory Activity 1</h1>
      <!-- Instructions -->
      <div class="bg-lav-sant pt-6 pb-8 px-8 rounded-2xl">
        <h2 class="text-lg font-medium text-deep-koamaru mb-3">Instructions:</h2>
        <ul class="max-w-md space-y-1 text-sm text-deep-koamaru list-disc list-inside mb-4">
          <li>
            <span class="font-medium">Time:</span> Complete it within 30 minutes of starting.
          </li>
          <li>
            <span class="font-medium">Due Date:</span> Due by 11:59 PM on April 30, 2024
          </li>
          <li>
            <span class="font-medium">Number of Attempts:</span> You have only 1 attempt for this quiz.
          </li>
        </ul>
        <a href="../assets/learning-materials/sample-learning-material.pdf"
          class="inline-flex gap-1 items-center justify-center px-4 py-2 bg-neon-blue text-white font-medium flex items-center cursor-pointer transition ease-in-out duration-300 hover:scale-105 rounded-md hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano"
          target="_blank">
          SE101-Lab-Activity#1
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-4 h-4 ml-2 text-white">
            <path stroke-linecap="round" stroke-linejoin="round"
              d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
          </svg>
        </a>
      </div>
      <!-- Drag and drop file -->
      <section class="section-container">
        <div class="flex flex-col items-center mb-4">
          <div class="mt-6 py-3 rounded-lg w-full">
            <h3 class="text-corn-flower-blue text-2xl font-medium text-center">
              Upload your work here
            </h3>
            <!-- Documents uploads form and instructions -->
            <section class="mt-5 flex gap-6">
              <div
                class="flex-1 flex flex-col items-center p-3 border-4 bg-lav-sant border-dashed border-lavender-blue rounded-lg drag-area">
                <svg class="w-16 h-16 text-corn-flower-blue mt-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2" />
                </svg>
                <header class="mt-1 text-deep-koamaru">
                  <span class="drag-file">Drag files here </span> or
                  <button
                    class="px-2 py-1 text-neon-blue bg-ghost-lavender focus:outline-none hover:bg-lavender-blue focus:ring-4 focus:ring-deep-lav-blue font-medium rounded-md text-sm transition ease-in-out duration-300 hover:scale-105 file-input-button">
                    Choose File
                  </button>
                </header>
                <p class="mt-8 text-slate-400 text-sm">
                  JPG, DOCX, PNG or PDF only, maximum file size-25MB
                </p>
                <input type="file" class="file-input" hidden />
              </div>
            </section>
            <!-- Images groups - All the selected images will be shown here -->
            <p class="text-red-700 text-sm hidden" id="filesize-error">
              The file size should be less than 25mb
            </p>
            <p class="text-red-700 text-sm hidden" id="filetype-error">
              The file should be an image or pdf only
            </p>
            <!-- No document selected -->
            <p class="hidden text-xl text-red-600 text-center bg-pink-200 mt-6 p-3 rounded-lg" id="input-empty-error">
            </p>
            <!-- Showing all the files inside this list -->
            <ul id="document-images" class="mt-6 px-3 bg-slate-100"></ul>
          </div>
          <button
            class="w-[10rem] text-white bg-neon-blue hover:bg-free-speech-blue focus:ring-4 focus:outline-none focus:ring-perano font-medium rounded-md text-sm px-5 py-2.5 text-center transition ease-in-out duration-300 hover:scale-105 document-next-button">
            Upload
          </button>
        </div>
      </section>
      <section class="text-center hidden">
        <!-- Sanple Uploaded file -->
        <iframe class="pdf w-full h-[60rem] py-7 rounded-2xl" id="learning-material"
          src="../assets/learning-materials/sample-learning-material.pdf">
        </iframe>
      </section>
      <!-- TODO: Interface for Uploaded and Finished Work -->
    </div>
    <!-- Right Sidebar -->
    <aside id="logo-sidebar"
      class="fixed top-0 right-0 z-40 w-[22rem] h-screen pt-20 transition-transform -translate-x-full bg-ghost-white sm:translate-x-0 hidden sm:block"
      aria-label="Sidebar">
      <div class="h-full pt-2 pb-7 space-y-5 pl-1 pr-8 overflow-y-auto bg-ghost-white">
        <!-- Assignment card -->
        <div class="block max-w-sm p-8 bg-white rounded-2xl drop-shadows overflow-y-auto">
          <h5 class="mb-6 text-2xl font-bold tracking-tight text-corn-flower-blue">Assignment</h5>
          <div class="space-y-2">
            <!-- Status -->
            <span class="inline-flex items-center gap-3 font-medium text-deep-koamaru">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5 text-corn-flower-blue">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
              </svg>
              Status:
              <span
                class="inline-flex items-center bg-lime-50 text-green-700 text-sm font-medium px-4 py-1.5 rounded-full">
                Done
              </span>
            </span>
            <!-- Start Date -->
            <span class="inline-flex items-center gap-3 font-medium text-deep-koamaru">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-5 h-5 text-corn-flower-blue">
                <path
                  d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                <path fill-rule="evenodd"
                  d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                  clip-rule="evenodd" />
              </svg>
              Start: April 12, 2024
            </span>
            <!-- Due Date -->
            <span class="inline-flex items-center gap-3 font-medium text-deep-koamaru">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-5 h-5 text-corn-flower-blue">
                <path
                  d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                <path fill-rule="evenodd"
                  d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                  clip-rule="evenodd" />
              </svg>
              End: April 16, 2024
            </span>
            <!-- Grade -->
            <span class="inline-flex items-center gap-3 font-medium text-deep-koamaru">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-5 h-5 text-corn-flower-blue">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
              </svg>
              Grade:
              <span
                class="inline-flex items-center bg-blue-50 text-royal-blue text-sm font-medium px-4 py-1.5 rounded-full">
                Pending
              </span>
            </span>
          </div>
        </div>
        <!-- Add Comment card -->
        <div class="block max-w-sm p-8 bg-white rounded-2xl drop-shadows overflow-y-auto space-y-4">
          <h5 class="mb-2 text-lg font-medium tracking-tight text-corn-flower-blue">Private Comments</h5>
          <form>
            <label for="chat" class="sr-only">Add comment</label>
            <div class="flex items-center gap-2">
              <textarea id="chat" rows="1"
                class="block p-2.5 w-full text-sm bg-ghost-white rounded-lg border border-none cursor-pointer focus:cursor-auto focus:ring-neon-blue focus:border-neon-blue resize-none overflow-hidden text-deep-koamaru placeholder:text-neon-blue focus:placeholder:text-deep-koamaru placeholder:font-medium transition duration-300 ease-in-out hover:bg-ghost-lavender focus:hover:bg-ghost-white focus:placeholder:font-normal"
                placeholder="Add comment"></textarea>
              <!-- Submit Button -->
              <button id="submit-button" type="submit"
                class="hidden inline-flex justify-center p-2 text-witty-blue rounded-full cursor-not-allowed transition duration-300 ease-in-out">
                <!-- hover:bg-ghost-lavender text-neon-blue -->
                <svg class="w-4 h-4 rotate-90 rtl:-rotate-90" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                  fill="currentColor" viewBox="0 0 18 20">
                  <path
                    d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                </svg>
                <span class="sr-only">Submit</span>
              </button>
            </div>
          </form>
          <div class="bg-ghost-white p-3 rounded-md">
            <span class="text-deep-koamaru font-medium">
              Juan Dela Cruz
              <span class="italic block font-normal text-sm">April 19</span>
            </span>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum nemo ad mollitia natus.</p>
          </div>
        </div>
      </div>
    </aside>
    <script>
      // Hiding submit button
      var textarea = document.getElementById('chat');
      var submitButton = document.getElementById('submit-button');

      // Show submit button when textarea is focused
      textarea.addEventListener('focus', function () {
        submitButton.style.display = 'inline-flex';
      });

      // Hide submit button when textarea loses focus
      textarea.addEventListener('blur', function () {
        submitButton.style.display = 'none';
      });

      // Auto height of textarea
      var textarea = document.getElementById('chat');
      textarea.addEventListener('input', autoResize, false);

      function autoResize() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';

      }
      // Button state

      // Set the initial state of the submit button to disabled
      submitButton.disabled = true;

      // Add an event listener for the input event on the textarea
      textarea.addEventListener('input', function () {
        // If the textarea is empty, disable the button, otherwise enable it
        if (this.value.trim() === '') {
          submitButton.disabled = true;
          submitButton.classList.add('text-witty-blue', 'cursor-not-allowed');
          submitButton.classList.remove('hover:bg-ghost-lavender', 'text-neon-blue', 'cursor-pointer');
        } else {
          submitButton.disabled = false;
          submitButton.classList.add('hover:bg-ghost-lavender', 'text-neon-blue', 'cursor-pointer');
          submitButton.classList.remove('text-witty-blue', 'cursor-not-allowed');
        }
      });


      // For Drag and Drop Component
      //selecting all required elements
      const dropArea = document.querySelector(".drag-area"),
        dragFile = dropArea.querySelector(".drag-file"),
        button = dropArea.querySelector(".file-input-button"),
        input = dropArea.querySelector(".file-input");

      let documentImages = document.querySelector("#document-images");

      /*
       * When the user clicks the previous button, the current section is hidden and the previous section is
       * shown.
       * @param sectionContainer - the section that is currently being displayed
       */
      const prevButtonNavigation = (sectionContainer) => {
        sectionContainer.classList.add("hidden");
        sectionContainer.previousElementSibling.classList.add("block");
        sectionContainer.previousElementSibling.classList.remove("hidden");
      };

      /*
       * When the next button is clicked, hide the current section and show the next section.
       * @param sectionContainer - the section that is currently being displayed
       */
      const nextButtonNavigation = (sectionContainer) => {
        sectionContainer.classList.add("hidden");
        sectionContainer.nextElementSibling.classList.add("block");
        sectionContainer.nextElementSibling.classList.remove("hidden");
      };

      // Files array to check whether there is any file 
      // selected or not
      let documentFileObj = {
        fileName: []
      };


      // Input validation to check whether the fileName
      // array in documentFileObj has any file or not and
      // throw the error accordingly
      const validationInputs = (container, dataObject) => {
        const errorMessage = container.querySelector("#input-empty-error");
        const emptyFields = [];
        for (const key in dataObject) {
          if (dataObject[key].length <= 0) {
            emptyFields.push(key.toLowerCase());
          }
        }
        errorMessage.textContent = `Please select a file before clicking the 'Upload' button!`;
        errorMessage.classList.remove("hidden");
        setTimeout(() => {
          errorMessage.classList.add("hidden");
        }, 2000);
      };



      button.onclick = () => {
        input.click(); //if user click on the button then the input also gets clicked
      };

      input.addEventListener("change", function (e) {
        const target = e.target;
        setttingFileValue(target);
      });

      // Finding the document closest to the delete button and removing it from the list
      documentImages.addEventListener("click", (e) => {
        const target = e.target;
        const deleteFileButton = target.closest(".delete-document");
        const documentsWrapper = target.closest("#document-images");
        const documentToDelete = target.closest(".document-file");
        const documentName = documentToDelete.firstElementChild.children[1].innerText;

        if (deleteFileButton === null) return;

        /* This is finding the index of the file name in the documentFileObj object. */
        const index = documentFileObj["fileName"].find((x) => x === documentName);
        /* This is removing the file name from the documentFileObj object. */
        documentFileObj["fileName"].splice(index, 1);
        documentsWrapper.removeChild(documentToDelete);
      });

      /**
       * If the file type is jpg, jpeg, or png, return the text-violet-600 fa-image class. Otherwise, return
       * the text-red-600 fa-file-pdf class.
       * @param fileType - The file type of the file.
       * @returns A function that takes a fileType as an argument and returns a string.
       */
      const fileTypeLogo = (fileType) => {
        if (fileType === "jpg" || fileType === "jpeg" || fileType === "png") {
          return "text-indigo-400 fa-image";
        } else if (fileType === "vnd.openxmlformats-officedocument.wordprocessingml.document") {
          return "text-blue-500 fa-file-word"; // replace with your DOCX icon class
        } else {
          return "text-red-500 fa-file-pdf";
        }
      };

      // //If user Drag File Over DropArea
      /* This is an event listener. It is listening for the dragover event. When the dragover event is
      triggered, it will prevent the default behavior, add the active class to the dropArea element, and
      change the text of the dragFile element. */
      dropArea.addEventListener("dragover", (event) => {
        event.preventDefault(); //preventing from default behaviour
        dropArea.classList.add("active");
        dragFile.textContent = "Release to Upload File";
      });

      // //If user leave dragged File from DropArea
      /* This is an event listener. It is listening for the dragleave event. When the dragleave event is
      triggered, it will remove the active class from the dropArea element and change the text of the
      dragFile
      element. */
      dropArea.addEventListener("dragleave", () => {
        dropArea.classList.remove("active");
        dragFile.textContent = "Drag files here";
      });

      //If user drop File on DropArea
      /* This is an event listener. It is listening for the drop event. When the drop event is triggered, it
      will prevent the default behavior, remove the active class from the dropArea element, change the
      text of the dragFile element, and call the setttingFileValue function. */
      dropArea.addEventListener("drop", (e) => {
        e.preventDefault();
        const target = e.dataTransfer;
        dropArea.classList.remove("active");
        dragFile.textContent = "Drag files here";
        setttingFileValue(target);
      });

      // Navigation part
      /* This is an event listener. It is listening for the click event. When the click event is triggered,
      it will check if the target is the nextButton or prevButton. If it is the nextButton, it will check
      if the documentFileObj object has a fileName property. If it does, it will call the
      nextButtonNavigation function. If it does not, it will show an alert. If the target is the
      prevButton, it will call the prevButtonNavigation function. */
      document.querySelector("body").addEventListener("click", (e) => {
        const target = e.target;
        const prevButton = target.closest(".document-prev-button");
        const nextButton = target.closest(".document-next-button");
        const sectionContainer = target.closest(".section-container");

        if (nextButton) {
          if (documentFileObj["fileName"].length !== 0) {
            nextButtonNavigation(sectionContainer);
          } else {
            validationInputs(sectionContainer, documentFileObj);
          }
        }

        if (prevButton) {
          prevButtonNavigation(sectionContainer);
        }
      });


      const setttingFileValue = (target) => {
        /*getting user select file and [0] this means if user select multiple files then we'll select only the first one
           This is getting the file name, file size, and file type. */
        const fileName = target.files[0].name;
        const fileSize = target.files[0].size;
        const fileType = target.files[0].type.split("/").pop(); //fetching only the part after slash

        let filesizeErrorMessage = document.getElementById("filesize-error");
        let filetypeErrorMessage = document.getElementById("filetype-error");

        /* This is checking the file size. If the file size is greater than 25mb, it will show an error
          message. */
        let sizeInMB = Number.parseFloat(fileSize / (1024 * 1024)).toFixed(2);
        if (sizeInMB > 25) {
          filesizeErrorMessage.classList.remove("hidden");
          filetypeErrorMessage.classList.add("hidden");
        } else {
          filesizeErrorMessage.classList.add("hidden");
          /* This is checking the file type. If the file type is not pdf or image, it will show an error message. */
          const fileTypes = ["application/pdf", "image/png", "image/jpg", "image/jpeg", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"]
          if (
            fileTypes.includes(target.files[0].type)
          ) {
            filetypeErrorMessage.classList.add("hidden");

            /* This is creating a new element and setting the file name, file size, and file type. */
            let newDocument = document.createElement("li");

            /* Setting the class attribute of the newDocument element. */
            newDocument.setAttribute(
              "class",
              "py-3 flex justify-between items-center md:items-end text-xs md:text-sm text-slate-700 border-b-2 border-slate-100 gap-1 document-file"
            );

            /* Setting the html markup of the new element and setting the file name, file size, and file type. */
            newDocument.innerHTML = `
            <p class="whitespace-nowrap overflow-hidden text-ellipsis w-40"><i class="fa-solid text-xl mr-5 ${fileTypeLogo(
              fileType
            )}"></i> 
            <span>${fileName}<span></p>
            <p>${fileType}</p>
            <p>${sizeInMB}mb</p>
            <p>Uploaded</p>
            <button class="delete-document"><i class="fa-solid fa-trash"></i></button>
            `;
            /* Adding the newDocument element to the documentImages element. */
            documentImages.append(newDocument);
            /* This is adding the file name to the documentFileObj object. */
            documentFileObj["fileName"].push(fileName);
          } else {
            filetypeErrorMessage.classList.remove("hidden");
          }
        }
      };
    </script>
    <!-- Flowbite cdn -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <!-- Tailwind colors -->
    <script src="../assets/tailwind.config.js"></script>
</body>

</html>