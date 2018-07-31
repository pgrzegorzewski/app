<?php

	$servername = "127.0.0.1";
	$username = "postgres";
	$password = "postgres";
	//$username = "pawelg";
	//$password = "aaa";
	$dbname = "quizzy";
	
	$connection;
	
	$conn_string = "host=localhost port=5432 dbname=quizzy user=postgres password=postgres";
	
	$connection= @pg_connect($conn_string);
	if(!$connection){
		$error = error_get_last();
		echo "Connection failed. Error was: ". $error['message']. "\n";
	}
	
?>