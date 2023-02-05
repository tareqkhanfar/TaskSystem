<?php


     $host ='127.0.0.1';
      $userName ='root';
      $password ='1234' ;
      $nameDB ='tasksystem' ;


         $conn =mysqli_connect ($host , $userName , $password , $nameDB) ;

        if (isset($conn)) {
               echo ('co') ;
        }
        else {
         die ("DataBase Error") ; 
        }

   




?>