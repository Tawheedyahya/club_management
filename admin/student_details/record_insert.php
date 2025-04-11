<?php
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    try{
        $a_id = $_SESSION['a_id'];
        $conn = new mysqli('localhost', "root", "", "club_man");
        $s_name=$_POST['s_name'];
        $s_regno=strtoupper(trim($_POST['s_regno']));
        $dob=isset($_POST['dob'])?$_POST['dob']:'';
        $s_place=isset($_POST['s_place'])?$_POST['s_place']:'';
        $s_dept=isset($_POST['s_dept'])?$_POST['s_dept']:'';
        $s_phoneno=isset($_POST['s_phoneno'])?$_POST['s_phoneno']:'';
        $stmt=$conn->prepare('INSERT into student(a_id, s_name, s_regno, dob, s_place, s_dept, s_phoneno) values(?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param("issssss", $a_id, $s_name, $s_regno, $dob, $s_place, $s_dept, $s_phoneno);
        $stmt->execute();
        echo "<script>alert('INSERT SUCCESSFULLY');
        window.location.assign('details.php')
        </script>";
    }
    catch(mysqli_sql_exception $e){
        if($e->getcode()==1062){
            echo "<script>alert('student reg_no is already registered')</script>";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg p-4">
                    <h3 class="text-center text-primary">Student Details</h3>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                        <div class="row">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label for="name" class="form-label" >Name</label>
                                <input type="text" id="name" name="s_name"  class="form-control" required>
                            </div>
                            <!-- Reg No -->
                            <div class="col-md-6">
                                <label for="regno" class="form-label">Reg No</label>
                                <input type="text" id="regno" name="s_regno"  class="form-control" required>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- Date of Birth -->
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" id="dob" name="dob"  class="form-control">
                            </div>
                            <!-- Place -->
                            <div class="col-md-6">
                                <label for="place" class="form-label">Place</label>
                                <input type="text" id="place" name="s_place"  class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- Department -->
                            <div class="col-md-6">
                                <label for="dept" class="form-label">Department</label>
                                <input type="text" id="dept" name="s_dept" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="dept" class="form-label">Phone number</label>
                                <input type="text" id="" name="s_phoneno" class="form-control" required>
                            </div>
                        </div>
                        <input type="hidden" name="s_id" id="">
                        <div class="text-center mt-4">
                            <button name='submit' class="btn btn-primary px-5">INSERT</button>
                            <a href="details.php" class="btn btn-secondary px-5">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>