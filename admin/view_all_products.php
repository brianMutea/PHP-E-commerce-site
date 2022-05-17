<h1 class="page-header">
        All Products
    </h1>
<table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>Product Id</th>
                                <th>Product Category</th>
                                <th>Product Name</th>
                                <th>Product Description</th>
                                <th>Product Price</th>
                                <th>Product Initial price</th>
                                <th>Product Image</th>
                                <th>Product Tags</th>
                                <th>Product Status</th>
                                <th colspan="2">Operations</th>
                            </tr>
                        </thead>

                        <tbody>
        <?php 
            $query = "SELECT * FROM products";
            $select_products = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_products)) {
                $product_id = $row['product_id'];
                $product_category_id = $row['product_category_id'];
                $product_name = $row['product_name'];
                $product_desc = $row['product_description'];
                $product_price = $row['product_price'];
                $product_initial_price = $row['product_initial_price'];
                $product_image = $row['product_image'];
                $product_tags = $row['product_tags'];
                $product_status = $row['product_status'];

                echo "<tr>";
                echo "<td>{$product_id}</td>";
                // ///relating the Category id of products to the Product/
                 // ///relating the Category id of products to the Product/
                 $query = "SELECT * FROM product_categories WHERE category_id = $product_category_id";
                 $select_all_categories_id = mysqli_query($connection, $query);
                 while($row = mysqli_fetch_assoc($select_all_categories_id)) {
                     $category_id = $row['category_id'];
                     $category_name = $row['category_name'];

               echo "<td>{$category_name}</td>";
                 }
                // echo "<td>ddddd{$product_category_id}</td>";


                echo "<td class='align-middle'>{$product_name}</td>";
                echo "<td>{$product_desc}</td>";
                echo "<td>{$product_price}</td>";
                echo "<td>{$product_initial_price}</td>";
                echo "<td><img src='../assets/images/$product_image' alt='$product_image' width='150px' class='img-responsive'></td>";
                echo "<td>{$product_tags}</td>";
                echo "<td>{$product_status}</td>";
                
                echo "<td><a href='products.php?delete_product={$product_id}'>Delete</a></td>";
                echo "<td><a href='products.php?source=edit_product&p_id={$product_id}'>Edit</a></td>";
                echo "</tr>";
            }              
                            
                            
        ?>
                        </tbody>
                    </table>


        <?php 
        if(isset($_GET['delete_product'])) {
            $product_id = $_GET['delete_product'];
            $query = "DELETE FROM products WHERE product_id = {$product_id}";
            $delete_prod_query = mysqli_query($connection, $query);
           
            header("Location: products.php");
        }
        
        
        ?>