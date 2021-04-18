
//wew
var newTeacher = document.getElementById('newTeacher');
var newStudent = document.getElementById('newStudent');
var showTeacher = document.getElementById('showTeacher');
var attendance = document.getElementById('attendance');


newTeacher.onclick = function() {
    var div1 = document.getElementById('addTeacher');
    var div2 = document.getElementById('addStudent');
    if (div1.style.display === 'none' ) {
        div1.style.display = 'block';
    }
    else {
        div1.style.display = 'none';
    }
}


newStudent.onclick = function() {
    var div = document.getElementById('addStudent');
    if (div.style.display === 'block') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
}


showTeacher.onclick = function() {
    var div = document.getElementById('viewTeacher');
    if (div.style.display === 'block') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
}


attendance.onclick = function() {
    var div = document.getElementById('viewAttendance');
    if (div.style.display === 'block') {
        div.style.display = 'none';
    }
    else {
        div.style.display = 'block';
    }
}