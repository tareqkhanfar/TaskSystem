
<h1> Set Your ID ,userName and Password </h1>

<?php 
session_start () ;

     echo ('<h3>Hello , </h3>' .  $_SESSION['name'] . "How Are you ?");

?>

<form  action = '<?php echo ($_SERVER['PHP_SELF']) ?>' method = 'POST'> 
<?php 

include 'dp.php';
$sql = "select max(id) as id from e_accounts;";
$result = $conn->query($sql);

if ($result->num_rows >  0 ) {
    $row = $result->fetch_assoc() ;
    $Generated_six_digit = $row['id'] ;
    $Generated_six_digit += 1 ;
    echo ("<label for ='userID' > User ID : "."$Generated_six_digit"."</label > ") ;
}

?>

<input type="hidden" name="userID" value="<?php echo $Generated_six_digit; ?>">
<input type="hidden" name="member_id" value="<?php echo $_SESSION['id']; ?>">

<?php echo $_SESSION['id'];?>

<label for ="username"> User Name : </label> 
<input type = "text" name = "username">


<label for ="password"> Password : </label> 
<input type = "password" name ="password">


<label for ="confirmPassword">Confirm Password : </label> 
<input type = "password" name = "confirmPassword">

<input type = "submit" >
</form>

<?php 

include 'dp.php';

if ( $_SERVER['REQUEST_METHOD']=='POST' &&  isset($_POST['username']) && isset ($_POST ['password']) && isset($_POST ['confirmPassword'])) {
     $userID = $_POST['userID'] ;
     $member_id = $_POST ['member_id'] ;
     $username = $_POST['username'] ;
     $password = $_POST['password'] ;
     $confirmPassword = $_POST['confirmPassword'] ;


     if ($password == $confirmPassword) {
        $sql = "insert into e_accounts (id , member_id , username , password) values ($userID , $member_id,  $username , $password)" ;
        if ($conn ->query ($sql)==TRUE) {
          echo "successfuly added user" ;
          header("Location: index.php");

        }
        else {
          print "<script>alert('Your message here');</script>";

          echo "error accured" . $conn->error ;
        }
     }
     else {
          print "<script>alert('Your message here');</script>";

     }

}

?>

