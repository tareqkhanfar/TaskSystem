
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add new Task</title>
   <link rel="stylesheet" href = "newTask.css"> 
</head>
<body>

<?php include './../header.php';?>



<form action ="./addNewTask_backEnd.php" method = "POST">
  <label for="task-title">Task Title:</label>
  <input type="text" name="task-title" required>
  <br>
  <label for="task-description">Task Description:</label>
  <textarea name="task-description" value="N/A"></textarea>
  <br>
  <label for="start-date">Start Date:</label>
  <input type="date" id="start-date" name="start-date" required>
  <br>
  <label for="due-date">Due Date:</label>
  <input type="date" id="due-date" name="due-date" required>
  <br>
  <label for="priority">Priority:</label>
  <select id="priority" name="priority">
    <option value="1">Low</option>
    <option value="2">Medium</option>
    <option value="3">High</option>
  </select>
  <br>
  <label for="assigned_to">Assigned To:</label>
<br>

<select name="assigned_to" id ="assigned_to" required>
  <?php
//    include ("../sqlStatment.php");
    $members = SqlStatments::getMembers();
        foreach ($members as $member) {
            echo "<option value='" . $member['id'] . "'>" . $member['name'] . "</option>";
        }
  ?>

</select>

  <br>

  <label for="assigned_by">Assigning Member:</label>
  <input type="text" name="assigned_by" value="<?php echo ($_SESSION ['member_id'])?>" required>
  <br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
<?php include './../footer.php';?>
