
<?php
 require "dbcon.php"?>
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
                        <h4>Student Edit
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        $student_id=mysqli_real_escape_string($conn,$_GET['id']);
                        $query="select * from students where id=' $student_id'";
                        $query_run=mysqli_query($conn,$query);
                        if(mysqli_num_rows($query_run)>0){
                        $result=mysqli_fetch_array($query_run);
                        ?>
                          <form method="post" action="code.php">
                            <input type="hidden" name="student_id" value="<?= $result['id'] ?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">Student Name </label>
                                <input type="text" class="form-control" id="name" 
                                value="<?= $result['name'] ?>" name="name" >
                            </div>
                            <div class="mb-3">
                                <label for="Email" class="form-label">Student Email </label>
                                <input type="email" class="form-control" id="Email"
                                 value="<?= $result['email'] ?>" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Student phone </label>
                                <input type="text" class="form-control" id="phone" 
                                value="<?= $result['phone'] ?>" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="Course" class="form-label">Student Course </label>
                                <input type="text" class="form-control" id="Course"
                                value="<?= $result['course'] ?>" name="course">
                            </div>
                            <button type="submit" name="update-student" class="btn btn-info">Update</button>
                        </form>

                        <?php }else{
                    $_SESSION['message'] = "Student not founded ";
                    header("Location: student-create.php");
                    exit(0);
                        } ?>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>