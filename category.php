
<?php include 'includes/db.php'; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>

    
<div id="alert-cart-message"></div> <!-- ALERTS CONTAINER -->
<section class="container">
      <div class="sidebar-r">
      <?php include "includes/sidebar.php"; ?>
      <?php include "includes/rangefilter.php"; ?>

              
      </div>
      
           

      <div class="fetched-items-container">


        <?php
    if(isset($_GET['category'])){

        $product_category_id_get = $_GET['category'];
    }

        $query = "SELECT * FROM products WHERE product_category_id =$product_category_id_get";
        $select_all_products = mysqli_query($connection, $query);

          while($row = mysqli_fetch_assoc($select_all_products)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_initial_price = $row['product_initial_price'];
            $product_image = $row['product_image'];
            


            ?>
            
              <div class="q_item"><a href="single.php?prod_id=<?php echo $product_id;?>">
                <div class="q-img">
                  <img src="assets/images/<?php echo $product_image; ?>" alt="<?php echo $product_image; ?>" />
                </div>
                <div class="description">
                  <p id="q-title"><?php echo $product_name; ?></p>
                  <p id="item-price">Ksh <?php echo $product_price; ?></p>
                  <p id="discouted-price"><strike>Ksh <?php echo $product_initial_price; ?></strike></p>
                </div></a>

                <form class ='form-submit'> 
                  <input type="hidden" value="<?php echo $product_id;?>" class='p_id'>
                  <input type="hidden" value="<?php echo $product_name;?>" class='p_name'>
                  <input type="hidden" value="<?php echo $product_price;?>" class='p_price'>
                  <input type="hidden" value="<?php echo $product_initial_price;?>" class='p_init_price'>
                  <input type="hidden" value="<?php echo $product_image;?>" class='p_image'>
                  <input type="hidden" value="<?php echo $product_id;?>" class='p_code'>
                  <button name='add-to-cart' id="add-to-bag" data-add-to-cart>Add to Cart</button>
                </form>
                
                
                
                
              </div>


        
           
         <?php  }?>
      </div>
    </section>
    <?php include "includes/footer.php"; ?>
    