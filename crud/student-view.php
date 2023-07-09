<!doctype html>
<?php  require "dbcon.php"?>
<html lang="en">

<?php include 'icludes/header.php'?>

<body>
    <div class="container mt-5">
 <?php include 'message.php'?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student view details
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
                         
                         
                            <div class="mb-3">
                                <label for="name" class="form-label">Student Name </label>
                         
                                <p class="form-control">
                                <?= $result['name'] ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="Email" class="form-label">Student Email </label>
                                <p class="form-control">
                                <?= $result['email'] ?>
                              
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Student phone </label>
                                <p class="form-control">
                                <?= $result['phone'] ?>
                           
                                </p>
                            </div>
                            <div class="mb-3">
                                <label for="Course" class="form-label">Student Course </label>
                                <p class="form-control">
                                <?= $result['course'] ?>
                                </p>
                            </div>
                        

                        <?php }else{
                    echo "Error";
                    } ?>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>