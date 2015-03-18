<?php
session_start();
 
$page_title="Cart";
include 'head.php';
 
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
 
if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was removed from your cart!";
    echo "</div>";
}
 
else if($action=='quantity_updated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> quantity was updated!";
    echo "</div>";
}
 
if(count($_SESSION['cart_items'])>0){
	echo("<script>console.log('cart: ".$_SESSION['cart_items']."');</script>");
    // get the product ids
    $ids = "";
    foreach($_SESSION['cart_items'] as $id=>$value){
		echo("<script>console.log('Adding ID: ".$id."');</script>");
        $ids = $ids . $id . ",";
    }
	echo("<script>console.log('ID: ".$ids."');</script>");
 
    // remove the last comma
    $ids = rtrim($ids, ',');
	$ids = ltrim($ids, ',');
	echo("<script>console.log('New ID: ".$ids."');</script>");
	
    //start table
    echo "<table class='table table-hover table-responsive table-bordered'>";
 
        // table heading
        echo "<tr>";
            echo "<th class='textAlignLeft'>Product Name</th>";
            echo "<th>Price</th>";
            echo "<th>Action</th>";
        echo "</tr>";
 
        $query = "SELECT id, name, price FROM Items WHERE id IN (".$ids.") ORDER BY name";
        $result = $mysqli->query($query);
		
        $total_price=0;
		if($result != FALSE){
			while ($row = $result->fetch_assoc()){
				$name = $row["name"];
				$price = $row["price"];
				$id = $row["id"];
				echo "<tr>";
					echo "<td>".$name."</td>";
					echo "<td>&#36;".$price."</td>";
					echo "<td>";
						echo "<a href='remove_from_cart.php?id=".$id."&name=".$name."' class='btn btn-danger'>";
							echo "<span class='glyphicon glyphicon-remove'></span> Remove from cart";
						echo "</a>";
					echo "</td>";
				echo "</tr>";
 
				$total_price+=$price;
			}
        } else {
			die($result === FALSE ? "Result was false." : $error);
		}
 
        echo "<tr>";
			echo "<td><b>Total</b></td>";
			echo "<td>&#36;{$total_price}</td>";
			echo "<td>";
				echo "<form action='Checkout_PHP/paypal_ec_redirect.php' method='POST'>";
					echo "<input type='hidden' name='PAYMENTREQUEST_0_AMT' value={$total_price}></input>";
					echo "<input type='hidden' name='currencyCodeType' value='USD'></input>";
					echo "<input type='hidden' name='paymentType' value='Sale'></input>";
					echo "<input type='image' src='https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png' alt='Check out with PayPal'></input>";
				echo "</form>";
				echo "<a href='#' class='btn btn-success'>";
					echo "<span class='glyphicon glyphicon-shopping-cart'></span> Checkout";
				echo "</a>";
            echo "</td>";
        echo "</tr>";
    echo "</table>";
}
 
else{
    echo "<div class='alert alert-danger'>";
        echo "<strong>No products found</strong> in your cart!";
    echo "</div>";
}

include 'foot.php';
?>