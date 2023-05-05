<?php
require "../connection.php";
    session_start();

	$quantity = "";	
	$quantity =    isset($_POST['qty']) ? $_POST['qty'] : '';
    $item_id=$_GET['id'];
	
    $user_id=$_SESSION['id'];
	$q ='1';



	if ($quantity < 1){
    $add_to_cart_query="INSERT INTO buy (Item_ID,Account_ID,qty) values ('$item_id','$user_id','$q')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: ../buynow.php');
	}else{
	$add_to_cart_query="INSERT INTO buy (Item_ID,Account_ID,qty) values ('$item_id','$user_id','$quantity')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    header('location: ../buynow.php');
	}


?>