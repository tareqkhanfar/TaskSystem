

<?php 
        include_once './../../sqlStatment.php';
        if (isset($_POST['title'])){
            echo ("<h3> Task Title : ".$_POST['title'] ."<h3/>");
            $taskTitle = $_POST['title'];
            $tasks = SqlStatments::getTaskByTitle($_POST['title']);
            $task = $tasks[0] ;
            

    

           
        }
        else {
            echo ("123123123");
            $task =  array("title"=>"N/A", "description"=>"n/a", "start_date"=>"n/a" , "end_date"=>"n/a", "priority"=>1);

        }
?>


<form action = "update.php" method = "post">

<input type = "hidden" name = "task_title" value = "<?php echo ($taskTitle) ;?>"  >

    <label for="description">Description:</label>
    <br>
    <textarea id="description" name="description"><?php echo $task['description']; ?></textarea>
    <br>

    <label for="start_date">Start Date:</label>
    <br>

    <input type="date" id="start_date" name="start_date" value="<?php echo ($task['start_date']); ?>" required>
    <br>

    <label for="end_date">End Date:</label>
    <br>

    <input type="date" id="end_date" name="end_date" value="<?php echo $task['end_date']; ?>" required>
    <br>

    <label for="priority">Priority:</label>
    <br>

    <select id="priority" name="priority" required>
        <option value="1" <?php if ($task['priority'] == 1) echo 'selected'; ?>>Low</option>
        <option value="2" <?php if ($task['priority'] == 2) echo 'selected'; ?>>Medium</option>
        <option value="3" <?php if ($task['priority'] == 3) echo 'selected'; ?>>High</option>
    </select>
    <br>

    <label for="assigned_to">Assigned To:</label>
    <br>

    <select name="assigned_to" id ="assigned_to" required>
    <br>

  <?php
    //include ("../sqlStatment.php");
    $members = SqlStatments::getMembers();
        foreach ($members as $member) {
            echo "<option value='" . $member['id'] . "'>" . $member['name'] . "</option>";
        }
  ?>
    </select>

  <input type = "submit" value = "Update" >

    </form >



 <!--  // /////////////PHP CODE BACK END /////////////////////// -->



 <?php 

if ($_SERVER ['REQUEST_METHOD']=='POST') {

    if (isset($_POST['task_title']) && isset($_POST['start_date']) &&isset($_POST['end_date']) &&isset($_POST['assigned_to'])) {
        $task = new Task() ;
        $task->title = $_POST['task_title'] ;
        $task->startDate = $_POST['start_date'] ;
        $task->endDate = $_POST['end_date'] ;
        $task->priority = $_POST ['priority'] ;
        $task->description = $_POST ['description'] ;
        $task->assignTo = $_POST ['assigned_to'] ;
        include_once ('./../../sqlStatment.php') ;
        SqlStatments :: updateTask ($task);


    }


}

 class Task {
    public $title ; 
    public  $startDate ;
    public $endDate ;
    public  $priority ;
    public  $description  ;
    public  $assignTo ; 
    public  $assignBy;
}





