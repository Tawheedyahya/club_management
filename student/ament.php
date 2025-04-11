<?php
$conn = new mysqli("localhost", "root", "", "club_man");
$sql = "SELECT * FROM ament";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        body {
            background-color: orange;
        }
        .card {
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }
        .delete-btn {
            color: red;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }
        .delete-btn:hover {
            color: darkred;
            text-decoration: underline;
        }
        .modal-img {
            max-width: 100%;
            max-height: 90vh;
            display: block;
            margin: auto;
        }
    </style>
</head>
</body>
<div class="container">
    <h1 class="my-5 text-center text-primary">Announcements</h1>
    <div class="row">
        <?php foreach ($row as $value): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card" data-bs-toggle="modal" data-bs-target="#imageModal" onclick="showImage('../admin/announcement/img/<?php echo htmlspecialchars($value['ament_img']); ?>')">
                    <img src="../admin/announcement/img/<?php echo htmlspecialchars($value['ament_img']); ?>" alt="Announcement Image" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text"><?php echo htmlspecialchars($value['ament_des']); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Announcement Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" id="modalImage" class="modal-img">
            </div>
        </div>
    </div>
</div>

<script>
    function showImage(src) {
        document.getElementById("modalImage").src = src;
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
