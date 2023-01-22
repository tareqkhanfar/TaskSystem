
    <?php include './../../header.php';?>

 <?php 
 
        include './../../sqlStatment.php';

    echo "<table>";
    echo "<tr>   <th>Title</th>   <th>description</th>  <th>start_date</th>  <th>end_date</th>  <th>priority</th>  <th>assigned_to</th>  <th>assigned_by</th>  <th>Status</th>  </tr>";
    $tasks = SqlStatments:: getMyFinishedTask() ;

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
    <?php include './../../footer.php';?>
