<?php 
    session_start();
    if(isset($_SESSION['user']) != true && isset($_SESSION['is_logged']) != true)
    {
        header('Location:index.php');
        exit();
    }
    require 'connect.php';
    include '../php/class_achievement.php';
    $achievement = new Achievement();
    $achievement->setUserAchievementBadgets($connection, $_SESSION['user']);
    $achievement->getBadgetList($connection);
?>

<!DOCTYPE html>
<html lang = "pl">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="StyleSheet" href="../css/home.css" />
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
		<span>Achievement badgets!</span><a href = "javascript:void(0)" class = "closebtn" onclick = "closeLeaderboard()">&times;</a>
		
		<table>
			<?php 
			     $trCounter = 0;
			     foreach ($achievement->badgetList as $badgets)
			     {
			         if($trCounter % 3 == 0 && $trCounter == 0)    
			         {
			             echo "<tr>";
			         }
			         if ($trCounter % 3 == 0 && $trCounter > 0)
			         {
			             echo "</tr><tr>";
			         }
			         echo "<td width:20px><img height='62' width='62' ";
			         if (in_array($badgets, $achievement->userBadgetList)) 
			         {
			            echo "src = ".$achievement->getAchievementBadgetUrl($connection, $badgets)." ";
			         }
			         else
			         {
			             echo 'src = "../resources/img/question_mark.png"';
			         }
			         echo '" /></td>';
			         
			         $trCounter++;   
			     }
			     echo "</tr>";
			     pg_close($connection);
			?>
		</table>
	</div>
	<header class ="header">
		<table width = 100%>
			<tr>
				<td style = "text-align:left">
					<h1 id="title"><a href ="index.php"><b>Q</b>u¿zzy</a></h1>
				</td>
				<td style = "text-align:right">
					<span>Logged as: <?php echo $_SESSION['user'] ?>&ensp;</span><span><a href = "logout.php">Logout</a></span>
				</td>
			</tr>
		</table>
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
						<li><a href="class_7_test.php">Klasa 7</a></li>
						<li><a href="#">Klasa 8</a></li>
					</ul>
				</li>
				<li>
					<a href ='add_test.php'>Dodaj własny test</a>
				</li>
				<li>
					<a href ='materials.php'>Materiały</a>
				</li>
				<!--  <li>
					<a href ='#'>O autorach</a>
				</li>-->
			</ol>
		</div>
		<section class = "section">
			<div id ="welcome_div">
				<h4>Hej <?php echo $_SESSION['user'] ?>! Witamy ponownie w Qu¿zzy!</h4> 
				<p>Chaiłbys przygotować się do klasówki? Powtórzyć materiał z ostatnich lekcji? Poszerzyć swoją wiedzę<br><br>W takim razie jesteś w właściwym miejscu;)!!!<br><br><br></p>				
			</div>

			<div class ="row">
				<div class="col-sm-6">
					<h4>Pyatnie dnia.</h4>
					<?php
					
					$_SESSION["used_question_ids"][] =  0;
					
					
					require 'connect.php';
					//$conn = mysqli_connect($servername, $username, $password, $dbname);
					$conn_string = "host=localhost port=5432 dbname=quizzy user=postgres password=postgres";
					$conn= pg_connect($conn_string);
					if(!$conn){
						$error = error_get_last();
						echo "Connection failed. Error was: ". $error['message']. "\n";
					}
					require '../php/class_question.php';	
					$question = new Question();
					$question -> drawRandomQuestion($conn);
					//drawRandomQuestion($conn);
					?>
				</div>
				<div class="col-sm-6">
					<div class = "row">
						<div class = "col-sm-16 answear_header" id ="answearHeader"></div>
					</div>
					<div class = "row">
						<div class = "col-sm-1 "></div>
						<div class = "col-sm-2 answear_img"><p id = "answear_img"></p></div>
						<div class ="col-sm-4 answear"><p id = "answear"></p></div>
					</div>
					<div class = "row">
						<div class = "col-sm-1 "></div>
						<div class = "col-sm-2 answear_img"><p><img id="refresh_img" height=50px; width=50px; src = "../resources/img/refresh.png" hidden = true; onclick = "drawNextQuestion()" ></p></div>
						<div class ="col-sm-4 answear"><p id = "refresh"></div>
					</div>
					
									
				</div>
			</div>	
		</section>
		<div class="footer">
		© 2017 PAWEŁ GRZEGORZEWSKI ALL RIGHTS RESERVED
		</div>
	</div>




</body>
</html>

