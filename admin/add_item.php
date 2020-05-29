<?php
$pg = 'add_item';
$pg_title = 'add_item';
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
        <h2 style="text-align:center">Add Item</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="name">Discreption</label>
                <textarea class="form-control" type="text" name="disc" id="name"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <input class="form-control" type="text" name="price" id="">
            </div>
            <div class="form-group">
                <label for="name">Discount</label>
                <input class="form-control" type="text" name="discount" id="">
            </div>
            <div class="form-group">
                <label for="name">Rating</label>
                <input class="form-control" type="text" name="rating" id="">
            </div>
            <div class="form-group">
                <label for="name">Category</label>
                <select class="form-control" name="cate" id="">
                    <option disabled selected> Select Category</option>
                    <?php
                    include('../conn.php');
                    $sqlc = "SELECT * FROM cate";
                    $resultc = $conn->prepare($sqlc);
                    $resultc->execute();
                    if ($resultc->rowCount() > 0) {
                        while ($rowc = $resultc->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <option value="<?php echo $rowc['cid']; ?>"><?php echo strtoupper($rowc['cate']); ?></option>

                    <?php
                        }
                    } ?>

                </select>
            </div>
            <div class="form-group">
                <label for="name">Image</label>
                <input class="form-control" type="file" name="img" id="">
            </div>
            <div class="form-group">
                <label for="name">Stock</label>
                <input class="form-control" type="text" name="stock" id="">
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
        empty($_REQUEST['name']) || empty($_REQUEST['price']) || empty($_REQUEST['discount']) ||
        empty($_REQUEST['rating']) ||
        empty($_REQUEST['cate'])|| empty($_REQUEST['stock'])|| empty($_REQUEST['disc'])
    ) {
        echo "<script>
            alert('Fill all fields');
            windod.location.assign('add_item.php');
            </script>";
    } else {
        $name = $_REQUEST['name'];
        $price = $_REQUEST['price'];
        $discount = $_REQUEST['discount'];
        $rating = $_REQUEST['rating'];
        $cate = $_REQUEST['cate'];
        $stock = $_REQUEST['stock'];
        $disc = $_REQUEST['disc'];
         $img1 = $_FILES['img']['name'];
        $random = rand(0, 999999999);
        $img = $random;
        $temp = $_FILES['img']['tmp_name'];
        move_uploaded_file($temp, "../Image/$img");

        $sql = "INSERT INTO shopping (name,price,discount,rating,cate,img,totqty,remqty,disc) VALUE (?,?,?,?,?,?,?,?,?)";
        $result = $conn->prepare($sql);
        if ($result->execute(array($name, $price, $discount, $rating, $cate, $img,$stock,$stock,$disc))) {
            echo "<script>
            alert('Inserted');
            windod.location.assign('add_item.php');
            </script>";
        }
    }
}

?>