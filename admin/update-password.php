<?php include('parse/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
        }
        ?>

        <form action="" method="POST">
             <table class="tbl-30">
                 <tr>
                     <td>Current Password:</td>
                     <td>
                         <input type="password" name="current_password" placeholder="Old Password">
                     </td>
                 </tr>

                 <tr>
                     <td>New Password:</td>
                     <td>
                         <input type="password" name="new_password" placeholder="New Password">
                     </td>
                 </tr>

                 <tr>
                     <td>Confirm Password:</td>
                     <td>
                         <input type="password" name="confirm_password" placeholder="Confirm Password">
                     </td>
                 </tr>

                 <tr>
              <td colspan="2">
                  <input type="hidden" name="id" value="<?php echo $id;?>">
            <input type="submit" name="submit" value="change password" class="btn-secondary">
               </td>
           </tr>
             </table>
        </form>
    </div>
</div>

 <?php
 //check if submit button is active
 if(isset($_POST['submit']))
 {
     //1. get data from form
     $id = $_POST['id'];
     $current_password = md5($_POST['current_password']);
     $new_password =md5($_POST['new_password']);
     $confirm_password = md5($_POST['confirm_password']);
     //2. check if current ID and current Password exist
     $sql = "SELECT * FROM tbl_admin WHERE id=$id AND PASSWORD ='$current_password'";
     //query execution
     $res = mysqli_query($conn,$sql);

     if($res==TRUE)
     {
         $count = mysqli_num_rows($res);

         if($count==1)
         {
            // echo "User found";
             if($new_password==$confirm_password)
             {
                   $sql2 = "UPDATE tbl_admin SET
                   password = '$new_password'
                   WHERE id = $id
                   ";

                   $res2 = mysqli_query($conn,$sql2);

                   if($res2==TRUE)
                   {
                    $_SESSION['change-password'] = "<div class='success'>Password changed successfully.</div>";
                    header('location:' .SITEURL. 'admin/manageAdmin.php');
                   }
                   else
                   {
                    $_SESSION['change-password'] = "<div class='error'Password not changed.</div>";
                    header('location:' .SITEURL. 'admin/manageAdmin.php');
                   }
             }
             else
             {
                $_SESSION['password-not-matched'] = "<div class='error'>password not matching.</div>";
                header('location:' .SITEURL. 'admin/manageAdmin.php'); 
             }
         }
         else{
            $_SESSION['user-not-found'] = "<div class='error'>User not found.</div>";
            header('location:' .SITEURL. 'admin/manageAdmin.php');
         }
     }

     //3. check if password and confirm password match

     //4. change password if all conditions is satisfied

 }
 ?>

<?php include('parse/footer.php'); ?>