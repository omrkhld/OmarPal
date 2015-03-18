<?php
session_start();
include_once("config.php");

//empty cart by destroying current session
if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
	$return_url = base64_decode($_GET["return_url"]); //return url
	session_destroy();
	header('Location:'.$return_url);
}

//add item in shopping cart
if(isset($_POST["type"]) && $_POST["type"]=='add')
{
	$product_code 	= filter_var($_POST["product_code"], FILTER_SANITIZE_STRING); //product code
	$return_url 	= base64_decode($_POST["return_url"]); //return url
	
	//MySqli query - get details of item from db using product code
	$results = $mysqli->query("SELECT product_name, price FROM Items WHERE product_code='$product_code' LIMIT 1");
	if(!$results)
		die($mysqli->error);
	$obj = $results->fetch_object();
	
	if ($results) { //we have the product info 
		
		//prepare array for the session variable
		$new_product = array(array('name'=>$obj->product_name, 'code'=>$product_code, 'price'=>$obj->price));
		
		if(isset($_SESSION["products"])) //if we have the session
		{
			$found = false; //set found item to false
			
			foreach ($_SESSION["products"] as $cart_itm) //loop through session array
			{
				if($cart_itm["code"] == $product_code){ //the item exists in array

					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'price'=>$cart_itm["price"]);
					$sql = $mysqli->query("INSERT INTO Cart (Name, Code, Price) VALUES ('name', 'code', 'price')");
					$found = true;
				}else{
					//item doesn't exist in the list, just retrieve old info and prepare array for session var
					$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'price'=>$cart_itm["price"]);
				}
			}
			
			if($found == false) //we didn't find item in array
			{
				//add new user item in array
				$_SESSION["products"] = array_merge($product, $new_product);
			}else{
				//found user item in array list, and increased the quantity
				$_SESSION["products"] = $product;
			}
			
		}else{
			//create a new session var if does not exist
			$_SESSION["products"] = $new_product;
		}
		
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}

//remove item from shopping cart
if(isset($_GET["removep"]) && isset($_GET["return_url"]) && isset($_SESSION["products"]))
{
	$product_code 	= $_GET["removep"]; //get the product code to remove
	$return_url 	= base64_decode($_GET["return_url"]); //get return url

	
	foreach ($_SESSION["products"] as $cart_itm) //loop through session array var
	{
		if($cart_itm["code"]!=$product_code){ //item does,t exist in the list
			$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'price'=>$cart_itm["price"]);
			$sql = $mysqli->query("DELETE FROM Cart WHERE Code=".$product_code);
		}
		
		//create a new product list for cart
		$_SESSION["products"] = $product;
	}
	
	//redirect back to original page
	header('Location:'.$return_url);
}
?>