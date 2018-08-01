<?php 
    session_start();
    require_once '../app/connect.php';

    $login = $_POST['login'];
    $password = $_POST['password'];
    
    try 
    {
        $result =  @pg_query($connection, "SELECT * FROM usr.sf_user_password_verify('$login', '$password') AS success");
        $row = pg_fetch_assoc($result);
        
        if($row['success'] == 1)
        {
            $_SESSION['user'] = $login;
            header('Location:home.php');
        }
        else
        {
            $_SESSION['error'] = '<p style = "color:red; text-align:center;">Login unsuccessfull, unproper login or password</p>';
             header('Location:index.php');
        }
        pg_free_result($result);
        pg_close($connection);
        
    } catch (Exception $error) 
    {
        echo $error->getMessage();
    }
     
      
?>