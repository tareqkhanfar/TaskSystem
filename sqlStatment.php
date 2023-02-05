
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


  $conn = new PDO("mysql:host=localhost;dbname=tasksystem", "root", "1234");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conn->prepare("INSERT INTO member_details (`id`, `name`, `nationality`, `address`, `mobile_number`, `email`, `photo`, `qualification`, `experience`, `cv`) 
                        VALUES (:id, :name, :nationality, :address, :phone, :email, :photo, :qua, :workExp, :cv)");
$stmt->bindParam(':id', $id);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':nationality', $nationality);
$stmt->bindParam(':address', $address);
$stmt->bindParam(':phone', $phone);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':photo', $imgContent);
$stmt->bindParam(':qua', $qua);
$stmt->bindParam(':workExp', $workExp);
$stmt->bindParam(':cv', $cvContent);


$stmt->execute();

    //include 'dp.php';
    /*
    try {
     //   $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Error: Connection not established.");
        }
        $sql = 'INSERT INTO member_details (`id`,
                `name`,
                `nationality`,

                `address`,
                `mobile_number`,
                `email`,
                `photo`,
                `qualification`,
                `experience`,
                `cv`) VALUES (?,?,?,?,?,?,?,?,?,?)';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "isssisbssb", $id, $name,$nationality ,  $address,  $phone , $email  , $imgContent , $qua, $workExp, $cvContent);
        mysqli_stmt_execute($stmt);
        if(mysqli_stmt_affected_rows($stmt)>0){
          echo "File uploaded successfully.";
      }else{
          echo "File upload failed, please try again.";
      }
        mysqli_stmt_close($stmt);
     
        mysqli_close($conn);
        */
        $_SESSION['id'] = $id ;
        $_SESSION['name'] = $name ;

        header("Location: e_account.php");

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
   
    $query = "  select title , mb.photo as photoReciver , m2.photo as photoSender , priority , assigned_by , status from task join member_details mb on (assigned_to = ". $_SESSION['member_id'] .")  join member_details m2 on (m2.id = assigned_by)
    and( assigned_to =  mb.id) where start_date =cast((now()) as date) ;"; 

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
    $query = "    select  title, description, start_date, end_date, priority  , status, mb.name as assignedReciver  , m2.name assignedSender ,  mb.photo as photoReciver , m2.photo as photoSender from task  join member_details mb on (mb.id = assigned_to)  join member_details m2 on (m2.id = assigned_by) where title = '$title';" ;
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
  return $tasks[0] ;
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

public static function searchEngin ($startDate , $EndDate , $MemberID , $priority , $status , $sortBy) {
    include 'dp.php' ;
   

      $query=  "select title, description, start_date, end_date, priority, assigned_to,assigned_by, member.name as assignedToName  , m2.name assignedBYName , status 

      from task join member_details member on (member.id = $MemberID) and (member.id = assigned_to) join member_details m2 on (m2.id = assigned_by)
        where start_date = '$startDate' and end_date='$EndDate' and priority = $priority and status = '$status' {$sortBy} " ;
  
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

public static function countLateTasks () {
  include 'dp.php' ;
  $query = "select count(*) as count from task where assigned_to =".$_SESSION['member_id'] ." and status = 'Late'" ;

  if ($conn ->connect_error) {
      // display an error message
      die ("error" . $conn->error) ;
}
else {
    $result = mysqli_query ($conn , $query) ;

    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
     // $tasks[] = $row ;
      $count = $row['count'] ;
    }
}
return $count ;
}
public static function countPendingTasks () {
  include 'dp.php' ;
  $query = "select count(*) as count from task where assigned_to =".$_SESSION['member_id'] ." and status = 'Pending'" ;

  if ($conn ->connect_error) {
      // display an error message
      die ("error" . $conn->error) ;
}
else {
    $result = mysqli_query ($conn , $query) ;


    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
     // $tasks[] = $row ;
      $count = $row['count'] ;
    }
}
return $count ;
}

public static function countActiveTasks () {
  include 'dp.php' ;
  $query = "select count(*) as count from task where assigned_to =".$_SESSION['member_id'] ." and status = 'Active'" ;

  if ($conn ->connect_error) {
      // display an error message
      die ("error" . $conn->error) ;
}
else {
    $result = mysqli_query ($conn , $query) ;

    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
     // $tasks[] = $row ;
      $count = $row['count'] ;
    }
}
return $count ;
}

public static function countFinishedTasks () {
  include 'dp.php' ;
  $query = "select count(*) as count from task where assigned_to =".$_SESSION['member_id'] ." and status = 'Finished'" ;

  if ($conn ->connect_error) {
      // display an error message
      die ("error" . $conn->error) ;
}
else {
    $result = mysqli_query ($conn , $query) ;

    $count = 0;
    while ($row = mysqli_fetch_assoc($result)) {
     // $tasks[] = $row ;
      $count = $row['count'] ;
    }
}
return $count ;
}

public static function updateTheStatusByID ($title , $status) {
  //include 'dp.php' ;

 //$sql =  "update task set status = '$status' where title = '$title'; " ;
  
}


}




?>
