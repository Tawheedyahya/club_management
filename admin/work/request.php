<?php
session_start();
$row = []; // Ensure $row is always defined

if(isset($_SESSION['a_id'])){
    $a_id = (int)$_SESSION['a_id'];
    $conn = new mysqli("localhost", "root", "", "club_man");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM form WHERE a_id = $a_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fc;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .table-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
        }
        .table td {
            vertical-align: middle;
        }
        .btn-yes {
            
            color: white;
            padding: 5px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-yes:hover {
            background: #218838;
            color: white;
        }
        .btn-no {
            
            color: white;
            padding: 5px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-no:hover {
            background: #c82333;
            color: white;
        }
        .no-records {
            color: #ff0000;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="table-container">
            <h2 class="text-center text-primary mb-4">📋 Student Request</h2>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="text-center">
                        <tr>
                            <th>Name</th>
                            <th>Reg No</th>
                            <th>DOB</th>
                            <th>Place</th>
                            <th>Department</th>
                            <th>Phone Number</th>
                            <th>Accept</th>
                            <th>Reject</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php if (!empty($row)): ?>
                            <?php foreach($row as $value): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($value['s_name']); ?></td>
                                    <td><?php echo htmlspecialchars($value['s_regno']); ?></td>
                                    <td><?php echo htmlspecialchars($value['dob']); ?></td>
                                    <td><?php echo htmlspecialchars($value['s_place']); ?></td>
                                    <td><?php echo htmlspecialchars($value['s_dept']); ?></td>
                                    <td><?php echo htmlspecialchars($value['s_phoneno']); ?></td>
                                    <td><a href="yes.php?sr_id=<?php echo $value['sr_id']?>" class="btn-yes">✅ </a></td>
                                    <td><a href="no.php?sr_id=<?php echo $value['sr_id']?>" class="btn-no">❌</a></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center no-records">No records found</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
