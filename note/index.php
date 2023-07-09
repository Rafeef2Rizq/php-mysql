<?php
session_start();
require('db.php') ;
$connection=new connection();
$notes=$connection->getNotes();
$curentNote=[
  'id'=>'',
  'title'=>'',
  'description'=>''
];

if(isset($_GET['id'])){
$curentNote=$connection->getNotesByID($_GET['id']);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
    <title>Note</title>
  </head>
  <body>

   <div class="container mt-5">
   <?php  include('message.php')?>
<div class="card card-new">

    <div class="card-header ">
        <h4>Add note</h4>
    </div>
    <div class="card-body">
    <div class="mb-3">
      <a href="index.php" class="btn btn-danger float-left">Back</a>
    <form action="save.php" method="post">
      <input type="hidden" name="id" value="<?php echo $curentNote['id'];   ?>">
  <label for="title" class="form-label">Note title</label>
  <input type="text" class="form-control" name="title" id="title"
  value="<?php echo $curentNote['title']; ?>"
  >
</div>
<div class="mb-3">
  <label for="description" class="form-label">Note description</label>
  <textarea class="form-control" id="description" name="description" rows="3">
<?php echo $curentNote['description']; ?>
  </textarea>
</div>
<button type="submite"  class="btn btn-outline-success" >
  <?php echo isset($_GET['id'])?'Update Note' :'New Note' ?></button>
    </div>
</div>
<div class="row">
<?php

  foreach ($notes as  $note) {
 
 
?>
<div class="col-sm-4">
      
      <div class="alert alert-warning note-row note-row" role="alert">
      <div class="note-title">
          <a href="?id=<?= $note['id']; ?>"><?= $note['title']; ?></a>
      </div>
      <span class="note-date">Created on: <?= $note['date']; ?></span>
        <span class="note-text"><?= $note['description']; ?></span>
        <form action="save.php" method="post">
        <button type="submite"  value="<?= $note['id']; ?>" name="delete_note" class="close close-icon" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </form>
       
        </button>
      </div>
    </div>

<?php } ?>

     
      
      </form>
    </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
