//subjectHandled
//addStudent
//viewStudent
//viewAttendance

function subjectHandled() {
  document.getElementById("subjectHandled").style.display = "block";
  document.getElementById("addStudent").style.display = "none";
  document.getElementById("viewStudent").style.display = "none";
  document.getElementById("homee").style.display = "none";

  document.getElementById("teacherAttendance").style.display = "none";
}

function addStudent() {
  document.getElementById("addStudent").style.display = "block";
  document.getElementById("subjectHandled").style.display = "none";
  document.getElementById("viewStudent").style.display = "none";
  document.getElementById("homee").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "none";
}

function viewAttendance() {
  document.getElementById("addStudent").style.display = "none";
  document.getElementById("subjectHandled").style.display = "none";
  document.getElementById("viewStudent").style.display = "none";
  document.getElementById("homee").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "none";
}

function viewStudent() {
  document.getElementById("addStudent").style.display = "none";
  document.getElementById("subjectHandled").style.display = "none";
  document.getElementById("viewStudent").style.display = "block";
  document.getElementById("homee").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "none";
}

function teacherAttendance() {
  document.getElementById("addStudent").style.display = "none";
  document.getElementById("subjectHandled").style.display = "none";
  document.getElementById("viewStudent").style.display = "none";
  document.getElementById("homee").style.display = "none";
  document.getElementById("teacherAttendance").style.display = "block";
}
