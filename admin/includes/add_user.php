<?php 
if(isset($_POST['create_user'])) {

    
    $firstname = $_POST['user_firstname'];
    $lastname = $_POST['user_lastname'];
    $role = $_POST['user_role'];
    $username = $_POST['username'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $profile_pic = $_FILES['user_image']['name'];
    $profile_pic_temp = $_FILES['user_image']['tmp_name'];
    
    


    // function for the Image
    move_uploaded_file($profile_pic_temp, "../assets/images/$profile_pic"); //Moves the Image from a temporary location to a parmanent location.

    $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_image, user_role) ";
    $query .= "VALUES ('$username', '$password', '$firstname', '$lastname', '$email', '$profile_pic', '$role')";

    $create_user_query = mysqli_query($connection, $query);
    $_SESSION['status'] ="";

    confirmQuery($create_user_query);

}




?>
<div class="alert-success" id="change-alert"><?php echo $_SESSION['status'] = "User added Successfully!";?></div>
<h1 class="page-header">
           Add User
    </h1>
<form action="" method="post" enctype="multipart/form-data">    
     

      <!-- <div class="form-group">
            <label for="product_category_id">Product Category Id(Match this with the Categories Id)</label>
            <input type="text" class="form-control" name="product_category_id">
      </div> -->

      <div class="form-group">
         <label for="user_firstname">FirstName</label>
          <input type="text" class="form-control" name="user_firstname">
      </div>
      <div class="form-group">
         <label for="user_lastname">LastName</label>
          <input type="text" class="form-control" name="user_lastname">
      </div> 

      <div class="form-group">
      
          <select name="user_role" id="user_role">
            <option value="Employee">Select Role</option>
             <option value="admin">Admin</option>
             <option value="employee">Employee</option>
          </select>
          
            
      </div>     


      
      <div class="form-group">
         <label for="user_email">Email</label>
          <input type="email" class="form-control" name="user_email">
      </div>
      <div class="form-group">
         <label for="username">UserName</label>
          <input type="text" class="form-control" name="username">
      </div>

      <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" class="form-control" name="user_password">
      </div>

      <div class="form-group">
         <label for="user_image">Profile Picture</label>
          <input type="file"  name="user_image">
      </div>
<!-- 
      <div class="form-group">
         <label for="product_image">Product Image</label>
          <input type="file"  name="product_image">
      </div> -->

      <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_user" value="Create User">
      </div>


</form>
    