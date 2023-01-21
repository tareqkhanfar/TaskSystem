

<?php
    session_start () ;

class SqlStatments {
    public static function CreateNewMember($id, $name, $nationality,  $address, $email, $phone, $workExp, $qua, $imgContent, $cvContent)
{
    include 'dp.php';
    try {
     //   $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Error: Connection not established.");
        }
        $sql = 'INSERT INTO member_details (`id`,
                `name`,
                `nationality`,

                `address`,
                `email`,
                `mobile_number`,
                `qualification`,
                `experience`,
                `photo`,
                `cv`) VALUES (?,?,?,?,?,?,?,?,? ,?)';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "issssissbb", $id, $name,$nationality ,  $address, $email, $phone, $qua, $workExp, $imgContent, $cvContent);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        $_SESSION['id'] = $id ;
        $_SESSION['name'] = $name ;

        header("Location: e_account.php");

    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}


public static  function getMembers() {
    include 'dp.php';
    if ($conn ->connect_error) {
          // display an error message
          die ("error" . $conn->error) ;
    }
    else {
        $sql = "select id , name from member_details" ;
        $result = mysqli_query ($conn , $sql) ;
      
        $members = array() ;
        while ($row = mysqli_fetch_assoc($result)) {
          $members[] = $row ;
        }
    }
    return $members ;

}
public static function insertNewTask ($task) {

    include "dp.php";
    $query = "INSERT INTO `tasksystem`.`task` ( `title`, `description`, `start_date`, `end_date`, `priority`, `assigned_to`, `assigned_by`)
    VALUES (?,?,?,?,?,?,?)" ;
$stmt = mysqli_prepare($conn , $query);
mysqli_stmt_bind_param ($stmt , "ssssiii" , $task->title ,  $task->description , $task->startDate , $task->endDate ,  $task->priority ,  $task->assignTo ,  $task->assignBy ) ;
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);
   
}

public static function getMyDailyTasks () {
    include 'dp.php' ;
    $query = "select * from task where assigned_to = $_SESSION ['member_id'] " ;
    if ($conn ->connect_error) {
        // display an error message
        die ("error" . $conn->error) ;
  }
  else {
      $result = mysqli_query ($conn , $query) ;
    
      $tasks = array() ;
      while ($row = mysqli_fetch_assoc($result)) {
        $tasks[] = $row ;
      }
  }
  return $tasks ;
}
}
?>
