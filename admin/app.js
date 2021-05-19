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

function confirmationDelete(anchor) {
  var conf = confirm("Are you sure want to delete this teacher?");
  if (conf) window.location = anchor.attr("href");
}
