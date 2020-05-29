<?php
$pg = 'add_category';
$pg_title = 'add_category';
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
?> <div class="row justify-content-md-center">
    <div class="col-sm-4">
        <h2 style="text-align:center">Add Category</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Enter Category</label>
                <input class="form-control" type="text" name="cat" id="name">
            </div>
            <input class="btn btn-primary" type="submit" value="Add" name="add">

        </form>
    </div>
</div>
</div>
</body>

</html>

<?php

if (isset($_REQUEST['add'])) {

    include('../conn.php');
    if (
        empty($_REQUEST['cat'])
    ) {
        echo "Fill All Fielda";
    } else {
        $cat = $_REQUEST['cat'];


        $sql = "INSERT INTO cate (cate) VALUE (?)";
        $result = $conn->prepare($sql);
        if ($result->execute(array($cat))) {
            echo "<script>
            alert('Inserted');
            windod.location.assign('Added.php');
            </script>";
        }
    }
}

?>