function addTeacher() {
  document.getElementById("addTeacher").style.display = "block";
  document.getElementById("viewTeacher").style.display = "none";
  document.getElementById("viewAttendance").style.display = "none";
  document.getElementById("homee").style.display = "none";
}

function viewAttendance() {
  document.getElementById("addTeacher").style.display = "none";
  document.getElementById("viewTeacher").style.display = "none";
  document.getElementById("viewAttendance").style.display = "block";
  document.getElementById("homee").style.display = "none";
}

function viewTeacher() {
  document.getElementById("addTeacher").style.display = "none";
  document.getElementById("viewTeacher").style.display = "block";
  document.getElementById("viewAttendance").style.display = "none";
  document.getElementById("homee").style.display = "none";
}
