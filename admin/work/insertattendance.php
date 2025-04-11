<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['g'])) {
        $g = isset($_POST['g']) ? $_POST['g'] : [];
        $n = isset($_POST['n']) ? $_POST['n'] : [];
        $a_id = $_SESSION['a_id'];
        $conn = new mysqli("localhost", "root", "", "club_man");
        foreach ($n as $na) {
            if (in_array($na, $g)) {
                $sql = "INSERT INTO attend (a_id, s_id, att_status) VALUES ($a_id, $na, 'present')";
                $conn->query($sql);
            } else {
                $sql = "INSERT INTO attend (a_id, s_id, att_status) VALUES ($a_id, $na, 'absent')";
                $conn->query($sql);
            }
        }

        $conn->close();
        $p_count=count($g);
        $a_count=count($n)-count($g);
    }
    header("location:result.php?present=$p_count & absent=$a_count");
}
else{
    header("location:admin.php");
}
?>
