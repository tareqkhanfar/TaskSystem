<h1> Create New Account </h1>

<?php
?>
   <link rel = "stylesheet" href="CSS/newAccount.css" >

<form action ="<?php echo $_SERVER ["PHP_SELF"] ;?>" method="POST" enctype="multipart/form-data">
<legend>Create New Account</legend>
<hr>

    <label for="member_id">Idintify Number</label>
    <input type="number" name="id" class="required">
    <br>
    
    <label for="Member_name">name</label>
    <input type="text" name="Member_name" class="required">
    <br>

    <label for="nationality">nationality</label>
    <input type="text" name="nationality"  class="required">
    <br>

    <label for="member_address">Address</label>
    <input type="text" name="member_address" class="required">
    <br>

    <label for="email">Email</label>
    <input type="email" name="email" class="required">
    <br>

    <label for="member_phone">Phone</label>
    <input type="tel" name="member_phone" class="required">
    <br>

    <label for="workExp">working experience</label>
    <input type="text" name="workExp" class="required">
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
$Image_size = $_FILES['photo']['size'];
$Image_name = $_FILES['photo']['name'];

$cv_name =  $_FILES['cv']['name'];

move_uploaded_file ($image , 'imageUsers/' . $Image_name) ;

$cv = $_FILES['cv']['tmp_name'];
$cvContent = addslashes(file_get_contents($cv));


move_uploaded_file ($cv , 'CV/' . $cv_name) ;


include 'sqlStatment.php';
SqlStatments:: CreateNewMember(  $id , $name , $nationality,  $address , $email , $phone , $workExp , $qua , $Image_name , $cv_name) ;
}


?>
