<?php
include('conn.php');
$pg = 'all_user';
$pg_title = 'All User';
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
<table class="table">
    <thead>
        <th>UID</th>
        <th>Name</th>
        <th>User Type</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead>
    <tbody>
        <?php

        include('conn.php');
        $limit = 3;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM admin ORDER BY uid DESC LIMIT $offset,$limit";
        $result = $conn->prepare($sql);
        $result->execute();
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['uid']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php
                        if ($row['role'] == 0) {
                            echo "Normal";
                        }
                        if ($row['role'] == 1) {
                            echo "Admin";
                        }
                        ?></td>
                    <td>
                        <form action="edit_user.php" method="post">
                            <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
                            <input class="btn btn-info" type="submit" value="Edit" name="edit">
                        </form>
                    </td>
                    <td>
                        <form action="del_user.php" method="post">
                            <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
                            <input class="btn btn-danger" type="submit" value="Delete" name="delete">
                        </form>
                    </td>
                </tr>
        <?php   }
        }

        ?>
    </tbody>
</table>
<nav aria-label="...">
    <?php
    include('conn.php');

    $sql1 = "SELECT * FROM admin";
    $result1 = $conn->prepare($sql1);
    $result1->execute();
    if ($result1->rowCount() > 0) {
        $total_record = $result1->rowCount();
        $total_page = ceil($total_record / $limit);
    ?>
        <ul class="pagination">
            <?php
            if ($page > 1) { ?>
                <li class="page-item ">
                    <a class="page-link" href="all_user.php?page=<?php echo ($page - 1); ?>">Previous</a>
                </li>
            <?php }
            ?>

            <?php
            for ($i = 1; $i <= $total_page; $i++) {
                if ($page == $i) {
                    $active = "active";
                } else {
                    $active = "";
                }
            ?>
                <li class="page-item <?php echo $active ?>"><a class="page-link" href="all_user.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php    }
            ?>

            <?php
            if ($page < $total_page) { ?>
                <li class="page-item ">
                    <a class="page-link" href="all_user.php?page=<?php echo ($page + 1); ?>">Next</a>
                </li>
            <?php }
            ?>
        </ul>
    <?php }
    ?>
</nav>
</div>
</body>

</html>