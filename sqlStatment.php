
<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

 ?>
<?php
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
public static function updateTask ($task) {

    include "dp.php";
    $query = "UPDATE `tasksystem`.`task`
    SET
    `description` = ?,
    `start_date` = ?,
    `end_date` = ?,
    `priority` = ?,
    `assigned_to` = ?
    WHERE `title` = ?";
$stmt = mysqli_prepare($conn , $query);
mysqli_stmt_bind_param ($stmt , "sssiis" , $task->description ,  $task->startDate , $task->endDate , $task->priority ,  $task->assignTo ,  $task->title ) ;
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);
   
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
    $query = "select * from task where assigned_to =".$_SESSION['member_id'] ;
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


public static function getMyPendingTask () {
    include 'dp.php' ;
    $query = "select * from task where assigned_to =".$_SESSION['member_id'] ." and status='Pending'";
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

public static function getMyActiveTask () {
    include 'dp.php' ;
    $query = "select * from task where assigned_to =".$_SESSION['member_id']."  and status = 'Active'" ;
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
public static function getMyFinishedTask () {
    include 'dp.php' ;
    $query = "select * from task where assigned_to =".$_SESSION['member_id']." and status = 'Finished'" ;
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

public static function getMyLateTask () {
    include 'dp.php' ;
    $query = "select * from task where assigned_to =".$_SESSION['member_id'] ." and status = 'Late'" ;

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

public static function getMySendingTask () {
    include 'dp.php' ;
    $query = "select * from task where assigned_by =".$_SESSION['member_id'] ;
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

public static function getTaskByTitle ($title) {
    include 'dp.php' ;
    $query = "select * from task where title = '$title'" ;
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

public static function setTaskToActive($title) {
    include 'dp.php' ;

    $sql = "update task set status = 'Active' where title = '$title' " ;

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();

}

public static function setTaskToFinished($title) {
    include 'dp.php' ;
    $sql = "update task set status = 'Finished' where title = '$title' " ;

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
      
}

public static function setTaskToLate() {
    include 'dp.php' ;
    $sql = "update task set status = 'Late' where start_date > end_date" ;

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
      
}

public static function searchEngin ($startDate , $EndDate , $MemberID , $priority , $status) {
    include 'dp.php' ;
    $query = "select title, description, start_date, end_date, priority, assigned_to,assigned_by, member.name, status 

    from task join member_details member on (member.id = $MemberID) and (member.id = assigned_to) 
      where start_date = '$startDate' and end_date='$EndDate' and priority = $priority and status = '$status'" ;
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
