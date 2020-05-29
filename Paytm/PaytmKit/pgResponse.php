<?php
session_start();
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if ($isValidChecksum == "TRUE") {

	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
			if (isset($_SESSION['item_reset'])) {
			foreach ($_SESSION["shopping_cart"] as $keys => $values) {
				if ($values["item_id"] == $_SESSION['item_reset']) {
					include('conn.php');
					$sql1 = "UPDATE shopping SET remqty = remqty-?,buyqty = buyqty+? WHERE id = ?";
					$result1 = $conn->prepare($sql1);
					if ($result1->execute(array($values["item_quantity"], $values["item_quantity"], $values["item_id"]))) {
						echo 'Data Updated';
					}
					$sql = "INSERT INTO orders (order_id,cus_email,amount,pid,qty) VALUE (?,?,?,?,?)";
					$result = $conn->prepare($sql);
					if ($result->execute(array($_POST['ORDERID'], $_SESSION['cus_email'], $_POST['TXNAMOUNT'], $values["item_id"], $values["item_quantity"]))) {
echo "Data Saved";
					}


					unset($_SESSION["shopping_cart"][$keys]);
				}
			}
		}
			echo "<a href='https://rana1673.000webhostapp.com'><button>Home</botton></a>";
	} else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
			echo "<a href='https://rana1673.000webhostapp.com'><button>Home</botton></a>";
	}


	if (isset($_POST['ORDERID'])) {
		echo 'OrderID = ' . $_POST['ORDERID'] . "<br/>";
		echo 'TXNAMOUNT = ' . $_POST['TXNAMOUNT'] . "<br/>";
	}
} else {
	echo "<b>Checksum mismatched.</b>";
		echo "<a href='https://rana1673.000webhostapp.com'><button>Home</botton></a>";
	//Process transaction as suspicious.
}
