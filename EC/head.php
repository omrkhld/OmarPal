<?php
// connect to database
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>"Omar's WTS List"</title>
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
	<?php include 'navbar.php'; ?>
	
	<!-- container -->
    <div class="container">
 
        <div class="page-header">
            <h1><?php echo isset($page_title) ? $page_title : "Omar's WTS List"; ?></h1>
        </div>