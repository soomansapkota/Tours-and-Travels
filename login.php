


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="style1.css" type="text/css">
    <script type="javascrpt/text" src="joinn.js"></script>
    <title>Login Page</title>
</head>
<body>



  <?php
   include 'header.php';
   ?>
    <section>
    
    <div class="image image-camera">
       <img src="travel.jpg"> 

    </div>
     
              <div class="fullscreen">
        <div class="formscreen">
           <div class="welcome">
               <h3>Welcome to <div class="photo"> Let's go travels</div></h3>
           </div>
            
                <form action="login.php" name="myForm" method="post">
              <div class="Group">
                  <label>Email</label>
                  <input type="email" name="Email" class="formerror" autocomplete="off" required>
              </div> 
              <div class="Group">
                  <label>Password</label>
                 <input type="password"  name="psw" class="formerror" maxlength="8" required>
              </div> 
               
              <button type="submit" name="submit" class="login">
                      LOG IN
              </button>
                     
              

        <div class="remember">
            <input type="checkbox" name="remember" id="remember">
                    Remember me
        </div>

        <div class="forget" >
           <a href="sign_up.php"> If you haven't account yet</a> 
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
   
    $email=$_POST['Email'];
    $password=$_POST['psw'];

	$sql=mysqli_query($conn, "SELECT * FROM register WHERE Email='$email'");
	if(mysqli_num_rows($sql)==1)    
	{
        
        while ($row=mysqli_fetch_assoc($sql))
        {
     
            if(password_verify($password, $row['psw'])) {
                $_SESSION['Email']=$email;
                header("location:projects.php");
            } else {
                echo "Incorrec password";
            }
            
		//
        }
		
	} else {
        echo "Sory No User by that mail";
    }
	
// $_SESSION();

}

?>



</body>
</html>