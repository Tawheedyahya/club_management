<?php
// session_start();
// if (!isset($_SESSION['a_id'])) {
//     header("location:../login/1_login.html");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            background-color: pink;
        }
        .container {
            margin-top: 50px;
            max-width: 800px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
            max-width: 250px;
            margin-right: 10px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            padding: 8px 15px;
            border: none;
            transition: 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
        .table {
            margin-top: 20px;
        }
        .table th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }
        .table td {
            text-align: center;
            vertical-align: middle;
        }
        .change {
            text-decoration: none;
            font-weight: bold;
            color: #007bff;
            transition: 0.3s;
        }
        .change:hover {
            color: #0056b3;
            text-decoration: underline;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">Attendance</h2>

    <form action="" method="POST" class="d-flex justify-content-center">
        <input type="date" name="date" id="date" class="form-control">
        <input type="number" name="a_id" id="a_id" class="form-control" required placeholder="Enter your club code">
        <button type="submit" name="submit" class="btn btn-custom">ENTER</button>
    </form>

    <?php
    if (isset($_POST['date']) && isset($_POST['submit'])) {
        $date = $_POST['date'];
        $datee = date('Y-m-d', strtotime($date));
        $a_id = $_POST['a_id'];
        $conn = new mysqli("localhost", "root", "", "club_man");

        $sql = "SELECT student.s_regno as reg_no, attend.att_status as s_status, attend.s_id as s_id, attend.att_time as att_time
                FROM student 
                RIGHT JOIN attend ON student.s_id = attend.s_id 
                WHERE attend.a_id = '$a_id' AND DATE(attend.att_time) = '$datee' ORDER BY reg_no ASC";

        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_all(MYSQLI_ASSOC);
    }
    ?>

    <?php if (!empty($row)) { ?>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>REG_NO</th>
                    <th>STATUS</th>
                    <th>TIME</th>
                    <!-- <th>CHANGE STATUS</th> -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $key => $value) : ?>
                    <tr>
                        <td class="regno hidden"><?php echo $value['s_id']; ?></td>
                        <td><?php echo $value['reg_no']; ?></td>
                        <td class="status"><?php echo ucfirst($value['s_status']); ?></td>
                        <td class="att_time "><?php echo $value['att_time']; ?></td>
                        <!-- <td><a href="#" class="change">Change Status</a></td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center text-danger">No records found for the selected date.</p>
    <?php } ?>
</div>

<script>
    $(document).ready(function(){
        $(".change").click(function(event){
            event.preventDefault();
            let row = $(this).closest("tr");
            let s_id = row.find(".regno").text().trim();
            let att_time = row.find(".att_time").text().trim();

            $.ajax({
                url: "status_change.php",
                type: "POST",
                data: { s_id: s_id, att_time: att_time },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
    });
</script>

</body>
</html>
