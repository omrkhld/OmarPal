<?php
session_start();
include_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Omar's WTS List</title>
		<meta name="generator" content="OmarPal" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body>
<!--template-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container" style="">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">OmarPal</a>
        </div>
        <div class="collapse navbar-collapse" style="">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php" class="" style="">Store</a>
                </li>
            </ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="cart.php" class="navbar-nav">Cart<span class="glyphicon glyphicon-shopping-cart"></span></a></li>
			</ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
<div class="container">
    <div class="row">
		<?php
			//current URL of the Page. cart_update.php redirects back to this URL
			$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
			
			$results = $mysqli->query("SELECT * FROM Items ORDER BY id ASC");
			if ($results) {
				//fetch results set as object and output HTML
				while($obj = $results->fetch_object())
				{
					echo '<div class="col-sm-12 col-md-10 col-md-offset-1">';
					echo '<form method="post" action="cart_update.php">';
					echo '<table class="table table-hover">';
					echo '<thead><tr><th>Product</th>';
					echo '<th class="text-center">Price</th>';
					echo '<th></th></tr></thead>';
					echo '<tbody><tr><td class="col-sm-8 col-md-6">';
					echo '<div class="media">';
					echo '<class="thumbnail pull-left"><img class="media-object" src="assets/'.$obj->product_img_name.'" style="width: 72px; height: 72px;">';
					echo '<div class="media-body">';
					echo '<h4 class="media-heading">'.$obj->Name.'</h4></div></div></td>';
					echo '<td class="col-sm-1 col-md-1 text-center"><strong>'.$currency.$obj->Price.'</strong></td>';
					echo '<td class="col-sm-1 col-md-1">';
					echo '<button type="button" class="btn btn-danger">';
					echo '<span class="glyphicon glyphicon-remove"></span> Remove';
					echo '</button></td></tr>';
					echo '<input type="hidden" name="product_code" value="'.$obj->product_code.'" />';
					echo '<input type="hidden" name="type" value="add" />';
					echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
					echo '</form>';
					echo '</div>';
				}
			} else {
				echo 'Your cart is empty.';
			}
		?>
		<tr>
			<td>   </td>
			<td>   </td>
			<td>   </td>
			<td><h3>Total</h3></td>
			<td class="text-right"><h3><strong><?php echo $totalAmount ?></strong></h3></td>
		</tr>
		<tr>
			<td>   </td>
			<td>   </td>
			<td>
			<a href="index.php" type="button" class="btn btn-default">
				<span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
			</a>
			<td>
			<form action="Checkout_PHP/paypal_ec_redirect.php" method="POST">
				<input type="hidden" name="PAYMENTREQUEST_0_AMT" value=<?php echo $totalAmount ?>></input>
				<input type="hidden" name="currencyCodeType" value="USD"></input>
				<input type="hidden" name="paymentType" value="Sale"></input>
				<!--Pass additional input parameters based on your shopping cart. For complete list of all the parameters click here -->
				<input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-medium.png" alt="Check out with PayPal"></input>
			</form>
		</td>
		<td>
			<button type="button" class="btn btn-success">
				Checkout <span class="glyphicon glyphicon-play"></span>
			</button></td>
		</tr>
		</tbody></table></div>
	</div>
</div>
<hr>

<!--/template-->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>