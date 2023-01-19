<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Managment System</title>
</head>
<body>
    

    <section  class="login">

        <form action="/login.php" method="post">
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