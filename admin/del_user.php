<?php
session_start();
if (!isset($_SESSION['name'])) {
    echo "<script>
    window.location.assign('login.php');
    </script>";
}
if ($_SESSION['role'] == 0) {
    echo "<script>
    window.location.assign('login.php');
    </script>";
} else {
    if (isset($_POST['delete'])) {
        include('conn.php');
        $uid = $_POST['uid'];
        $sql = "DELETE FROM admin WHERE uid = ?";
        $result = $conn->prepare($sql);
        if ($result->execute(array($uid))) {
            echo "<script>
            window.location.assign('all_user.php');
            </script>";
        } else {
            echo "<script>
            window.location.assign('all_user.php');
            </script>";
        }
    } else {
        echo "<script>
        window.location.assign('login.php');
        </script>";
    }
}
