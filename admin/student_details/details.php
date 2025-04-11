<?php
session_start();
$conn = new mysqli('localhost', "root", "", "club_man");
$a_id = $_SESSION['a_id'];

$sql = "SELECT * FROM student WHERE a_id = ? ORDER BY s_regno";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $a_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            background-color: pink;
        }
        .table-container {
            margin-top: 30px;
            background: white;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.1);
        }
        .btn-action {
            display: flex;
            gap: 5px;
            justify-content: center;
        }
        @media (max-width: 768px) {
            .btn-action {
                flex-direction: column;
            }
            .btn-action a {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-between align-items-center my-3">
        <h3 class="text-primary">Student Records</h3>
        <a href="record_insert.php" class="btn btn-success">+ Add Student</a>
    </div>

    <div class="table-responsive-sm table-container">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>NAME</th>
                    <th>REG NO</th>
                    <th>PHONE</th>
                    <th>DEPARTMENT</th>
                    <th>PLACE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($row as $value): ?>
                <tr>
                    <td><?php echo htmlspecialchars($value['s_name']); ?></td>
                    <td><?php echo htmlspecialchars($value['s_regno']); ?></td>
                    <td><?php echo htmlspecialchars($value['s_phoneno']); ?></td>
                    <td><?php echo htmlspecialchars($value['s_dept']); ?></td>
                    <td><?php echo htmlspecialchars($value['s_place']); ?></td>
                    <td class="btn-action">
                        <a href="record_edit.php?s_id=<?php echo $value['s_id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="record_delete.php?s_id=<?php echo $value['s_id']; ?>" 
                           class="btn btn-danger btn-sm delete-btn"
                           onclick="return confirmDelete(<?php echo $value['s_id']; ?>)">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmDelete(s_id) {
        let confirmAction = confirm("Are you sure you want to delete this student record?");
        return confirmAction;
    }
</script>

</body>
</html>
