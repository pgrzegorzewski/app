<?php

require '../app/connect.php';

class PredefinedTest
{  

    public function predefinedTestListGet($connection)
    {
        $testList = "
                            SELECT
                                  test_id,
                                  test_name
                            FROM  questions.tbl_test
                          ";
        
        $result =  pg_query($connection, $testList);
        
        while($row = pg_fetch_assoc($result))
        {
            echo "<button class = 'predefined_test_btn' id = '".$row['test_id']."'>".$row['test_name']."</button>";
        }
        
    }
}