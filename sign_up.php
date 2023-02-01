<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="style2.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="javascrpt/text" src="joinn.js"></script>
    <title>Login Page</title>
</head>
<body>
    <section> 
  
    <div class="image image-camera">
        <img src="travel.jpg">  

    </div>
     
              <div class="fullscreen">
        <div class="formscreen">
           <div class="welcome">
               <h3>Welcome to <div class="photo"> Let's go travels</div></h3>
           </div>
            
                <form action="sign_up.php" name="myForm" method="post">
              <div class="Group">
                  <label>First Name</label>
                  <input type="text" name="fname" class="formerror" autocomplete="off" required>
              </div> 
              <div class="Group">
                <label>Last Name</label>
                <input type="text" name="lname" class="formerror" autocomplete="off" required>
            </div> 
              <div class="Group">
                <label>Email</label>
                <input type="email" name="Email" class="formerror" autocomplete="off" required>
            </div> 

              <div class="Group">
                  <label>Password</label>
                  
                 <input type="password" id="psw" name="psw" class="formerror" maxlength="8" required>
              </div> 
              <div class="Group">
                <label>Confirm Password</label>
               <input type="password" id="cpsw" name="cpsw" class="formerror" maxlength="8" required>
            </div> 
               
              <button type="submit" name="submit" class="submit">
                      SIGN UP
              </button>
              <div class="already" >
           <a href="login.php"> If you already have an account</a> 
        </div>

        
              </div>
            
        </div>
    </div>
        
        
</form>
</section>
<?php
  require_once('./dbcon.php');
  session_start();


if (isset($_POST['submit']))
{
    
    $firstname= mysqli_real_escape_string($conn, $_POST['fname']);
    $lastname=mysqli_real_escape_string($conn, $_POST['lname']);
    $email=mysqli_real_escape_string($conn, $_POST['Email']);
    $password=mysqli_real_escape_string($conn, $_POST['psw']);
    $conpassword=mysqli_real_escape_string($conn, $_POST['cpsw']);



$emailquery="SELECT * FROM register where Email='$email'";
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
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $conhash=password_hash($conpassword, PASSWORD_DEFAULT);
        $insertquery="INSERT INTO register (fname, lname, Email, psw, cpsw) values('$firstname','$lastname','$email','$hash','$conhash') ";

        $iquery=mysqli_query($conn,$insertquery);

       if($iquery)
        {
     
            header('location:login.php');   
        }
         else
        {
            die(mysqli_error($conn));
        }

    }
    else {
        echo"Password doesnot matched";
    }
}
}
// $_SESSION();


?>              
</body>
</html>