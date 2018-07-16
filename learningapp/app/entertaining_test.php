<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="StyleSheet" href="../css/index.css" />
	<link rel="StyleSheet" href="../css/question.css" />
	<link rel="StyleSheet" href="../css/entertaining_test.css" />
	<link rel="StyleSheet" href="../css/side_menu_leaderboard.css" />
	<script type="text/javascript" src="../js/question.js"></script>
	<script type="text/javascript" src="../js/entertaining_test.js"></script>
	<script type="text/javascript" src="../js/side_menu_leaderboard.js"></script>
</head>

<body>

<div class="container-fluid">
	
	<div class= "sidemenu_2">
	
	</div>
	<div class= "sidemenu">
		<p style="cursor:pointer"><img src = "../resources/img/trophy.png" height = "50px" onmouseover="openLeaderboard()"/></p> <!-- &#9776; -->
	</div>
	<div id = 'leaderboard' class = 'leaderboard' onmouseleave = "closeLeaderboard()" >
		<a href = "javascript:void(0)" class = "closebtn" onclick = "closeLeaderboard()">&times;</a>
		<table>
			<tr>
				<td><img src="http://simexis.com/ss-data/cache/product/16/16-30/multi_language_for_laravel_5.x-1024x1024-thumb.png" height="62" width="62"></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><img src="http://www.clker.com/cliparts/8/2/3/7/P/w/tubito1.svg" height="62" width="62"></td>
				
			</tr>
		</table>
	</div>


	<header class ="header">
		<h1 id="title"><a href ="index.php"><b>Q</b>u¿zzy</a></h1>
	</header>
	
	<div class="nav">
		<ol>
			<li>
				<a href ='quiz.php'>Quizes</a>
			</li>
			<li>
				<a href ='#'>Tests</a>
				<ul>
					<li><a href="#">Personality</a></li>
					<li><a href="#">Cultural</a></li>
					<li><a href="#">Science</a></li>
					<li><a href="#" id = "visited">Entertaining</a></li>
				</ul>
			</li>
			<li>
				<a href ='add_test.php'>Add own test</a>
			</li>
			<li>
				<a href ='#'>About author</a>
			</li>
		</ol>
	</div>
	
	<section class = "section">
		<div id ="welcome_div">
			<h4>Klasa 7</h4>
			
		</div>
		<div class = "row">
			<div class="col-sm-12" id="tiles">
				<h5 style = "text-align:center">Wybierz dział:</h5>
				<?php //here php to implement dynamic creation of category tiles
				
				echo "
					<table id = \"tile\">
						<tr>
							<td>						
								<button  name = '1' id = '4' class = 'category btn' >Chemia</button>
							</td>
							<td>
								<button name = '2' id = '5'  class = 'category btn'>Angielski</button>
							</td>
						</tr>
						<tr>
							<td>
								<button  name = '3' id = '6' class = 'category btn' >Historia</button>
							</td>
							<td>
								<button t name = '4' id = '4' class = 'category btn' >Lektury</button>
							</td>
						</tr>
					</table>
				";
				?>
				<br/><br/>

			</div>
		</div>
		<div class ="row">
			<div class="col-sm-12">	
				<h4 id="test_title" hidden = "true">Zaczynajmy!</h4>
			</div>
		</div>
		<div id = "test_questions">

		</div>
		<div class ='row'>
				<div class='col-sm-12' id = 'result_div'>	
					<h4 id= 'result_text' hidden = 'true'></h4>
					<h4 id= 'result_award' hidden = 'true' style ="text-align:center;"><!-- Nowa naklejka!<img src="https://www.1englishteacher.com/wp-content/uploads/2016/08/cropped-logo_lengua.png" height="62" width="62"> --></h4>
				</div>
		</div>
				
	</section>
	<div class="footer">
		© 2017 PAWEŁ GRZEGORZEWSKI ALL RIGHTS RESERVED
	</div>
</div>




</body>
</html>

