<?php 


if(isset($_GET['edit_user'])) {
    $user_id_fetch = $_GET['edit_user'];
  

    $query = "SELECT * FROM users WHERE user_id = $user_id_fetch";
            $select_user = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_user)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $firstname = $row['user_firstname'];
                $lastname = $row['user_lastname'];
                $email = $row['user_email'];
                $profile_pic = $row['user_image'];
                $role = $row['user_role'];

            }     
}

if(isset($_POST['edit_user'])) {

    
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

    if(empty($profile_pic)) {
        $query = "SELECT * FROM users WHERE user_id=' $user_id_fetch' ";
            $select_image = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_image)) {
                $profile_pic = $row['user_image'];
            }
    }

    $query = "UPDATE users SET user_firstname ='{$firstname}', user_lastname ='{$lastname}' , user_role ='{$role}', username ='{$username}' , user_email ='{$email}', user_password = '{$password}' , user_image ='{$profile_pic}' WHERE user_id = {$user_id_fetch} ";


    $update_user = mysqli_query($connection, $query);
    $_SESSION['status'] = "";
    confirmQuery($update_user);

}




?>
<div class="alert-success" id="change-alert"><?php echo $_SESSION['status'] = "User added Successfully!";?></div>
<h1 class="page-header">
        Edit User
    </h1>
<form action="" method="post" enctype="multipart/form-data">    
     

      <!-- <div class="form-group">
            <label for="product_category_id">Product Category Id(Match this with the Categories Id)</label>
            <input type="text" class="form-control" name="product_category_id">
      </div> -->

      <div class="form-group">
         <label for="user_firstname">FirstName</label>
          <input type="text" class="form-control" name="user_firstname" value= "<?php echo $firstname;?>">
      </div>
      <div class="form-group">
         <label for="user_lastname">LastName</label>
          <input type="text" class="form-control" name="user_lastname" value="<?php echo $lastname;?>">
      </div> 

      <div class="form-group">
     
          <select name="user_role" id="user_role">
          <option value='Employee'><?php echo $role;?></option>
          <?php 

          if($role == 'admin') {
              echo "<option value='employee'>Employee</option>";
          }else {
            echo "<option value='admin'>Admin</option>";
          }
          
          
          
          
          ?>
             
            
             
          </select>
          
            
      </div>     


      
      <div class="form-group">
         <label for="user_email">Email</label>
          <input type="email" class="form-control" name="user_email" value="<?php echo $email;?>">
      </div>
      <div class="form-group">
         <label for="username">UserName</label>
          <input type="text" class="form-control" name="username" value="<?php echo $username;?>">
      </div>

      <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" class="form-control" name="user_password" value="<?php echo $user_password;?>">
      </div>

      <div class="form-group">
         <label for="user_image">Profile Picture</label>
         <img width=150 src="../assets/images/<?php echo $profile_pic;?>" alt="<?php echo $profile_pic;?>">
          <input type="file"  name="user_image"value="">
      </div>
    
      <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
      </div>


</form>
    