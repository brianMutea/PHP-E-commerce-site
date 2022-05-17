<h1 class="page-header">
        All Products
    </h1>
<table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th class="text-center">User Id</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Firstname</th>
                                <th class="text-center">Lastname</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Profile Picture</th>
                                <th class="text-center">Role</th>
                                <!-- <th> Date Created</th> -->
                                <th colspan="4" class="text-center">Operations</th>
                            </tr>
                        </thead>

                        <tbody>
        <?php 
            $query = "SELECT * FROM users";
            $select_users = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $firstname = $row['user_firstname'];
                $lastname = $row['user_lastname'];
                $email = $row['user_email'];
                $profile_pic = $row['user_image'];
                $role = $row['user_role'];
                // $date = $row['creat_date'];
                

                echo "<tr>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$username}</td>";
                echo "<td>{$firstname}</td>";
                echo "<td>{$lastname}</td>";
                echo "<td>{$email}</td>";
                echo "<td><img src='../assets/images/$profile_pic' alt='$username' width=150px heght=150px class='img-responsive'></td>";
                echo "<td>{$role}</td>";
                echo "<td><a href='users.php?change_to_admin={$user_id}'>To Admin</a></td>";
                echo "<td><a href='users.php?change_to_emp={$user_id}'>To Employee</a></td>";
                echo "<td><a href='users.php?delete_user={$user_id}'>Delete</a></td>";
                echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
                echo "</tr>";

            }
                      
                            
                            
        ?>
                        </tbody>
                    </table>
        <?php 

        if(isset($_GET['change_to_admin'])){
            $user_id = $_GET['change_to_admin'];
            $query = "UPDATE users SET user_role ='admin' WHERE user_id = {$user_id} ";


    $update_user_role_to_admin = mysqli_query($connection, $query);
    $_SESSION['status'] = "";
    confirmQuery($update_user_role_to_admin);
    header("Location: users.php");
        }

        if(isset($_GET['change_to_emp'])){
            $user_id = $_GET['change_to_emp'];
            $query = "UPDATE users SET user_role ='employee' WHERE user_id = {$user_id} ";


    $update_user_role_to_emp = mysqli_query($connection, $query);
    $_SESSION['status'] = "";
    confirmQuery($update_user_role_to_emp);
    header("Location: users.php");
        }

        ?>
        <?php 
        if(isset($_GET['delete_user'])) {
            $user_id = $_GET['delete_user'];
            $query = "DELETE FROM users WHERE user_id = {$user_id}";
            $delete_user_query = mysqli_query($connection, $query);
           
            header("Location: users.php");
        }
        
        
        ?>