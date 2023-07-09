<?php
session_start();
require('db.php') ;
$connection=new connection();



$id = $_POST['id'] ;
if ($id)  {
    $notes = $connection->updateNote($id, $_POST);
  
    $_SESSION['message'] = "Note updated successfully";
}else if (isset($_POST['delete_note']))  {
    $notes = $connection->deleteNote($_POST['delete_note']);
  
    $_SESSION['message'] = "Note deleted successfully";
} else  {
    $notes = $connection->addNote($_POST);
    $_SESSION['message'] = "Note added successfully";
}

header("Location:index.php");