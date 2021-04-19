function addTeacher(){
    document.getElementById('addTeacher').style.display='block';
    document.getElementById('addStudent').style.display='none';
    document.getElementById('viewTeacher').style.display='none';
    document.getElementById('viewAttendance').style.display='none';

    
}

function addStudent(){
    document.getElementById('addStudent').style.display='block';
    document.getElementById('addTeacher').style.display='none';
    document.getElementById('viewTeacher').style.display='none';
    document.getElementById('viewAttendance').style.display='none';
 }

 function viewAttendance(){
    document.getElementById('addStudent').style.display='none';
    document.getElementById('addTeacher').style.display='none';
    document.getElementById('viewTeacher').style.display='none';
    document.getElementById('viewAttendance').style.display='block';
 }

 function viewTeacher(){
    document.getElementById('addStudent').style.display='none';
    document.getElementById('addTeacher').style.display='none';
    document.getElementById('viewTeacher').style.display='block';
    document.getElementById('viewAttendance').style.display='none';
 }