<?php
	require '../connection.php';
    session_start();
    $user_id=$_SESSION['id'];
     $cart_query = mysqli_query($con, "select * from cart where Account_ID='$user_id'");
	$f =0;
	$fa=1;
      if(mysqli_num_rows($cart_query) >= 0){
			   while($product_item = mysqli_fetch_assoc($cart_query)){
	$quantity = "";	
	$price = "";	
	$quantity =$_POST['qty'];
	$Product_ID = $_POST['Product_ID'];

	if ($quantity <= 0){
    $add_to_cart_query="Update cart SET Qty = $fa WHERE Account_ID = '$user_id' AND Item_ID ='$Product_ID'";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
        header('location: ../checkout.php');
	}else{
	$add_to_cart_query="Update cart SET Qty = $quantity WHERE Account_ID = '$user_id' AND Item_ID ='$Product_ID' ";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
        header('location: ../checkout.php');
	}
			  };
		   };
?>

