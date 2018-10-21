<?php 
    
require '../app/connect.php';

class User
{ 
    public $userId;
    public $userClassNumber;
    
    public function userIdGet($username)
    {

        $result =  pg_query($connection, "SELECT user_id FROM usr.tbl_user WHERE username = '$username'");
        $row = pg_fetch_row($result);
        
        $this->userId = $row['user_id'];

        return $this->userId;
        
    }
    
    public function userClassNumberGet($connection, $username)
    {
        
        $result =  pg_query($connection, "SELECT class_number FROM usr.tbl_user WHERE username = '$username'");
        $row = pg_fetch_assoc($result);

        return $row['class_number'];
        
    }
}

?>