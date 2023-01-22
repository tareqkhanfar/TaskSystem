

<?php

session_start(); 
if( isset($_SESSION['userID']) ) {
    } else {
     header("location: http://localhost/Project/index.php");
    }
?>

<!DOCTYPE html > 

<head> 
    <link rel = "stylesheet" href="search.css" >
       <title > search Engine</title>
</head>

<body >



<form action="search.php" method="GET">
    <h2>Task Search</h2>
    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date">
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date">
    <br>
    <label for="priority">Priority:</label>
    <select id="priority" name="priority">
        <option value="3">High</option>
        <option value="2">Medium</option>
        <option value="1">Low</option>
    </select>
    <br>
    <label for="status">Status:</label>
    <select id="status" name="status">
        <option value="Late">Late</option>
        <option value="Active">Active</option>
        <option value="Finished">Finished</option>
        <option value="Pending">Pending</option>
    </select>
    <br>
    <label for="member_name">Member Name:</label>
    <select name="member_name" id ="member_name" required>
    <br>

  <?php
         include_once './../sqlStatment.php';

    $members = SqlStatments::getMembers();
        foreach ($members as $member) {
            echo "<option value='" . $member['id'] . "'>" . $member['name'] . "</option>";
        }
  ?>
  </select>
  
  <br><br>
    <input type="submit" value="Search">
</form>
<br>
</body>





















<?php 


if ($_SERVER ['REQUEST_METHOD']=='GET'){


    if (isset($_GET['start_date']) && isset($_GET['end_date']) &&isset($_GET['member_name']) &&isset($_GET['priority']) &&isset($_GET['status'])  ) {
    include_once  './../sqlStatment.php' ;
  
    
   echo "<table>";
   echo "<tr>   <th>Title</th>   <th>description</th>  <th>start_date</th>  <th>end_date</th>  <th>priority</th>  <th>assigned_to</th>  <th>assigned_by</th>  <th>Status</th>  </tr>";
   $tasks = SqlStatments:: searchEngin($_GET['start_date'] , $_GET['end_date'] ,$_GET['member_name'],$_GET['priority'] ,$_GET['status'] ) ;

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
}
}
   ?> 


?>
