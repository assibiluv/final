<?php include('../config/connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href=" ../css/admin.css">
</head>
<body>
   <div class="login">
       <h1 class="text-center hip">Login</h1>
       <br><br>

       <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-message']))
              {
                  echo $_SESSION['no-login-message'];
                  unset($_SESSION['no-login-message']);
              }
 ?>
       <br><br>

       <!--login form-->
         <form action="" method="POST">
             <div class="form-control">
            <label>Username:</label>
            <input type="text" name="username" placeholder="Enter username">
            </div>
            <div class="form-control">
            <label>Password:</label>
            <input type="password" name="password" placeholder="password">
            </div>
            <br>
            <div class="form-control">
            <input type="submit" name="submit" value="login" class="btn-primary">
            </div>
         </form>
         <br><br>
       <!--ending--> 
       <p class="text-center">Created By - <a href="">Assibi_luv</a></p>
   </div>  
</body>
</html>
<?php
  //check whether submit button is active
  if(isset($_POST['submit']))
  {
      //process for login
      //get data
      $username = $_POST['username'];
      $password = md5($_POST['password']);

      //query check if username and password exist
      $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
       
      //execute query
      $res=mysqli_query($conn, $sql);

      //count rows to check whether the user exist or not
      $count = mysqli_num_rows($res);
      if($count==1)
      {
         //user available and login successful
         $_SESSION['login']="<div class='success'>Login successful</div>";
         $_SESSION['user']=$username;//to check if user is logged in or not and logout will unset it
         
         header('location:'.SITEURL.'admin/');
        }
      else
      {
          //user not available
          $_SESSION['login']="<div class='error text-center'>Login not successful</div>";
          header('location:'.SITEURL.'admin/login.php');
      }
  }
?>