<?php

if (isset($_REQUEST['login'])) {
    include('conn.php');
    if (empty($_REQUEST['email']) || empty($_REQUEST['pass'])) {
        echo 'Fill All Fields';
    } else {
        $email = $_REQUEST['email'];
        $pass = md5($_REQUEST['pass']);

        $sql1 = "SELECT * FROM customer WHERE cus_email = ? AND cus_pass = ?";
        $result1 = $conn->prepare($sql1);
        $result1->execute([$email, $pass]);
        if ($result1->rowCount() > 0) {
            session_start();
            while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['cus_name'] = $row['cus_name'];
                $_SESSION['cus_email'] = $row['cus_email'];
                $_SESSION['cus_id'] = $row['cus_id'];
              
            }
            echo "<script>
            window.location.assign('index.php');
            </script>";
        } else {
            echo "<script>
            alert('Not Match');
            window.location.assign('index.php');
            </script>";
        }
    }
}
