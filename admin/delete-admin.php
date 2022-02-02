<?php
include("../config/connect.php");
//get admin ID to be deleted
$id = $_GET['id'];
//sql query
$sql = "DELETE FROM tbl_admin WHERE id=$id";
//query execution
$res = mysqli_query($conn, $sql);
  
if($res==TRUE)
{
 //echo "Admin deleted";

 $_SESSION['delete'] = "<div class='success'>Admin deleted successfully.</div>";

 header('location:' .SITEURL. 'admin/manageAdmin.php');
}
else{
//echo " Admin failed to delete";
$_SESSION['delete'] = "<div class='error'>Admin failed to delete.</div>";
header('location:' .SITEURL. 'admin/manageAdmin.php');
}
?>