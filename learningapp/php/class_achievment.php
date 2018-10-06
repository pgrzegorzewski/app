<?php

include '../app/connect.php';

class Achievment
{   
    public $userBadgetList = array();
    public $badgetList = array();
    public $user;
        
    public function setUserAchievementBadgets($userId)
    {
        
        $userBadgetsSql =  pg_query($connection, "SELECT 
                                                        ua.user_id, 
                                                        ua.achievement_id 
                                                  FROM 
                                                        usr.tbl_user_achievement ua
                                                  INNER JOIN usr.tbl_achievement a          ON          a.achievement_id = ua.achievement_id
                                                  WHERE ua.user_id = ".$userId."");
        
        while ($row = pg_fetch_assoc($result)) {
            array_push($this->userBadgetList, $row['achievement_id']);
        }
    }
    
    public function getBadgetList()
    {
        $userBadgetsSql =  pg_query($connection, "SELECT
                                                        achievement_id
                                                        ,image url
                                                  FROM
                                                        usr.tbl_achievement 
                                                  WHERE is_active = 1::BIT");
        
        while ($row = pg_fetch_assoc($result)) {
            array_push($this->badgetList, $row['achievement_id']);
        }
        
    }
    
    public function showAchievementBadgets()
    {
      
    }
}
?>