
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
    

    <?php 

       include 'header.php';

    echo "<table>";
    echo "<tr>   <th>Title</th>   <th>Photo reviver</th>  <th>Photo Sender</th>  <th>priority</th>   </tr>";
    $tasks = SqlStatments:: getMyDailyTasks() ;

        foreach ($tasks as $task) {
        echo "<tr>";
        echo "<td>" . $task['title'] . "</td>";
        echo "<td><img src='data:image/png;base64," . base64_encode($task['photo']) . "'/></td>";
        echo "<td><img src='data:image/png;base64," . base64_encode($task['photo']) . "'/></td>";
        
        echo "<td>" . $task['priority'] . "</td>";

        

        echo "</tr>";
    }
    echo "</table>";
    
    ?> 



</body>
</html>

<?php 

print ("you id = " . $_SESSION['userID'] . "  and memeber id is : " . $_SESSION ['member_id']);
include 'footer.php';

?>