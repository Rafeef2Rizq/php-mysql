<?php
$conn=mysqli_connect("localhost","root","","crud");
if(!$conn){
    die('faild connect to database'.mysqli_connect_errno());
}