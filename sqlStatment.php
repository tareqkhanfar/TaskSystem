

<?php
    session_start () ;

class SqlStatments {
    public static function CreateNewMember($id, $name, $nationality,  $address, $email, $phone, $workExp, $qua, $imgContent, $cvContent)
{
    include 'dp.php';
    try {
     //   $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Error: Connection not established.");
        }
        $sql = 'INSERT INTO member_details (`id`,
                `name`,
                `nationality`,

                `address`,
                `email`,
                `mobile_number`,
                `qualification`,
                `experience`,
                `photo`,
                `cv`) VALUES (?,?,?,?,?,?,?,?,? ,?)';
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "issssissbb", $id, $name,$nationality ,  $address, $email, $phone, $qua, $workExp, $imgContent, $cvContent);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        $_SESSION['id'] = $id ;
        $_SESSION['name'] = $name ;

        header("Location: e_account.php");

    } catch (mysqli_sql_exception $e) {
        echo $e->getMessage();
    }
}


}
?>
