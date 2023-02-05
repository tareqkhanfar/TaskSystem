<?php include './../../header.php';?>
<link rel = "stylesheet" href="style.css" >

<form action = "viewTask.php" method="POST"> 
<legand> Update The Status</legand>

<select name="status" >

<option value = "Late" > Late </option>
<option value = "Pending" > Pending </option>
<option value = "Active" > Active </option>
<option value = "Finished" > Finished </option>
</select>

<input type = "hidden" name = "title" value="<?php echo ($_GET['taskDaily']) ;?>" />

<input type = "submit" value="Change" >
</form>

<?php 


$data = SqlStatments:: getTaskByTitle($_GET['taskDaily']) ;
         ?>


            <div class="task-details">
            <h1><?php echo $data['title']; ?></h1>
            <p><?php echo $data['description']; ?></p>
            <p>Start Date: <?php echo $data['start_date']; ?></p>
            <p>End Date: <?php echo $data['end_date']; ?></p>
            <p>Priority: <?php echo $data['priority']; ?></p>
            <p>Status: <?php echo $data['status']; ?></p>
            <p>Assigned Recipient: <?php echo $data['assignedReciver']; ?></p>
            <p>Assigned Sender: <?php echo $data['assignedSender']; ?></p>
            <img src="<?php echo $data['photoReciver']; ?>" alt="Recipient photo">
            <img src="<?php echo $data['photoSender']; ?>" alt="Sender photo">
          </div>
          
    
    


          <?php 
          
          if ($_SERVER['REQUEST_METHOD']=='POST' &&  isset ($_POST['title'])) {
            SqlStatments:: updateTheStatusByID ($_POST['title'] , $_POST['status']) ;
          }
          ?> 