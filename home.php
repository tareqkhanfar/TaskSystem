
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
   <link rel = "stylesheet" href="CSS/home.css" >
</head>
<body>
    <header>

    <h1> Task Managment System</h1>
    </header>
    <nav> 
        <a href="./home.php">Home </a>
        <a href="./Task/update/update_task.php">View submitted tasks </a>
        <a href="./Task/addNewTask.php">Add New Task </a>
        <a href="./Task/ViewLateTask/viewLateTask.php">view late tasks </a>
        <a href="./Task/ViewPendingTask/viewPendingTask.php">view pending tasks </a>
        <a href="./Task/ViewActiveTask/viewActiveTask.php">view Active tasks </a>
        <a href="./Task/ViewFinishedTask/viewFinishedTask.php">view Finished tasks </a>
    </nav>

    <?php 
     //   include 'sqlStatment.php';

    echo "<table>";
    echo "<tr>   <th>Title</th>   <th>description</th>  <th>start_date</th>  <th>end_date</th>  <th>priority</th>  <th>assigned_to</th>  <th>assigned_by</th>  <th>Status</th>  </tr>";
    $tasks = SqlStatments:: getMyDailyTasks() ;

        foreach ($tasks as $task) {
        echo "<tr>";
        echo "<td>" . $task['title'] . "</td>";
        echo "<td>" . $task['description'] . "</td>";
        echo "<td>" . $task['start_date'] . "</td>";
        echo "<td>" . $task['end_date'] . "</td>";
        echo "<td>" . $task['priority'] . "</td>";
        echo "<td>" . $task['assigned_to'] . "</td>";
        echo "<td>" . $task['assigned_by'] . "</td>";
        echo "<td>" . $task['status'] . "</td>";

        echo "</tr>";
    }
    echo "</table>";
    
    ?> 



</body>
</html>

<?php 

print ("you id = " . $_SESSION['userID'] . "  and memeber id is : " . $_SESSION ['member_id']);
?>