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
                        <h4>Student Add
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="code.php">
                            <div class="mb-3">
                                <label for="name" class="form-label">Student Name </label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="Email" class="form-label">Student Email </label>
                                <input type="email" class="form-control" id="Email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Student phone </label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="Course" class="form-label">Student Course </label>
                                <input type="text" class="form-control" id="Course" name="course">
                            </div>
                            <button type="submit" name="save-student" class="btn btn-info">Save student</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>