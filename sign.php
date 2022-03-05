<?php
if (isset($_POST['SUBMIT']))
{
    include 'dbcon.php';
    $firstname= mysqli_real_escape_string($conn, $_POST['fname']);
    $lastname=mysqli_real_escape_string($conn, $_POST['lname']);
    $email=mysqli_real_escape_string($conn, $_POST['Email']);
    $password=mysqli_real_escape_string($conn, $_POST['psw']);
    $conpassword=mysqli_real_escape_string($conn, $_POST['cpsw']);
    $pass=pasword_hash($password,PASSWORD_BCRYPT);
    $cpass=pasword_hash($conpassword,PASSWORD_BCRYPT);

$emailquery="select * from registration where email='$email'";
$query=mysqli_query($conn,$emailquery);

$emailcount=mysqli_num_rows($query);

if($emailcount>0)
{
    echo"Email already exist";
}
else
{
    if($password===$conpassword)
    {
        $insertquery="insert into registrationa(id, firstname, lastname, email, pswd, cpswd) values('$fname','$lname','$email','$pass','$cpass') ";


        $iquery=mysqli_query($conn,$insertquery);

       if($iquery)
       {
        ?>
        <script>
    alert("Connection is Successfull")
        </script>
        <?php
       
    }else{
        ?>
        <script>
        alert("Inserted faile");
        </script>
        <?php
    }

    }
    else {
        ?>
        <script>
        alert("Password are not matching");
        </script>
        <?php
    }
}


}


?>