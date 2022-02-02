<?php include('parse/menu.php');?>


<!--Main Content Starts-->
<div class="main-content">
<div class="wrapper">
<h1>Manage Category</h1>  


<br /><br />
<?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']); 
        }
        ?>
        <br><br>

<!--bottom to add admin-->
<a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary">Add Category</a>
<br /><br /><br />

<table class="tbl-full">
    <tr>
        <th>Serial Number</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Actions</th>
</tr>

<tr>
    <td>1</td>
    <td>Faustina Assibi</td>
    <td>assibi_luv</td>
    <td>
       <a href="#" class="btn-secondary"> Update Admin</a>
       <a href="#" class="btn-danger">   Delete Admin</a>
    </td>
</tr>

<tr>
    <td>2</td>
    <td>Lydia Teni</td>
    <td>Lydiaten</td>
    <td>
    <a href="#" class="btn-secondary"> Update Admin</a>
       <a href="#" class="btn-danger">   Delete Admin</a>
    </td>
</tr>

<tr>
    <td>3</td>
    <td>Benezema</td>
    <td>gucci</td>
    <td>
        <a href="#" class="btn-secondary"> Update Admin</a>
       <a href="#" class="btn-danger">   Delete Admin</a>    </td>
</tr>
</table>

</div>
</div>
<!--Main Content Ends-->

<?php include('parse/footer.php');?>