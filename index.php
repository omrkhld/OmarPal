<?php
session_start();

$page_title="Products";
include 'head.php';

// to prevent undefined index notice
$action = isset($_GET['action']) ? $_GET['action'] : "";
$id = isset($_GET['id']) ? $_GET['id'] : "1";
$name = isset($_GET['name']) ? $_GET['name'] : "";

if($action=='added'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was added to your cart!";
    echo "</div>";
}

if($action=='exists'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> already exists in your cart!";
    echo "</div>";
}

echo '<div class="container">';
    echo '<div class="col-md-12">';
		echo '<div class="center-block text-center">';
			echo '<h1>Omar\'s WTS List</h1>';
            echo '<p class="lead">Game On</p>';
        echo '</div>';
        echo '<div class="container">';
            echo '<div class="row">';
				$results = $mysqli->query("SELECT * FROM Items ORDER BY id ASC");
				if ($results) {
					//fetch results set as object and output HTML
					while($obj = $results->fetch_object())
					{
						echo '<div class="col-sm-6 col-md-4">'; 
						echo '<div class="thumbnail"><img src="assets/'.$obj->img.'">';
						echo '<div class="caption"><h3>'.$obj->name.'</h3>';
						echo '<div class="product-info">';
						echo '<hr><h2 class="text-right">'.$currency.$obj->price.'</h2>';
						echo '<p><a href="#'.$obj->short.'Modal" class="btn btn-default" role="button" data-toggle="modal">Details</a>';
						echo '<a href="add_to_cart.php?id='.$obj->id.'&name='.$obj->name.'" class="btn btn-primary pull-right">Add To Cart</a></p>';
						echo '</div></div></div>';
						echo '</form>';
						echo '</div>';
					}
				}
			echo '</div>';
            //<!--/row-->
        echo '</div>';
        //<!--/container-->
    echo '</div>';
echo '</div>';
?>

<!-- TI3 Modal -->
<div id="TI3Modal" style="top:10%;" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Twilight Imperium 3</h3>
			</div>
			<div class="modal-body">
				<p><div id="carousel-1" class="carousel slide container">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<!-- Slide 0-->
						<div class="item active">
							<img src="assets/TI3_1.jpg" alt="TI3_1" />
						</div>
						<!-- Slide 1-->
						<div class="item">
							<img src="assets/TI3_2.jpg" alt="TI3_2" />
						</div>
						<!-- Slide 2-->
						<div class="item">
							<img src="assets/TI3_3.jpg" alt="TI3_3" />
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div></p>
				<p>Long Description here</p>
				<hr><h2 class="text-right">$84.99</h2>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- EC Modal -->
<div id="ECModal" style="top:10%;" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Eclipse</h3>
			</div>
			<div class="modal-body">
				<p><div id="carousel-2" class="carousel slide container">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<!-- Slide 0-->
						<div class="item active">
							<img src="assets/EC_1.jpg" alt="EC_1" />
						</div>
						<!-- Slide 1-->
						<div class="item">
							<img src="assets/EC_2.jpg" alt="EC_2" />
						</div>
						<!-- Slide 2-->
						<div class="item">
							<img src="assets/EC_3.jpg" alt="EC_3" />
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-2" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-2" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div></p>
				<p>Long Description here</p>
				<hr><h2 class="text-right">$90.00</h2>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- DI Modal -->
<div id="DIModal" style="top:10%;" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Diplomacy 50th Anniversary Edition</h3>
			</div>
			<div class="modal-body">
				<p><div id="carousel-3" class="carousel slide container">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<!-- Slide 0-->
						<div class="item active">
							<img src="assets/DI_1.jpg" alt="DI_1" />
						</div>
						<!-- Slide 1-->
						<div class="item">
							<img src="assets/DI_2.jpg" alt="DI_2" />
						</div>
						<!-- Slide 2-->
						<div class="item">
							<img src="assets/DI_3.jpg" alt="DI_3" />
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-3" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-3" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div></p>
				<p>Long Description here</p>
				<hr><h2 class="text-right">$40.50</h2>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- DE Modal -->
<div id="DEModal" style="top:10%;" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Descent: Journeys in the Dark 2nd Edition</h3>
			</div>
			<div class="modal-body">
				<p><div id="carousel-4" class="carousel slide container">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<!-- Slide 0-->
						<div class="item active">
							<img src="assets/DE_1.jpg" alt="DE_1" />
						</div>
						<!-- Slide 1-->
						<div class="item">
							<img src="assets/DE_2.jpg" alt="DE_2" />
						</div>
						<!-- Slide 2-->
						<div class="item">
							<img src="assets/DE_3.jpg" alt="DE_3" />
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-4" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-4" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div></p>
				<p>Long Description here</p>
				<hr><h2 class="text-right">$59.99</h2>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
	</div>
</div>

<?php include 'foot.php'; ?>