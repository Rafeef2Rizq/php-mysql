
<?php require "dbcon.php"?>

<!doctype html>
<?php session_start();

?>
 <?php include 'icludes/header.php'?>

<body>
    <div class="container mt-5">
 <?php include 'message.php'?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Stedents details
                            <a href="student-create.php" class="btn btn-danger float-end">Add student</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Student name</th>
      <th scope="col">email</th>
      <th scope="col">Phone</th>
      <th scope="col">Course</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $query="select * from students";
    $query_run=mysqli_query($conn,$query);
    if(mysqli_num_rows($query_run)>0){  
        foreach ($query_run as $student) :
        ?>
 <tr>
    
      <td><?= $student['id'] ?></td>
      <td><?= $student['name'] ?></td>
      <td><?= $student['email'] ?></td>
      <td><?= $student['phone'] ?></td>
      <td><?= $student['course'] ?></td>
      <td><div class="btn-group" role="group" aria-label="Basic mixed styles example">
      <a href="student-edit.php?id=<?= $student['id'] ?>" class="btn btn-primary">Edit</a>
  <a href="student-view.php?id=<?= $student['id'] ?>" class="btn btn-success">View</a>
  <form action="code.php" method="post">

  <button type="submit" name="delete_student" value="<?= $student['id'] ?>" class="btn btn-danger">Delete</button>
  </form>
 
</div></td>
    </tr>

<?php endforeach ;?>

    <?php }else{
        $_SESSION['message'] = "No rows";
        header("Location: student-create.php");
        exit(0);
    }
    ?>
   
 
  </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>