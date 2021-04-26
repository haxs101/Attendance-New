//subjectHandled
//addStudent
//viewStudent
//viewAttendance


function subjectHandled() {
    document.getElementById('subjectHandled').style.display = 'block';
    document.getElementById('addStudent').style.display = 'none';
    document.getElementById('viewStudent').style.display = 'none';
    document.getElementById('viewAttendance').style.display = 'none';


}

function addStudent() {
    document.getElementById('addStudent').style.display = 'block';
    document.getElementById('subjectHandled').style.display = 'none';
    document.getElementById('viewStudent').style.display = 'none';
    document.getElementById('viewAttendance').style.display = 'none';
}

function viewAttendance() {
    document.getElementById('addStudent').style.display = 'none';
    document.getElementById('subjectHandled').style.display = 'none';
    document.getElementById('viewStudent').style.display = 'none';
    document.getElementById('viewAttendance').style.display = 'block';
}

function viewStudent() {
    document.getElementById('addStudent').style.display = 'none';
    document.getElementById('subjectHandled').style.display = 'none';
    document.getElementById('viewStudent').style.display = 'block';
    document.getElementById('viewAttendance').style.display = 'none';
}