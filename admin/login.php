<?php
include('conn.php');
session_start();
if (isset($_SESSION['name'])) {
    echo "<script>
    window.location.assign('all_user.php');
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/javascript" href="js/bootstrap.min.js">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            </div>
        </nav>
        <!-- Navbar End -->
        <div class="row">
            <div class="col-sm-4">
                <h2 style="text-align:center">Login</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="name">Password</label>
                        <input class="form-control" type="password" name="pass" id="name">
                    </div>
                    <input class="btn btn-primary" type="submit" value="Login" name="submit">

                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php

if (isset($_REQUEST['submit'])) {
    include('conn.php');
    if (empty($_REQUEST['name']) || empty($_REQUEST['pass'])) {
        echo 'Fill All Fields';
    } else {
        $name = $_REQUEST['name'];
        $pass = md5($_REQUEST['pass']);

        $sql1 = "SELECT * FROM admin WHERE name = ? AND pass = ?";
        $result1 = $conn->prepare($sql1);
        $result1->execute([$name, $pass]);
        if ($result1->rowCount() > 0) {
          
            while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
                $_SESSION['uid'] = $row['uid'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['pass'] = $row['pass'];
                $_SESSION['role'] = $row['role'];
            }
                 echo "<script>
        window.location.assign('all_user.php');
        </script>";
        } else {
            echo "User Name And Password Not Match";
        }
    }
}

?>