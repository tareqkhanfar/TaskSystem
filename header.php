
   <link rel = "stylesheet" href="http://localhost/Project/CSS/home.css" >

<header>
    
    <div id="name">
      <h1>Task Managment System</h1>
    </div>
    <div id="header-links">
      <a href="http://localhost/Project/about-us.php">About Us</a>
      <a href="http://localhost/Project/contact-us.php">Contact Us</a>
      <a href="http://localhost/Project/MainFunction/logout.php">Log Out</a>
    </div>
    <nav> 
    <?php include_once 'sqlStatment.php';?>

    <a href="http://localhost/Project/home.php">Home </a>
    <a href="http://localhost/Project/Search/search.php">Search </a>
    <a href="http://localhost/Project/Task/update/update_task.php">View submitted tasks </a>
    <a href="http://localhost/Project/Task/addNewTask.php">Add New Task </a>
    <a href="http://localhost/Project/Task/ViewLateTask/viewLateTask.php"> late tasks <span class="badge"> <?php echo SqlStatments::countLateTasks(); ?> </span> </a>
    <a href="http://localhost/Project/Task/ViewPendingTask/viewPendingTask.php"> pending tasks <span class="badge"> <?php echo SqlStatments::countPendingTasks(); ?> </span> </a>
    <a href="http://localhost/Project/Task/ViewActiveTask/viewActiveTask.php"> Active tasks <span class="badge"> <?php echo SqlStatments::countActiveTasks(); ?> </span> </a>
    <a href="http://localhost/Project/Task/ViewFinishedTask/viewFinishedTask.php"> Finished tasks <span class="badge"> <?php echo SqlStatments::countFinishedTasks(); ?> </span> </a>
</nav>

    </nav>

    </header>

    



