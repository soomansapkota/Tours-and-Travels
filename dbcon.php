<?php

$server="localhost";
$user="root";
$password="";
$db="signup"
$conn=mysqli_connect($server,$user,$password,$db);

if($conn)
{
    ?>
    <script>
alert("Connection is Successfull")
    </script>
    <?php
}else{
    ?>
    <script>
    alert("Connection is failed");
    </script>
    <?php
}
}
?>