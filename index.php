<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Managment System</title>
</head>
<body>
    

    <section  class="login">

        <form action="index.php" method="post">
           <legend>Login</legend>

            <div class="container">
              <label for="uname"><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="uname" required>
        <br>
              <label for="psw"><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="psw" required>
              <br>

              <button type="submit">Login</button>
              <a href="./newAccount.php"> Create New Account</a>
            </div>
          
          </form>
    </section>
</body>
</html>


<?php 
include 'dp.php';
session_start() ;
if ($_SERVER['REQUEST_METHOD']=='POST') {
  if (isset ($_POST['uname']) && isset ($_POST['psw'])) {
         $username = @$_POST['uname'] ;
         $password = @$_POST['psw'] ;
         try {

         
          $sql = "select id , member_id from e_accounts where username = $username && password = $password" ;
          $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          echo ("ok");

          $row = $result->fetch_assoc() ;
          $_SESSION ['userID'] = $row['id'];
          $_SESSION ['member_id'] = $row ['member_id'] ;
          header("Location: home.php");

        }
        else {
          die ("alert error user name or password 1") ;
        }
      }
      catch (mysqli_sql_exception ) {
            die ("alert error user name or password 2") ;
      }
         
      
         
  }
}

?>