<?php
$pg = 'add_user';
$pg_title = 'add_user';
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
}
include('header.php');
?>
<div class="row justify-content-md-center">
    <div class="col-sm-4">
        <h2 style="text-align:center">Add User</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="name">Password</label>
                <input class="form-control" type="password" name="pass" id="name">
            </div>
            <div class="form-group">
                <label for="name">User Type</label>
                <select class="form-control" name="role" id="">
                    <option value="0">Normal</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <input class="btn btn-primary" type="submit" value="Regester" name="submit">

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
        echo "Fill All Fielda";
    } else {
        $name = $_REQUEST['name'];
        $pass = md5($_REQUEST['pass']);
        $role = $_REQUEST['role'];

        $sql1 = "SELECT * FROM admin WHERE name = ?";
        $result1 = $conn->prepare($sql1);
        $result1->execute(array($name));

        if ($result1->rowCount() > 0) {
            echo "<p style='color:red;text-align:center;margin: 10px 0;'>UserName already Exists.</p>";
        } else {
            $sql = "INSERT INTO admin (name,pass,role) VALUE (?,?,?)";
            $result = $conn->prepare($sql);
            if ($result->execute(array($name, $pass, $role))) {
                echo "<script>
            alert('User Added');
            windod.location.assign('add_user.php');
            </script>";
            }
        }
    }
}

?>