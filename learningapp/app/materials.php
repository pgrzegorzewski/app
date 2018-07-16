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
	<link rel="StyleSheet" href="../css/side_menu_leaderboard.css" />
	<script type="text/javascript" src="../js/questionnaire.js"></script>
	<script type="text/javascript" src="../js/question.js"></script>
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
		Test 1000pts;<br>
		Ania 325pts;<br>
		Paweł 150pts;<br>
	</div>
	<header class ="header">
		<h1 id="title"><a href ="index.php"><b>Q</b>u¿zzy</a></h1>
	</header>
		<div class="nav">
			<ol>
				<li>
					<a href ='quiz.php'>Quizy</a>
				</li>
				<li>
					<a href ='#'>Testy</a>
					<ul>
						<li><a href="#">Klasa 4</a></li>
						<li><a href="#">Klasa 5</a></li>
						<li><a href="#">Klasa 6</a></li>
						<li><a href="entertaining_test.php">Klasa 7</a></li>
					</ul>
				</li>
				<li>
					<a href ='add_test.php'>Dodaj własny test</a>
				</li>
				<li>
					<a href ='add_test.php'>Materiały</a>
				</li>
				<!--  <li>
					<a href ='#'>O autorach</a>
				</li>-->
			</ol>
		</div>
		<section class = "section">
			<div id ="welcome_div">
				<h4></h4> 
				<p></p>				
			</div>

		</section>
		<div class="footer">
		© 2017 PAWEŁ GRZEGORZEWSKI ALL RIGHTS RESERVED
		</div>
	</div>




</body>
</html>

