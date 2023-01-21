<?php 

if ($_SERVER ['REQUEST_METHOD']=='POST') {

    if (isset($_POST['task-title']) && isset($_POST['start-date']) &&isset($_POST['due-date']) &&isset($_POST['assigned_to'])) {
        $task = new Task() ;
        $task->title = $_POST ['task-title'] ;
        $task->startDate = $_POST['start-date'] ;






        $task->endDate = $_POST['due-date'] ;

 




        $task->priority = $_POST ['priority'] ;
        $task->description = $_POST ['task-description'] ;
        $task->assignTo = $_POST ['assigned_to'] ;
        $task->assignBy = $_POST ['assigned_by'] ;

        include ('../sqlStatment.php') ;

        SqlStatments :: insertNewTask ($task);


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

?>