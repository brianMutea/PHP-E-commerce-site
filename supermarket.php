<?php include 'includes/db.php'; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>

    <section class="container">
      <div class="sidebar-r">
      <?php include "includes/sidebar.php"; ?>
      <?php include "includes/rangefilter.php"; ?>

              
      </div>
      

      <div class="fetched-items-container">
        <?php
        $query = "SELECT * FROM products";
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
          <button id="add-to-bag" data-add-to-cart>Add to Cart</button>
        
        </div>
           
           
         <?php  }?>
      </div>
    </section>
    <?php include "includes/footer.php"; ?>