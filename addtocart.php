<?php
session_start();
include('config.php');

$userid = $_POST['userid'];
$proid = $_POST['proid'];
$qty = $_POST['qty'];
$size = $_POST['size'];
$current_user_id = $_SESSION['userid'];
// echo $userid . $proid . $qty . $size . $current_user_id;


if($current_user_id == $userid){
	$check_cart = "SELECT * from cart where proid = '$proid' AND userid = '$userid'";
	$check_cart = mysqli_query($connection, $check_cart);
	if(mysqli_num_rows($check_cart) > 0){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Product already exist in your cart</strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';	
        }else{
		$cart_insert = "INSERT INTO `cart` (`userid`, `proid`, `cartqty`, `cartsize`) VALUES ('$userid', '$proid', '$qty', '$size')";
		$query = mysqli_query($connection, $cart_insert);
		if($query){
			echo '<div class="alert alert-success" role="alert">
			product added successfully
		  </div>';

		}else{
			echo 'query failed';
		}

	}

	
}

?>