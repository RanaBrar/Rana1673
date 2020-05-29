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
    if (isset($_GET['id'])) {
        include('conn.php');
        $id = $_GET['id'];
        $sql = "DELETE FROM shopping WHERE id = ?";
        $result = $conn->prepare($sql);
        if ($result->execute(array($id))) {
            echo "<script>
            alert('Item Removed');
            window.location.assign('stock.php');
            </script>";
        } else {
            echo "<script>
            alert('Item Not Removed');
            window.location.assign('stock.php');
            </script>";
        }
    } else {
        echo "<script>
        window.location.assign('stock.php');
        </script>";
    }
}
