<?php include('parse/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']); 
        }
        ?>
        <br><br>
        <!--add form category starts-->
           <form action=" " method="POST">
               <table class=tbl-30>
                   <tr>
                       <td>Title:</td>
                       <td>
                           <input type="text" name="title" placeholder="Category Title">
                       </td>
                   </tr>
                   <tr>
                       <td>Featured:</td>
                       <td>
                           <input type="radio" name="featured" value="Yes">Yes
                           <input type="radio" name="featured" value="No">No
                       </td>
                   </tr>
                   <tr>
                       <td>Active:</td>
                       <td>
                           <input type="radio" name="active" value="Yes">Yes
                           <input type="radio" name="active" value="No">No
                       </td>
                   </tr>
                   <tr>
                   <td colspan="2">
                       <input type="submit" name="submit" value="add-category" class="btn-secondary">
                   </td>
               </tr>
               </table>
         </form>
        <!--add form category ends-->

        <?php 
         //check if button is clicked or not
         if(isset($_POST['submit']))
         {
            // echo "clicked";
            //get value from category form
            $title = $_POST['title'];

            //for radio button
            if(isset($_POST['featured']))
            {
                $featured = $_POST['featured'];
            }
            else
            {
                $featured = "No";
            }
            if(isset($_POST['active']))
            {
                $active = $_POST['active'];
            }
            else
            {
                $active = "No";
            }
            //sql query
            $sql = "INSERT INTO tbl_category SET
               title='$title',
               featured='$featured',
               active='$active'
            ";
            $res = mysqli_query($conn, $sql);
            //check if query is executed and added or not
             if($res==TRUE)
             {
                $_SESSION['add'] = "<div class='success'>Category added successfully.</div>";
                header('location:'.SITEURL.'admin/manage-category.php');
             }
             else
             {
                $_SESSION['add'] = "<div class='error'>Category not added.</div>";
                header('location:'.SITEURL.'admin/add-category.php');
             }
         }
        ?>
   </div>
</div>
       
<?php include('parse/footer.php');?>