<h1> Create New Account </h1>

<?php
?>
<form action ="<?php echo $_SERVER ["PHP_SELF"] ;?>" method="POST" enctype="multipart/form-data">
<legend>Create New Account</legend>
<hr>

    <label for="member_id">Idintify Number</label>
    <input type="number" name="id">
    <br>
    
    <label for="Member_name">name</label>
    <input type="text" name="Member_name">
    <br>

    <label for="nationality">nationality</label>
    <input type="text" name="nationality">
    <br>

    <label for="member_address">Address</label>
    <input type="text" name="member_address">
    <br>

    <label for="email">Email</label>
    <input type="email" name="email">
    <br>

    <label for="member_phone">Phone</label>
    <input type="tel" name="member_phone">
    <br>

    <label for="workExp">working experience</label>
    <input type="text" name="workExp">
    <br>

    <label for="qualification">qualification</label>

    <label for="education">education</label>
    <input type="radio" name="qualification" id="education">

    <label for="training">training</label>
    <input type="radio" name="qualification" id="training">
    <br>

    <label for="photo">Photo</label>
    <input type="file" name ="photo">
    <br>

    <label for="pcvoto">CV</label>
    <input type="file" name ="cv">
    <br>

    

    <input type="submit">
     



    
</form>


<?php

if ($_SERVER['REQUEST_METHOD']=='POST'){
$id = @$_POST ['id'] ;
$name = @$_POST ['Member_name'] ;
$address = @$_POST ['member_address'] ;
$email = @$_POST ['email'] ;
$phone = @$_POST ['member_phone'] ;
$workExp = @$_POST ['workExp'] ;
$qua = @$_POST ['qualification'] ;
$nationality = @$_POST['nationality'] ;

$image = $_FILES['photo']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));

$cv = $_FILES['cv']['tmp_name'];
$cvContent = addslashes(file_get_contents($cv));

include 'sqlStatment.php';
SqlStatments:: CreateNewMember(  $id , $name , $nationality,  $address , $email , $phone , $workExp , $qua , $imgContent , $cvContent) ;
}


?>
