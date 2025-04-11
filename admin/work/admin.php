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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <style>
    body {
        background: linear-gradient(to right, #f0f8ff, #e6f7ff);
    }
    .group {
        animation: slide-in 0.5s ease-in-out;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        height: 90vh;
    }
    a {
        color: #00008b;
    }
    @keyframes slide-in {
        from {
            transform: translateY(-100%);
        }
        to {
            transform: translateY(0);
        }
    }
    h1 {
        cursor: pointer;
        color: red;
    }
    h3 {
        padding: 10px;
        margin-bottom: 5px;
        cursor: pointer;
    }
    #logout {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        padding: 10px 30px;
        background-color: red;
        border-radius: 10px;
        text-align: center;
        display: none;
    }
    h2 {
        white-space: nowrap;
    }
    </style>
</head>
<body>
    <div id="logout">
        <h2>YOU WANT TO LOGOUT</h2>
        <h3 id="yes">yes</h3>
        <h3 id="no">no</h3>
    </div>

    <h1 id="logout_h" class="text-danger fw-bold  mt-3 cursor-pointer">Logout</h1>
<h2 class="text-dark fw-semibold text-center bg-light p-2 rounded d-inline-block shadow-sm">
    Your Club ID: <?php echo isset($_SESSION['a_id']) ? $_SESSION['a_id'] : 'N/A'; ?>
</h2>


    <div class="container">
        <div class="group">
            <div class="row">
                <h1 class="p-5 bg"><a href="takeattendance.php" class="custom-link">📋 TAKE ATTENDANCE</a></h1>
            </div>
            <div class="row">
                <h1 class="p-5"><a href="../announcement/giveannouncement.html" class="custom-link">📢 GIVE ANNOUNCEMENTS</a></h1>
            </div>
            <div class="row">
                <h1 class="p-5"><a href="../student_details/details.php" class="custom-link">📚 VIEW STUDENT DETAILS</a></h1>
            </div>
            <div class="row">
                <h1 class="p-5"><a href="request.php" class="custom-link">📌 Student Requests</a></h1>
            </div>
        </div>
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
