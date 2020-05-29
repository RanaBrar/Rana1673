<?php

include('conn.php');

session_start();
unset($_SESSION['cus_name']);
unset($_SESSION['cus_email']);


echo "<script>
        window.location.assign('index.php');
        </script>";
