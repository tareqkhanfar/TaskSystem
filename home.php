<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <style>
header {
    background-color: #4CAF50;
    color: white;
    text-align: center;
    padding: 1em;
}

header h1 {
    margin: 0;
}

nav {
    background-color: #f1f1f1;
    padding: 0.5em;
    text-align: center;
}

nav a {
    color: black;
    text-decoration: none;
    padding: 0.5em 1em;
    display: inline-block;
}

nav a:hover {
    background-color: #555;
    color: white;
}

        </style>
</head>
<body>
    <header>

    <h1> Task Managment System</h1>
    </header>
    <nav> 
        <a href="#">Home </a>
        <a href="./Task/addNewTask.php">Add New Task </a>
        <a href="#">view late tasks </a>
        <a href="#">view pending tasks </a>
        <a href="#">view Active tasks </a>
        <a href="#">view late tasks </a>
    </nav>

    



</body>
</html>

<?php 

session_start() ; 
print ("you id = " . $_SESSION['userID'] . "  and memeber id is : " . $_SESSION ['member_id']);
?>