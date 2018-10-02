<?php 
    include '../app/connect.php';

class User
{ 
    public $userId;
    
    public function userIdGet($username)
    {

        $result =  pg_query($connection, "SELECT user_id FROM usr.tbl_user WHERE username = ".$username."");
        $row = pg_fetch_assoc($result);
        
        $this->userId = $row['user_id'];

        return $this->userId;
        
    }
}

?>