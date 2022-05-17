<form action="" method="post">
                                <div class="form-group">
                                    <label for="category_name">Update Category</label>
                                    

                <?php 

                if(isset($_GET['edit'])) {
                    $fetched_category_id = $_GET['edit'];
                    
               
                    $query = "SELECT * FROM product_categories WHERE category_id = $fetched_category_id";
                    $select_all_categories_edit = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_all_categories_edit)) {
                        $category_id = $row['category_id'];
                        $category_name = $row['category_name'];

                        ?>

                    <input value="<?php if(isset($category_name)){echo $category_name;}?>" class="form-control" type="text" name="category_name">
                                        
                    <?php } } ?>    
                    
                    <?php 
                    
                    // ////UPDATE QUERY

                    if(isset($_POST['update_category'])) {
                        $fetched_category_name = $_POST['category_name'];
        
                        $query = "UPDATE product_categories SET category_name = '{$fetched_category_name}' WHERE category_id = {$fetched_category_id}";
                        $update_query = mysqli_query($connection, $query);
                        $_POST['category_name'] = "";
                        if(!$update_query) {
                            die('Some Error:' . mysqli_error($connection));
                        }
                        
                    }
                    
                    
                    ?>
                                                               
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" Value="Update Category">
                                </div>
                            </form>
                            