<?php
session_start();
require "dbcon.php";

//delete section
if(isset($_POST['delete_student'])){
    $student_id=$_POST['delete_student'];
    $id = mysqli_real_escape_string($conn,  $student_id);
  
    $query = "delete from students 
    where id='$student_id'";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['message'] = "Student deleted successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student not delete ";
        header("Location: index.php");
        exit(0);
    }
}
//update section
if(isset($_POST['update-student'])){
    $student_id=$_POST['student_id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $query = "update  students set name='$name',email='$email',phone='$phone',course='$course' 
    where id='$student_id'";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['message'] = "Student updated successfully";
        header("Location: index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student not updated ";
        header("Location: index.php");
        exit(0);
    }
}

















if (isset($_POST['save-student'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $query = "insert into students(name,email,phone,course) values('$name','$email','$phone','$course')";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $_SESSION['message'] = "Student created successfully";
        header("Location: student-create.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Student not created ";
        header("Location: student-create.php");
        exit(0);
    }
}
