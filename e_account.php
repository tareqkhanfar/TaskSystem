
<h1> Set Your ID ,userName and Password </h1>

<?php 
session_start () ;

     echo ('<h3>Hello , </h3>' .  $_SESSION['name'] . "How Are you ?");

?>

<form  action = '<?php echo ($_SERVER['PHP_SELF']) ?>' method = 'POST'> 
<?php 

include 'dp.php';
$sql = "SELECT max ";
$result = $conn->query($sql);
$users = 1234567; 
echo ("<label for ='userID' > USer ID : "."$users"."</label > ") ;

?>


</form>

