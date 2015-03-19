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
				<p>Twilight Imperium Third Edition is an epic empire-building game of interstellar conflict, trade, and struggle for power. 
				Players take the roles of ancient galactic civilizations, each seeking to seize the imperial throne 
				via warfare, diplomacy, and technological progression.</p>
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
				<p>A game of Eclipse places you in control of a vast interstellar civilization, competing for success with its rivals. 
				You will explore new star systems, research technologies, and build spaceships to wage war with. 
				There are many potential paths to victory, so you need to plan your strategy according to the strengths and weaknesses of your species, 
				while paying attention to the other civilizations' endeavors.</p>
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
				<p>In Diplomacy, players represent one of the seven "Great Powers of Europe" (Great Britain, France, Austria, Germany, Italy, Russia or Turkey) 
				in the years prior to World War I. Players instruct each of their units by writing a set of "orders." 
				The outcome of each turn is determined by the rules of the game. There are no dice rolls or other elements of chance. 
				With its incredibly simplistic movement mechanics fused to a significant negotiation element, this system is highly respected.</p>
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
				<p>Descent is a board game in which one player takes on the role of the treacherous overlord, 
				and up to four other players take on the roles of courageous heroes. 
				During each game, the heroes embark on quests and venture into dangerous caves, ancient ruins, dark dungeons, and cursed forests 
				to battle monsters, earn riches, and attempt to stop the overlord from carrying out his vile plot.</p>
				<hr><h2 class="text-right">$59.99</h2>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- CAH Modal -->
<div id="CAHModal" style="top:10%;" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Cards Against Humanity</h3>
			</div>
			<div class="modal-body">
				<p><div id="carousel-5" class="carousel slide container">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1"></li>
						<li data-target="#myCarousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner">
						<!-- Slide 0-->
						<div class="item active">
							<img src="assets/CAH_1.jpg" alt="CAH_1" />
						</div>
						<!-- Slide 1-->
						<div class="item">
							<img src="assets/CAH_2.jpg" alt="CAH_2" />
						</div>
						<!-- Slide 2-->
						<div class="item">
							<img src="assets/CAH_3.jpg" alt="CAH_3" />
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-5" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-5" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div></p>
				<p>A card game which involves a judge choosing a black question or fill-in-the-blank card. 
				Each player holds a hand of ten cards at the beginning of each round, and each player contributes card(s) to the "card czar" anonymously. 
				The card czar determines which card(s) are funniest in the context of the question or fill-in-the-blank card.</p>
				<hr><h2 class="text-right">$20.00</h2>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
	</div>
</div>

<?php include 'foot.php'; ?>