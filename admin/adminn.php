<?php
session_start();
if(!isset($_SESSION['a_email'])){
    header("location:../login/1_login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">

    <style>
        body {
            background: linear-gradient(to right, #e3f2fd, #bbdefb);
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 700px;
            margin: auto;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 50px;
        }

        h1 {
            color: #0275d8;
            font-size: 22px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 5px;
            transition: 0.3s;
            cursor: pointer;
        }

        h1:hover {
            background: #e9ecef;
        }

        a {
            text-decoration: none;
            color: #0275d8;
            font-weight: bold;
        }

        /* Logout Box */
        #logout {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            width: 250px;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            display: none;
        }

        #logout h2 {
            font-size: 18px;
            color: #333;
        }

        .logout-btn {
            display: inline-block;
            padding: 8px 20px;
            margin: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        #yes {
            background: #d9534f;
            color: white;
        }

        #no {
            background: #5bc0de;
            color: white;
        }

    </style>
</head>
<body>

    <!-- Logout Confirmation -->
    <div id="logout">
        <h2>Are you sure you want to logout?</h2>
        <div>
            <span id="yes" class="logout-btn">Yes</span>
            <span id="no" class="logout-btn">No</span>
        </div>
    </div>

    <h1 id="logout_h" class="text-center mt-3">Logout</h1>

    <div class="container">
        <h1><a href="takeattendance.php">📋 Take Attendance</a></h1>
        <h1><a href="../announcement/giveannouncement.html">📢 Give Announcements</a></h1>
        <h1><a href="../student_details/details.php">📚 View Student Details</a></h1>
    </div>

    <script>
        $(document).ready(function(){
            $("#logout_h").click(function(){
                $("#logout").show();
            });

            $("#no").click(function(){
                $("#logout").hide();
            });

            $("#yes").click(function(){
                window.location.assign("unset_session.php");
            });
        });
    </script>

</body>
</html>
