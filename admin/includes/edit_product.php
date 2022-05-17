
<?php 
if(isset($_GET['p_id'])) {
    $product_id_edit = $_GET['p_id'];

}

$query = "SELECT * FROM products WHERE product_id=' $product_id_edit' ";
$select_product_by_id = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_product_by_id)) {
    $product_id = $row['product_id'];
    $product_category_id = $row['product_category_id'];
    $product_name = $row['product_name'];
    $product_desc = $row['product_description'];
    $product_price = $row['product_price'];
    $product_initial_price = $row['product_initial_price'];
    $product_image = $row['product_image'];
    $product_tags = $row['product_tags'];
    $product_status = $row['product_status'];

}
if(isset($_POST['edit_product'])) {

    $product_category_id = $_POST['product_category'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_initial_price = $_POST['product_initial_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_temp = $_FILES['product_image']['tmp_name'];
    $product_tags = $_POST['product_tags'];
    $product_status = $_POST['product_status'];

    move_uploaded_file($product_image_temp, "../assets/images/$product_image");
//To make sure the image field is not empty on updating.
    if(empty($product_image)) {
        $query = "SELECT * FROM products WHERE product_id=' $product_id_edit' ";
            $select_image = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_image)) {
                $product_image = $row['product_image'];
            }
    }

    $query = "UPDATE products SET product_category_id ='{$product_category_id}', product_name ='{$product_name}' , product_description ='{$product_description}', product_price ='{$product_price}' , product_initial_price ='{$product_initial_price}', product_image = '{$product_image}' , product_tags ='{$product_tags}' , product_status = '{$product_status}' WHERE product_id = {$product_id_edit} ";


    $update_product = mysqli_query($connection, $query);
    $_SESSION['status'] = "";
    confirmQuery($update_product);
    

}
?>
<div class="alert-success" id="change-alert"><?php echo $_SESSION['status'] ="Product Updated Successfully!! ";?></div>
<h1 class="page-header">
            Edit Product
    </h1>

<form action="" method="post" enctype="multipart/form-data">    
     

      
     
      <div class="form-group">
         <label for="name">Product Name</label>
          <input type="text" class="form-control" name="product_name"value="<?php echo $product_name;?>">
      </div>

      <div class="form-group">

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
         <label for="product_description">Product Description/Specs</label>
         <textarea class="form-control "name="product_description" id="" cols="30" rows="10"><?php echo $product_desc;?>
         </textarea>
      </div>

      <div class="form-group">
            <label for="product_price">Product Price (Ksh)</label>
            <input type="number" min='0' class="form-control" name="product_price"value="<?php echo $product_price;?>">
      </div>

      <div class="form-group">
            <label for="product_initial_price">Product Initial Price (Ksh)</label>
            <input type="number" min='0' class="form-control" name="product_initial_price"value="<?php echo $product_initial_price;?>">
      </div>

      <div class="form-group">
         <label for="product_image">Product Image</label>
         <img width=150 src="../assets/images/<?php echo $product_image;?>" alt="<?php echo $product_image;?>">
          <input type="file"  name="product_image"value="">
      </div>

      <div class="form-group">
         <label for="product_tags">Product Tags</label>
          <input type="text" class="form-control" name="product_tags"value="<?php echo $product_tags;?>">
      </div>

      <div class="form-group">
         <label for="product_status">Product Status</label>
         <input type="text" class="form-control" name="product_status"value="<?php echo $product_status;?>">
      </div>

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="edit_product" value="Publish Product">
      </div>


</form>
    