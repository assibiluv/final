<?php
 //check if user is logged in also known as access control
 if(!isset($_SESSION['user']))
 {
    //user is not logged in 
    //redirect to login page with message
    $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin panel.</div>";
    header('location:' .SITEURL.'admin/login.php');
}
 ?>