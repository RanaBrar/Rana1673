<?php

session_start();

if (isset($_POST["atc"])) {
    $id = $_POST["id"];
include('conn.php');
$sql = "SELECT * FROM shopping WHERE id = :id";
			$result = $conn->prepare($sql);
			$result->execute(array(':id' => $id));
			if ($result->rowCount() > 0) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    if($row['remqty'] > 0){
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

        if (!in_array($_POST["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'            =>    $_POST["id"],
                'item_name'            =>    $_POST["name"],
                'item_price'        =>    $_POST["price"],
                'item_quantity'        =>    $_POST["quant"],
                'item_img'           =>       $_POST['item_img']
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
            echo "<script>
        window.location.assign('index.php');
        </script>";
        } else {
            echo "<script>
        alert('Item Already Added');
        window.location.assign('index.php');
        </script>";
        }
    } else {
        $item_array = array(
            'item_id'            =>    $_POST["id"],
            'item_name'            =>    $_POST["name"],
            'item_price'        =>    $_POST["price"],
            'item_quantity'        =>    $_POST["quant"],
            'item_img'           =>       $_POST['item_img']
        );
        $_SESSION["shopping_cart"][0] = $item_array;
        echo "<script>
        window.location.assign('index.php');
        </script>";
    }
}
else{
    echo "<script>
    alert('Out Of Stock');
    window.location.assign('index.php');
    </script>";
}
    }
            }
}
