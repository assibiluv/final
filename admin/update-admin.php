<?php include('parse/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
<br /><br />

<?php
//Getting id from GET method.
  $id = $_GET['id'];

  //SQL query
  $sql = "SELECT * FROM tbl_admin";

  //query execution
  $res = mysqli_query($conn, $sql);

  //condition to check if query has been executed
  if ($res==TRUE)
  {
//check if data is available or not
      $count = mysqli_num_rows($res);
//to check if there is admin data in the database
      if($count==1)
      {
        //echo "admin Available";
        $row = mysqli_fetch_assoc($res);

        $full_name = $row['full_name'];
        $username = $row['username'];
    }
      else
      {
        header('location:'.SETURL.'admin/manageAdmin.php');
      }
  }
?>

        <form action=" " method="POST">
         
        <table class="tbl-30">
            <tr>
              <td>Full Name:</td>
              <td>
                  <input type="text" name="full_name" value="<?php echo $full_name; ?>">
              </td>
           </tr>

           <tr>
              <td>Username:</td>
              <td>
                  <input type="text" name="username" value="<?php echo $username; ?>">
              </td>
           </tr>

           <tr>
              <td colspan="2">
                  <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="submit" value="update Admin" class="btn-secondary">
              </td>
           </tr>
        </table>
     </form>
    </div>
</div>

<?php
//to check if button has been submitted
 if(isset($_POST['submit']))
 {
     //echo "Button Clicked";
     $id = $_POST['id'];
     $full_name = $_POST['full_name'];
     $username = $_POST['username'];

     //sql query to update admin

    $sql = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$username'
    WHERE id = '$id'
    ";
    $res = mysqli_query($conn,$sql);

    if($res==TRUE)
    {
        $_SESSION['update'] = "<div class='success'>Admin updated successfully.</div>";
        header('location:'.SITEURL.'admin/manageAdmin.php');

    }
    else{
        $_SESSION['update'] = "<div class='error'>Admin not updated.</div>";
        header('location:'.SITEURL.'admin/manageAdmin.php');
    }
 }
?>

<?php include('parse/footer.php'); ?>