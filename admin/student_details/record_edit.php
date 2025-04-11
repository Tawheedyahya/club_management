<?php
session_start();
if(isset($_GET['s_id'])){
$s_id = (int)$_GET['s_id'];
$a_id = $_SESSION['a_id'];

$conn = new mysqli('localhost', "root", "", "club_man");

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM student WHERE s_id=$s_id AND a_id=$a_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            background-color:pink;
        }
    </style>
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
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="s_name" value="<?php echo htmlspecialchars($row['s_name'] ?? ''); ?>" class="form-control">
                            </div>
                            <!-- Reg No -->
                            <div class="col-md-6">
                                <label for="regno" class="form-label">Reg No</label>
                                <input type="text" id="regno" name="s_regno" value="<?php echo htmlspecialchars($row['s_regno'] ?? ''); ?>" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- Date of Birth -->
                            <div class="col-md-6">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($row['dob'] ?? ''); ?>" class="form-control">
                            </div>
                            <!-- Place -->
                            <div class="col-md-6">
                                <label for="place" class="form-label">Place</label>
                                <input type="text" id="place" name="s_place" value="<?php echo htmlspecialchars($row['s_place'] ?? ''); ?>" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <!-- Department -->
                            <div class="col-md-6">
                                <label for="dept" class="form-label">Department</label>
                                <input type="text" id="dept" name="s_dept" value="<?php echo htmlspecialchars($row['s_dept'] ?? ''); ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="dept" class="form-label">Phone number</label>
                                <input type="text" id="" name="s_phoneno" value="<?php echo htmlspecialchars($row['s_phoneno'] ?? ''); ?>" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="s_id" id="" value=<?php echo htmlspecialchars($row['s_id']??'')?>>
                        <div class="text-center mt-4">
                            <button name='submit' class="btn btn-primary px-5">Update</button>
                            <a href="details.php" class="btn btn-secondary px-5">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $s_id=(int)$_POST['s_id'];
    $a_id = $_SESSION['a_id'];
    $conn = new mysqli('localhost', "root", "", "club_man");
    $s_name=$_POST['s_name'];
    $s_regno=strtoupper(trim($_POST['s_regno']));
    $dob=$_POST['dob'];
    $s_place=$_POST['s_place'];
    $s_dept=$_POST['s_dept'];
    $s_phoneno=$_POST['s_phoneno'];
    // echo $s_name.$s_regno.$dob.$s_place.$s_dept.$s_phoneno;
  $stmt = $conn->prepare("UPDATE student SET s_name=?, s_regno=?, dob=?, s_place=?, s_dept=?, s_phoneno=? WHERE s_id=? AND a_id=?");
$stmt->bind_param("ssssssii", $s_name, $s_regno, $dob, $s_place, $s_dept, $s_phoneno, $s_id, $a_id);
$stmt->execute();
echo "<script>alert('Update successfully'); window.location.href='details.php';</script>";

}
?>
