<?php

session_start();

if (isset($_POST["update"])) {

$id = $_POST["item_id"];
include('conn.php');
$sql = "SELECT * FROM shopping WHERE id = :id";
			$result = $conn->prepare($sql);
			$result->execute(array(':id' => $id));
			if ($result->rowCount() > 0) {
				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    if($row['remqty'] >= $_POST['item_quantity']){

    if (filter_var($_REQUEST["item_quantity"], FILTER_VALIDATE_INT)) {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_POST["item_id"]) {
               
                $_SESSION["shopping_cart"][$keys]["item_quantity"] = $_REQUEST["item_quantity"];
            }
        }
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
if (isset($_GET["action"]) == 'remove') {

    foreach ($_SESSION["shopping_cart"] as $keys => $values) {
        if ($values["item_id"] == $_GET["id"]) {
            unset($_SESSION["shopping_cart"][$keys]);
        }
    }
}

echo "<script>
        window.location.assign('cart.php');
        </script>";
