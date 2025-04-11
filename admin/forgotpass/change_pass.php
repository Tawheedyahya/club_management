<?php
session_start();
if (isset($_SESSION['a_id']) && isset($_GET['a_name'])) {
    $a_name = trim($_GET['a_name']);
    $a_id = trim($_SESSION['a_id']);
    $conn = new mysqli("localhost", "root", "", "club_man");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM admin WHERE a_id = $a_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        if ($a_name != trim($data['a_name']) || $a_id != $data['a_id']) {
            header("location:../login/1_login.html");
            exit();
        }
    } else {
        header("location:../login/1_login.html");
        exit();
    }
    $conn->close();
} else {
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
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .error {
            border: 2px solid #dc3545 !important;
            padding: 5px;
            font-size: 12px;
            margin-top: 5px;
            color: #dc3545;
        }
        .sucess {
            position: absolute;
            padding: 20px;
            background-color: #28a745;
            border-radius: 10px;
            color: white;
            z-index: 1;
            text-align: center;
        }
        #submit {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
            width: 100%;
        }
        #submit:hover {
            background-color: #0056b3;
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
        }
        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        label {
            font-weight: 500;
            margin-bottom: 5px;
        }
        #instruct {
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }
        .sucess a {
            color: white;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="" method="POST" id="form">
                <div class="row mb-3">
                    <div class="col">
                        <label for="n_pass">NEW PASSWORD</label>
                        <input type="password" name="n_pass" id="n_pass" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="rn_pass">RETYPE PASSWORD</label>
                        <input type="password" name="rn_pass" id="rn_pass" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col d-flex justify-content-center">
                        <button type="submit" name="submit" id="submit">Save</button>
                    </div>
                </div>
                <p id="instruct"></p>
            </form>
            <div class="sucess" id="sucess">
                <p>Password changed successfully!</p>
                <a href="../login/1_login.html">Go to login</a>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#sucess").hide();
            $("#form").submit(function(event){
                event.preventDefault();
                let n_pass = $("#n_pass").val().trim();
                let rn_pass = $("#rn_pass").val().trim();
                if (n_pass != '' && n_pass.length > 2) {
                    if (n_pass == rn_pass) {
                        $("#instruct").text("").removeClass('error');
                        $("#form").removeClass('error');
                        $.ajax({
                            url: "updatepass.php",
                            type: "POST",
                            data: {
                                n_pass: n_pass
                            },
                            success: function(response) {
                                $("#sucess").show();
                                $("#form").empty();
                            },
                        });
                    } else {
                        $("#instruct").text("Passwords do not match").addClass('error');
                        $("#submit").off();
                    }
                } else {
                    $("#instruct").addClass('error');
                    $("#instruct").html("Password must <br> be greater than 2 characters");
                }
            });
        });
    </script>
</body>
</html>