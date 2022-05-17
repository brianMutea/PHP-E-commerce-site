<?php 
if(isset($_POST['create_product'])) {

    $product_category_id = $_POST['product_category'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_initial_price = $_POST['product_initial_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_temp = $_FILES['product_image']['tmp_name'];
    $product_tags = $_POST['product_tags'];
    $product_status = $_POST['product_status'];
    


    // function for the Image
    move_uploaded_file($product_image_temp, "../assets/images/$product_image"); //Moves the Image from a temporary location to a parmanent location.

    $query = "INSERT INTO products(product_category_id, product_name, product_description, product_price, product_initial_price, product_image, product_tags, product_status) ";
    $query .= "VALUES ($product_category_id, '$product_name', '$product_description', $product_price, $product_initial_price, '$product_image', '$product_tags', '$product_status')";

    $create_products_query = mysqli_query($connection, $query);
    $_SESSION['status'] ="";

    confirmQuery($create_products_query);

}




?>
<div class="alert-success" id="change-alert"><?php echo $_SESSION['status'] = "Product added Successfully!";?></div>
<h1 class="page-header">
           Add Products
    </h1>
<form action="" method="post" enctype="multipart/form-data">    
     

      <!-- <div class="form-group">
            <label for="product_category_id">Product Category Id(Match this with the Categories Id)</label>
            <input type="text" class="form-control" name="product_category_id">
      </div> -->
      <div class="form-group">
      <label for="product_category_id">Product Category/Id</label>
          <select name="product_category" id="product_category">
              <?php 
              
              $query = "SELECT * FROM product_categories";
                    $select_all_categories_edit = mysqli_query($connection, $query);
                    confirmQuery($select_all_categories_edit);
                    while($row = mysqli_fetch_assoc($select_all_categories_edit)) {
                        $category_id = $row['category_id'];
                        $category_name = $row['category_name'];

                        echo "<option value='{$category_id}'>{$category_name}</option>";
                        
                    }
              ?>
          </select>
          
            
      </div>     


      <div class="form-group">
         <label for="name">Product Name</label>
          <input type="text" class="form-control" name="product_name">
      </div>

      <div class="form-group">
         <label for="product_description">Product Description/Specs</label>
         <textarea class="form-control "name="product_description" id="" cols="30" rows="10">
         </textarea>
      </div>

      <div class="form-group">
            <label for="product_price">Product Price (Ksh)</label>
            <input type="number" min='0' class="form-control" name="product_price">
      </div>

      <div class="form-group">
            <label for="product_initial_price">Product Initial Price (Ksh)</label>
            <input type="number" min='0' class="form-control" name="product_initial_price">
      </div>

      <div class="form-group">
         <label for="product_image">Product Image</label>
          <input type="file"  name="product_image">
      </div>

      <div class="form-group">
         <label for="product_tags">Product Tags</label>
          <input type="text" class="form-control" name="product_tags">
      </div>

      <div class="form-group">
         <label for="product_status">Product Status</label>
         <input type="text" class="form-control" name="product_status">
      </div>

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="create_product" value="Publish Product">
      </div>


</form>
    