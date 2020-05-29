<?php
$pg = 'stock';
$pg_title = 'stock';
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
    <div class="col-sm-12">
        <h2 style="text-align:center">Stock</h2>
        <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Total</th>
      <th scope="col">Available</th>
      <th scope="col">Buy</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php

include('conn.php');
$sql = "SELECT * FROM shopping";
$result = $conn->prepare($sql);
$result->execute();
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><img style="width:40px;height:40px;" src="../Image/<?php echo $row['img']; ?>" alt="" srcset=""></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['price']; ?></td>
      <td><?php echo $row['totqty']; ?></td>
      <td><?php echo $row['remqty']; ?></td>
      <td><?php echo $row['buyqty']; ?></td>
      <td><a href="edit_item.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Edit</a></td>
      <td><a href="del_item.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
    </tr>
<?php 
    }
}
?>
  </tbody>
</table>

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