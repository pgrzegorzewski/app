<?php
    session_start();

    if(isset($_POST['nick']))
    {
        $success = true;
        
        $nick = $_POST['nick'];
        if(strlen($nick) < 3 || strlen($nick) > 20)
        {
            $success = false;
            $_SESSION['e_nick'] = "Nick musi mieć długość od 3 do 20 znaków";
        }
        
        if(!ctype_alnum($nick))
        {
            $success = false;
            $_SESSION['e_nick'] = "Nick musi zawierać wyłącznie znaki alfanumeryczne nie zawierające akcentów";
        }
        
        $email = $_POST['email'];
        $emailSanitised = filter_var($email, FILTER_SANITIZE_EMAIL);
        if(!filter_var($emailSanitised, FILTER_VALIDATE_EMAIL) || $email != $emailSanitised)
        {
            $success = false;
            $_SESSION['e_email'] = "Niepoprawny adres email";
        }
        
        $password = $_POST['password'];
        $password_2 = $_POST['password_2'];
        
        if(strlen($password) < 8 || strlen($password) > 20)
        {
            $success = false;
            $_SESSION['e_password'] = "Hasło musi posiadać od 8 do 20 znaków";
            
        }
        
        if($password != $password_2)
        {
            $success = false;
            $_SESSION['e_password'] = "Hasła są różne";
            
        }
        
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        
        if(!isset($_POST['terms_and_conditions']))
        {
            $success = false;
            $_SESSION['e_terms_and_conditions'] = "Terms and conditions must be checked";
        }
        
        $secret = '6Lf9YhwUAAAAADRPoJ6_ZwUHHEDDQiIjkbxMeoYA';
        
        $check_recaptcha = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $response_recaptcha = json_decode($check_recaptcha);
        
        if(!$response_recaptcha->success)
        {
            $success = false;
            $_SESSION['e_recaptcha'] = "You are bot";
        }
          
        
    }
    
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset = "utf-8"/>
	<meta http-equiv ="X-UA-COMPATIBLE" content = "IE=edge,chrom=1"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<link rel="StyleSheet" href="../css/home.css" />
	<link rel="StyleSheet" href="../css/index.css" />
	<title>Quizzy - rejestracja</title>
</head>
<body>
	<div class="container-fluid">
    	<div class = "container section">   
    	 	<div class="form"><h1><b>Q</b>u¿zzy</h1></div><br />
    	 	<div class="form"><h4>Rejestracja</h4></div>
    	 	<div class="form">
        	 	<form method="post">
        	 		
        	 		Login: <br />
        	 		<input type = "text" name="nick"><br />
        	 		
        	 		<?php 
            			if(isset($_SESSION['e_nick'])){
            				echo '<div class = "error">'.$_SESSION['e_nick'].'</div>';
            				unset($_SESSION['e_nick']);
            			}
		            ?>
        	 		
        	 		Hasło: <br />
        	 		<input type = "password" name="password"><br />
        	 		
        	 		Powtórz haslo: <br />
        	 		<input type = "password" name="password_2"><br />
        	 		
        	 		<?php 
            			if(isset($_SESSION['e_password'])){
            				echo '<div class = "error">'.$_SESSION['e_password'].'</div>';
            				unset($_SESSION['e_password']);
            			}
		            ?>
		                   	 		
        	 		Email: <br />
        	 		<input type = "email" name="email"><br />
        	 		
        	 		<?php 
        	 			if(isset($_SESSION['e_email'])){
            			    echo '<div class = "error">'.$_SESSION['e_email'].'</div>';
            			    unset($_SESSION['e_email']);
            			}
            		?>
        	 		
        	 		<label>
        	 			<input type="checkbox" name = "terms_and_conditions">Akceptuję regulamin
        	 		</label>
        	 		
        	 		<?php 
        	 			if(isset($_SESSION['e_terms_and_conditions'])){
            			    echo '<div class = "error">'.$_SESSION['e_terms_and_conditions'].'</div>';
            			    unset($_SESSION['e_terms_and_conditions']);
            			}
            		?>
        	 		
        	 		<br />
        	 		<div class="g-recaptcha" data-sitekey="6Lf9YhwUAAAAAD9ikfHftOu5GXoDOQWbwE_HM4ML" style ="display: inline-block"></div><br />
        	 		<?php 
            			if(isset($_SESSION['e_recaptcha'])){
            				echo '<div class = "error">'.$_SESSION['e_recaptcha'].'</div>';
            				unset($_SESSION['e_recaptcha']);
            			}
		            ?>
		           
		            <input type = "submit" value = "Register" />
	
        	 	</form>
        	 </div>
        	
    	</div>
    <div class="footer">
		© 2018 PAWEŁ GRZEGORZEWSKI ALL RIGHTS RESERVED
	</div>
    </div>
</body>


</html>