<?php
$pg = 'edit_user';
$pg_title = 'edit_user';
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

<div class="row">
    <div class="col-sm-4">
        <h2 style="text-align:center">Update</h2>
        <?php
        if (isset($_REQUEST['edit'])) {
            include('conn.php');
            $uid = $_REQUEST['uid'];
            $sql = "SELECT * FROM admin WHERE uid = ?";
            $result = $conn->prepare($sql);
            $result->execute(array($uid));
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name" value="<?php echo $row['name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="name">User Type</label>
                            <select class="form-control" name="role" id="">
                                <?php
                                if ($row['role'] == 1) { ?>
                                    <option value="0">Normal</option>
                                    <option value="1" selected>Admin</option>
                                <?php } else { ?>
                                    <option value="0" selected>Normal</option>
                                    <option value="1">Admin</option>
                                <?php }
                                ?>

                            </select>
                        </div>
                        <input class="form-control" type="hidden" name="uid" id="name" value="<?php echo $row['uid']; ?>">
                        <input class="btn btn-primary" type="submit" value="Update" name="update">
                    </form>
        <?php      }
            }
        }
        ?>
    </div>
</div>
</div>
</body>

</html>
<?php

if (isset($_REQUEST['update'])) {
    include('conn.php');
    if (empty($_REQUEST['name'])) {
        echo "Fill All Fields";
        echo "<script>
        window.location.assign('all_user.php');
        </script>";
    } else {
        $uid = $_REQUEST['uid'];
        $name = $_REQUEST['name'];
        $role = $_REQUEST['role'];
        $sql = "UPDATE admin SET name = ?,role = ? WHERE uid = ?";
        $result = $conn->prepare($sql);
        if ($result->execute(array($name, $role, $uid))) {
           

            echo "<script>
            window.location.assign('all_user.php');
        </script>";
        } else {
            echo "<script>
        window.location.assign('all_user.php');
        </script>";
        }
    }
}

?>