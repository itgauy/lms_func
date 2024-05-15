window.onload = function () {
  var inputs = document.getElementsByTagName('input'); //CAPSLOCK LAHAT NG TEXT EWAN COPY PASTE LANG TO JK
  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].type.toLowerCase() == 'text') {
      inputs[i].addEventListener('input', function () {
        this.value = this.value.toUpperCase();
      });
    }
  }

  // //eto naman forda temporary password (current date tsaka sn naman gamit)
  // function generatePassword() {
  //   if (snField.value) {
  //     var currentDate = new Date();
  //     var dateStr = currentDate.getFullYear() + ('0' + (currentDate.getMonth() + 1)).slice(-2) + ('0' + currentDate.getDate()).slice(-2);
  //     var snStr = snField.value.replace(/\D/g, '');
  //     passField.value = dateStr + snStr;
  //   } else {
  //     passField.value = '';
  //   }
  // }

  //pang validate lang ng date para may error message (CV lang hehe)
  function isValidDate(dateString) {
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    if (!dateString.match(regEx)) return false;  // Invalid format
    var d = new Date(dateString);
    var dNum = d.getTime();
    if (!dNum && dNum !== 0) return false; // NaN value, Invalid date
    return d.toISOString().slice(0, 10) === dateString;
  }


  //eto naman forda letters lang only
  var fnameField = document.getElementById('fname');
  var mnameField = document.getElementById('mname');
  var lnameField = document.getElementById('lname');

  fnameField.addEventListener('input', validateName); //eventlistener dapat eto nalang ginamit ko instead oninput sa taas
  mnameField.addEventListener('input', validateName);
  lnameField.addEventListener('input', validateName);

  function validateName(event) {
    event.target.value = event.target.value.replace(/[^A-Za-z\s]/g, '').replace(/\s+/g, ' ');
  }



}

//pang toggle ng readonly kapag regular or irregular yung classification
function toggleSectionReadonly(isReadonly) {
  var sectionInput = document.getElementById('section1');
  sectionInput.readOnly = isReadonly;
}

//Adding and removing of required label depende sa class
function addRequiredLabel1() {
  document.getElementById('sectionRequired1').innerHTML = '<b style="color:red;"> *</b>';
}

function removeRequiredLabel1() {
  document.getElementById('sectionRequired1').innerHTML = '';
  document.getElementById('section1').value = '';
}


function addStudent(form) {
  var xhr = new XMLHttpRequest();
  xhr.open(form.method, form.action);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {       //AJAX temp lang for alert pag successful (SUKO NA KO)
      if (xhr.responseText === 'success') {
        alert('Student account added successfully!');
        form.reset(); // Reset the form fields
        window.scrollTo(0, 0); // Scroll to the top of the page
      } else {
        alert('An error occurred: ' + xhr.responseText);
      }
    }
  };
  xhr.send(new FormData(form));
}

document.addEventListener('DOMContentLoaded', function () {

  var urlParams = new URLSearchParams(window.location.search);
  var hi = true;
  if (urlParams.get('showModal') === 'true' && hi === true) {
    var modal1 = document.getElementById('success-modal');
    modal1.style.display = 'flex';
  } else if (urlParams.get('archive_success') === 'true' && hi === true) {
    var modalArch = document.getElementById('archive-success-modal');
    modalArch.style.display = 'flex';
  }

  var okinaArchive = document.getElementById('okina-archive');

  okinaArchive.addEventListener('click', function () {
    hi = false;
    modalArch.style.display = 'none';
  });

  var oktyyy = document.getElementById('oktyyy');

  oktyyy.addEventListener('click', function () {
    hi = false;
    modal1.style.display = 'none';

  });



  var button1 = document.getElementById('save_change');
  var konperm = document.getElementById('konperm1');
  var kansel = document.getElementById('kansel1');
  var modal_edit = document.getElementById('edit-student-modal');

  button1.addEventListener('click', function () {
    modal_edit.scrollTop = 0;
    modal_edit.style.overflow = 'hidden';
  });
  konperm.addEventListener('click', function () {
    modal_edit.style.overflowY = 'scroll';
  });
  kansel.addEventListener('click', function () {
    modal_edit.style.overflowY = 'scroll';
  });
});