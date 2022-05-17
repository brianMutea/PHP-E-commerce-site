<?php include 'includes/db.php' ?>
<div class="sidebar left-sidebar">
          <div class="side-title">
            <i class="fa-solid fa-burger"></i>Categories <span> &#9660;</span>
          </div>
          <ul class="product-to-sort-list">
            <?php 

          $query = "SELECT * FROM product_categories";
          $select_all_categories_sidebar = mysqli_query($connection, $query);
          ?>

          <?php 
          while($row = mysqli_fetch_assoc($select_all_categories_sidebar)) {
            $category_id = $row['category_id'];
            $category_name = $row['category_name'];

            echo "<li class='sort-item'><a href='category.php?category=$category_id'>$category_name</a></li>";
          }

          ?>
           <!-- <li class="sort-item">
              <a href="admin/admin.php"><i class="fas fa-basket-shopping"></i>Admin</a>
            </li> -->
          </ul>
        </div>



        <!-- <li class="sort-item">
              <a href="#"><i class="fas fa-basket-shopping"></i>Supermarket</a>
            </li>
            <li class="sort-item">
              <a href="#"><i class="fa-solid fa-mug-saucer"></i>Cafe/Foods</a>
            </li>
            <li class="sort-item">
              <a href="#"><i class="fa-solid fa-carrot"></i>Grocery</a>
            </li> -->