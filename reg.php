<?php

if (isset($_REQUEST['reg'])) {

    include('conn.php');
    if (empty($_REQUEST['cus_name']) || empty($_REQUEST['cus_email']) || empty($_REQUEST['cus_city']) || empty($_REQUEST['cus_address']) || empty($_REQUEST['cus_phone']) || empty($_REQUEST['cus_pass'])|| empty($_REQUEST['cus_country'])|| empty($_REQUEST['cus_state'])|| empty($_REQUEST['cus_pincode'])) {
        echo "Fill All Fielda";
    } else {
        $cus_name = $_REQUEST['cus_name'];
        $cus_pass = md5($_REQUEST['cus_pass']);
        $cus_email = $_REQUEST['cus_email'];
        $cus_address = $_REQUEST['cus_address'];
        $cus_city = $_REQUEST['cus_city'];
        $cus_phone = $_REQUEST['cus_phone'];
        $cus_country = $_REQUEST['cus_country'];
        $cus_state = $_REQUEST['cus_state'];
        $cus_pincode = $_REQUEST['cus_pincode'];

        $sql1 = "SELECT * FROM customer WHERE cus_email = ?";
        $result1 = $conn->prepare($sql1);
        $result1->execute(array($cus_email));

        if ($result1->rowCount() > 0) {

            echo "<script>
                alert('Email already Exists');
                window.location.assign('index.php');
                </script>";
        } else {
            $sql = "INSERT INTO customer (cus_name,cus_pass,cus_email,cus_address,cus_city,cus_phone,cus_country,cus_state,cus_pincode) VALUE (?,?,?,?,?,?,?,?,?)";
            $result = $conn->prepare($sql);
            if ($result->execute(array($cus_name, $cus_pass, $cus_email, $cus_address, $cus_city, $cus_phone,$cus_country,$cus_state,$cus_pincode))) {
             
                echo "<script>
                alert('Registred');
                window.location.assign('index.php');
                </script>";
            }
        }
    }
}
