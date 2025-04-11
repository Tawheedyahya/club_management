<?php
if(isset($_GET['absent'])){
$present=$_GET['present'];
$absent=$_GET['absent'];
}
else{
    header("location:admin.php");
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
        .sucess{
            display:flex;
            justify-content:center;
            align-items:center;
            height:70vh;
            flex-direction:column;
        }
        body{
            background-color:black;
            color:white;
        }
        .show_regno{
            display:none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sucess">
            <p>PRESENETED STUDENTS COUNT IS <span class="text-success fs-2 mx-2"><?php echo $present;?></span> AND ABSENT COUNT IS <span class="text-warning fs-2 mx-2"><?php echo $absent;?></span></p>
            <button class="show">okay</button>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".show").click(function(){
                window.location.assign("admin.php");
                exit();
            })
        })
    </script>
</body>
</html>