<?php
$conn = new mysqli("localhost", "root", "", "club_man");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS attend (
    a_id INT,
    s_id INT,
    att_status ENUM('present', 'absent') DEFAULT 'absent',
    att_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (s_id) REFERENCES student(s_id),
    FOREIGN KEY (a_id) REFERENCES student(a_id)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'attend' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
