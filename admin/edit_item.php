<?php
$pg = 'edit_item';
$pg_title = 'edit_item';
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
        <h2 style="text-align:center">Update</h2>
        <?php
        if (isset($_REQUEST['id'])) {
            include('conn.php');
            $id = $_REQUEST['id'];
            $sql = "SELECT * FROM shopping WHERE id = ?";
            $result = $conn->prepare($sql);
            $result->execute(array($id));
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>

<form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input class="form-control" value="<?php echo $row['name']; ?>" type="text" name="name" id="name" >
                <input class="form-control" value="<?php echo $row['id']; ?>" type="hidden" name="id" id="name" >
            </div>
            <div class="form-group">
                <label for="name">Discreption</label>
                <textarea class="form-control"   name="disc" id="name"><?php echo $row['disc']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="name">Price</label>
                <input class="form-control" value="<?php echo $row['price']; ?>" type="text" name="price" id="">
            </div>
            <div class="form-group">
                <label for="name">Discount</label>
                <input class="form-control" value="<?php echo $row['discount']; ?>" type="text" name="discount" id="">
            </div>
            <div class="form-group">
                <label for="name">Rating</label>
                <input class="form-control" value="<?php echo $row['rating']; ?>" type="text" name="rating" id="">
            </div>
            <div class="form-group">
                <label for="name">Category</label>
                <select class="form-control" value="<?php echo $row['cate']; ?>" name="cate" id="">
                    <option disabled selected> Select Category</option>
                    <?php
                    include('../conn.php');
                    $sqlc = "SELECT * FROM cate";
                    $resultc = $conn->prepare($sqlc);
                    $resultc->execute();
                    if ($resultc->rowCount() > 0) {
                        while ($rowc = $resultc->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                            <option <?php
                                if ($rowc['cid'] == $row['cate']) { echo "selected"; } ?> value="<?php echo $rowc['cid']; ?>"><?php echo strtoupper($rowc['cate']); ?></option>

                    <?php
                        }
                    } ?>

                </select>
            </div>
            <div class="form-group">
                <label for="name">Image</label>
                <input class="form-control" value="<?php echo $row['img']; ?>" type="file" name="img" id="">
            </div>
            <div class="form-group">
                <label for="name">Stock</label>
                <input class="form-control" value="<?php echo $row['totqty']; ?>" type="text" name="stock" id="">
            </div>

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
    if (
        empty($_REQUEST['name']) || empty($_REQUEST['price']) || empty($_REQUEST['discount']) ||
        empty($_REQUEST['rating']) ||
        empty($_REQUEST['cate'])|| empty($_REQUEST['stock'])|| empty($_REQUEST['disc'])
    ) {
        echo "<script>
            alert('Fill all fields');
            windod.location.assign('edit_item.php');
            </script>";
    } else {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $price = $_REQUEST['price'];
        $discount = $_REQUEST['discount'];
        $rating = $_REQUEST['rating'];
        $cate = $_REQUEST['cate'];
        $stock = $_REQUEST['stock'];
        $disc = $_REQUEST['disc'];
        if ($_FILES['img']['name'] != "") {
            $img1 = $_FILES['img']['name'];
            $random = rand(0, 999999999);
            $img = $random;
            $temp = $_FILES['img']['tmp_name'];
            move_uploaded_file($temp, "../Image/$img");
            $sql = "UPDATE shopping SET name = ?,price = ?,discount=?,rating = ?,cate = ?,totqty=totqty+?,remqty=remqty+?,disc = ?,img=? WHERE id = ?";
            $result = $conn->prepare($sql);
            if ($result->execute(array($name, $price, $discount,$rating, $cate, $stock, $stock,$disc, $img,$id))) {
                echo "<script>
                alert('Updated');
                window.location.assign('stock.php');
            </script>";
            } else {
                echo "<script>
                alert('Failed');
            window.location.assign('stock.php');
            </script>";
            }
        }
        else{
            $sql = "UPDATE shopping SET name = ?,price = ?,discount=?,rating = ?,cate = ?,totqty=totqty+?,remqty=remqty+?,disc = ? WHERE id = ?";
            $result = $conn->prepare($sql);
            if ($result->execute(array($name, $price, $discount,$rating, $cate, $stock, $stock,$disc,$id))) {
                echo "<script>
                alert('Updated');
                window.location.assign('stock.php');
            </script>";
            } else {
                echo "<script>
                alert('Failed');
            window.location.assign('stock.php');
            </script>";
            }
        }

        
    }
}

?>