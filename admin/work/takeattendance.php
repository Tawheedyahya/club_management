<?php
session_start();
if(!isset($_SESSION['a_id'])){
    header("location:./login/1_login.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            background-color:pink;
            padding: 20px;
        }
        .table-container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .table {
            background-color: white;
        }
        .error_note {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            background-color: red;
            color: white;
            width: 90%;
            max-width: 350px;
            text-align: center;
            border-radius: 10px;
            display: none;
            z-index: 1000;
        }
        .okay {
            background-color: green;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            margin-top: 10px;
        }
        @media (max-width: 768px) {
            .table th, .table td {
                font-size: 14px;
                padding: 8px;
            }
            .btn-primary {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="table-container">
    <h2 class="text-center text-primary mb-4">Attendance</h2>
    <a href="view_attendance.php" class="btn btn-info d-block text-center mb-3">View Attendance</a>

    <?php
    $conn = new mysqli("localhost", "root", "", "club_man");
    $sql = "SELECT * FROM student WHERE a_id = {$_SESSION['a_id']} ORDER BY s_regno";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        echo "<form action='insertattendance.php' method='POST' id='iform'>
        <div class='table-responsive'>
            <table class='table table-bordered table-hover text-center'>
                <thead class='table-dark'>
                    <tr><th>REGNO</th><th>NAME</th><th>ATTENDANCE</th></tr>
                </thead>
                <tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['s_regno']}</td>
                <td>{$row['s_name']}</td>
                <td><input class='form-check-input' type='checkbox' name='g[]' value='{$row['s_id']}'></td>
            </tr>
            <input type='hidden' name='n[]' value='{$row['s_id']}'>";
        }

        echo "</tbody>
            </table>
        </div>
        <div class='text-center mt-3'>
            <button type='submit' class='btn btn-primary'>Submit</button>
        </div>
        </form>";
    }
    ?>
</div>

<!-- Error Note -->
<div class="error_note">
    <p>AT LEAST SELECT ONE STUDENT</p>
    <p class='okay'>OKAY</p>
</div>

<script>
    $(document).ready(function() {
        $("#iform").submit(function(event) {
            if ($('input[type=\"checkbox\"]:checked').length === 0) {
                event.preventDefault();
                $(".error_note").fadeIn();
            } else {
                $(".error_note").fadeOut();
            }
        });
        $(".okay").click(function() {
            $(".error_note").fadeOut();
        });
    });
</script>


</body>
</html>
