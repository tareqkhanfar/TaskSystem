
<?php 
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    include 'sqlStatment.php';
    SqlStatments:: setTaskToLate();

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
   <link rel = "stylesheet" href="./CSS/home.css" >
</head>
<body>


    
<?php include 'header.php';?>

<ul class="breadcrumb">
  <li class="CP-Step">
    <a href="#">Completed Step</a>
  </li>
  <li class="CR-Step">
    <a href="#">Current Step</a>
  </li>
  <li class="RM-Step">
    <a href="#">Remaining Step</a>
  </li>
</ul>


       <asid id="user-info">
    <img src="ImageUsers/<?php echo 'f1.png'; ?>" alt="User Photo" id="user-photo">
    <p>Name: <?php echo 'tareq'; ?></p>
    <p>ID: <?php echo $_SESSION['userID']; ?></p>
</asid>

    <?php 



      


    echo "<table>";
    echo "<tr>   <th>Title</th>   <th>Photo reviver</th>  <th>Photo Sender</th>  <th>priority</th>  <th>Action</th>  </tr>";
    $tasks = SqlStatments:: getMyDailyTasks() ;

        foreach ($tasks as $task) {
        echo "<tr>";

        echo ("<form method= 'GET' action = 'Task/ViewDailyTask/viewTask.php' >  ") ;
        echo "<td>" . $task['title'] . "</td>";

        echo "<td><img src='ImageUsers/".$task['photoReciver'] ."'/></td>";
        echo "<td><img src='ImageUsers/".$task['photoSender'] . "'/></td>";        
        echo "<td>" . $task['priority'] . "</td>";
        echo ("<td>" );
        echo ("<input type='submit' value = 'OPEN' /> ");
        echo ("<input type = 'hidden' name = 'taskDaily' value ='{$task['title']}' ") ;
        echo ("<td>" );
        echo "</tr>";
        echo ("</form> ") ;

    }
    echo "</table>";
    
    ?> 



</body>
</html>

<?php 

print ("you id = " . $_SESSION['userID'] . "  and memeber id is : " . $_SESSION ['member_id']);
include 'footer.php';

?>