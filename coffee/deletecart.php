<?php
include('config.php');
$cartid = $_POST['cartid'];

$delete = mysqli_query($connection,"DELETE from `cart` WHERE cartid = '$cartid'") or die(mysqli_error($con));
if($delete){
    echo 1;
}else{
    echo 0;
}

?>