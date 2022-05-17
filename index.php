<?php include 'includes/db.php'?>
<?php include "includes/header.php"; ?>
<?php include "includes/nav.php"; ?>
<?php include "admin/functions.php";?>


<div id="alert-cart-message"></div> <!-- ALERTS CONTAINER -->
<?php 
           if(isset($_POST['add-to-cart']))  {
            echo "hey";
        }?>
    
    <!-- HERO-LIKE SECTION -->
    <main>
      <section class="products-sort-other advert-sect">
        <?php include "includes/sidebar.php"; ?>
        <?php include "includes/slider.php"; ?>

        <!-- <div class="right-side-bar"></div> -->
      </section>

      <!-- ///FIRST CATEGORY DISPLAY//// -->
      <section class="populate-orders-container">
      <?php 

$query = "SELECT * FROM product_categories WHERE category_name = 'supermarket'";
$select_all_categories_sidebar = mysqli_query($connection, $query);
?>

<?php 
while($row = mysqli_fetch_assoc($select_all_categories_sidebar)) {
  $category_id = $row['category_id'];
  $category_name = $row['category_name'];
  echo "<h3 id='featured-title'>
          <p>$category_name</p>
          <a href='category.php?category=$category_id'><button id='view-all-btn'>VIEW ALL FROM CATEGORY ></button></a>
        </h3>";
}

?>
        <div class="featured-items"> 
          
          <?php populateProducts($category_id);?>         
        </div>
      </section>

       <!-- /// END FIRST CATEGORY DISPLAY//// -->

      <section class="populate-orders-container">
      <?php 

$query = "SELECT * FROM product_categories WHERE category_name = 'cafe and foods'";
$select_all_categories_sidebar = mysqli_query($connection, $query);
?>

<?php 
while($row = mysqli_fetch_assoc($select_all_categories_sidebar)) {
  $category_id = $row['category_id'];
  $category_name = $row['category_name'];
  echo "<h3 id='featured-title'>
          <p>$category_name</p>
          <a href='category.php?category=$category_id'><button id='view-all-btn'>VIEW ALL FROM CATEGORY ></button></a>
        </h3>";
}

?>
        <div class="featured-items"> 
          <?php populateProducts($category_id);?>         
        </div>
      </section>

      <section class="populate-orders-container">

      <?php 

$query = "SELECT * FROM product_categories WHERE category_name = 'grocery'";
$select_all_categories_sidebar = mysqli_query($connection, $query);
?>

<?php 
while($row = mysqli_fetch_assoc($select_all_categories_sidebar)) {
  $category_id = $row['category_id'];
  $category_name = $row['category_name'];
  echo "<h3 id='featured-title'>
          <p>$category_name</p>
          <a href='category.php?category=$category_id'><button id='view-all-btn'>VIEW ALL FROM CATEGORY ></button></a>
        </h3>";
}

?>
        <div class="featured-items"> 
          <?php populateProducts($category_id);?>         
        </div>

      </section>

      <?php include 'includes/recentlyviewed.php';?>
    </main>
    <?php include "includes/footer.php"; ?>