//subjectHandled
//addStudent
//viewStudent
//viewAttendance

function subjectHandled() {
  document.getElementById("subjectHandled").style.display = "block";
  document.getElementById("addStudent").style.display = "none";
  document.getElementById("viewStudent").style.display = "none";
  document.getElementById("homee").style.display = "none";
  document.getElementById("myViewStudent").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "none";
  document.getElementById("updateProfile").style.display = "none";
  document.getElementById("changePassword").style.display = "none";
}

function addStudent() {
  document.getElementById("addStudent").style.display = "block";
  document.getElementById("subjectHandled").style.display = "none";
  document.getElementById("viewStudent").style.display = "none";
  document.getElementById("homee").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "none";
  document.getElementById("myViewStudent").style.display = "none";
  document.getElementById("updateProfile").style.display = "none";
  document.getElementById("changePassword").style.display = "none";
}

function viewAttendance() {
  document.getElementById("addStudent").style.display = "none";
  document.getElementById("subjectHandled").style.display = "none";
  document.getElementById("viewStudent").style.display = "none";
  document.getElementById("homee").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "none";
  document.getElementById("myViewStudent").style.display = "none";
  document.getElementById("updateProfile").style.display = "none";
  document.getElementById("changePassword").style.display = "none";
}

function viewStudent() {
  document.getElementById("addStudent").style.display = "none";
  document.getElementById("subjectHandled").style.display = "none";
  document.getElementById("viewStudent").style.display = "block";
  document.getElementById("homee").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "none";
  document.getElementById("myViewStudent").style.display = "none";
  document.getElementById("updateProfile").style.display = "none";
  document.getElementById("changePassword").style.display = "none";
}

function teacherAttendance() {
  document.getElementById("addStudent").style.display = "none";
  document.getElementById("subjectHandled").style.display = "none";
  document.getElementById("viewStudent").style.display = "none";
  document.getElementById("homee").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "block";
  document.getElementById("myViewStudent").style.display = "none";
  document.getElementById("updateProfile").style.display = "none";
  document.getElementById("changePassword").style.display = "none";
}

function myViewStudent() {
  document.getElementById("addStudent").style.display = "none";
  document.getElementById("subjectHandled").style.display = "block";
  document.getElementById("viewStudent").style.display = "none";
  document.getElementById("homee").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "none";
  document.getElementById("myViewStudent").style.display = "block";
  document.getElementById("updateProfile").style.display = "none";
  document.getElementById("changePassword").style.display = "none";
}

function updateProfile() {
  document.getElementById("addStudent").style.display = "none";
  document.getElementById("subjectHandled").style.display = "none";
  document.getElementById("viewStudent").style.display = "none";
  document.getElementById("homee").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "none";
  document.getElementById("myViewStudent").style.display = "none";
  document.getElementById("updateProfile").style.display = "block";
  document.getElementById("changePassword").style.display = "none";
  //updateProfile
}

function changePassword() {
  document.getElementById("addStudent").style.display = "none";
  document.getElementById("subjectHandled").style.display = "none";
  document.getElementById("viewStudent").style.display = "none";
  document.getElementById("homee").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "none";
  document.getElementById("myViewStudent").style.display = "none";
  document.getElementById("updateProfile").style.display = "none";
  document.getElementById("changePassword").style.display = "block";
}

function confirmationDelete(anchor) {
  var conf = confirm("Are you sure want to delete this student?");
  if (conf) window.location = anchor.attr("href");
}
