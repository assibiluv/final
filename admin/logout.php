<?php
//include connection
include('../config/connect.php');
//destroy session
session_destroy();//unset $_SESION['user'];
//direct to login page 
header('location:' .SITEURL.'admin/login.php');
?>