
<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
<?php include "includes/nav.php"; ?>

<div id="alert-cart-message"></div> <!-- ALERTS CONTAINER -->
<main id="single">
    <article class="single-column">
        <?php

        if(isset($_GET['prod_id'])) {

            $prod_id = $_GET['prod_id'];

        }
        $query = "SELECT * FROM products WHERE product_id = $prod_id ";
        $fetch_product = mysqli_query($connection, $query);

          while($row = mysqli_fetch_assoc($fetch_product)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_initial_price = $row['product_initial_price'];
            $product_image = $row['product_image'];
            $product_description = $row['product_description'];


            ?>


        <div class="item-info-container">
            <div class="item-images">
                <img src="assets/images/<?php echo $product_image; ?>" alt="<?php echo $product_name; ?>" id="magnify-img">
                <div id="myModal" class="modal">

                    <!-- The Close Button -->
                    <span class="close">&times;</span>

                    <!-- Modal Content (The Image) -->
                    <img class="modal-content" id="img01">

                    <!-- Modal Caption (Image Text) -->
                    <div id="caption">View Mode</div>
                </div>
            </div>
            <div class="item-info-desc">
                <h3 class="item-title"><?php echo $product_name; ?></h3>
                <p>Ratings: <span>⭐⭐⭐⭐</span></p>
                <p id="item-price"><strong>Ksh <?php echo $product_price; ?></strong></p>
                <p id="discouted-price"><strike>Ksh <?php echo $product_initial_price; ?></strike></p>

                <form class ='form-submit'> 
                  <input type="hidden" value="<?php echo $product_id;?>" class='p_id'>
                  <input type="hidden" value="<?php echo $product_name;?>" class='p_name'>
                  <input type="hidden" value="<?php echo $product_price;?>" class='p_price'>
                  <input type="hidden" value="<?php echo $product_initial_price;?>" class='p_init_price'>
                  <input type="hidden" value="<?php echo $product_image;?>" class='p_image'>
                  <input type="hidden" value="<?php echo $product_id;?>" class='p_code'>
                   <?php 

                    // if(isset($_SESSION['in-cart'])) {
                    //     echo "<button id='single-add-to-bag' disabled>Item In Cart</button>";
                    // }else {
                        echo "<button id='single-add-to-bag' data-add-to-cart>Add to Cart</button>";
                    // }
                  
                  ?>
                </form>
                
                
            </div>
            
        </div>
               
        <section class="product-description-specification">
            <h3 id="desc-title">Product Details</h3>
            <ul>
                <li><?php echo $product_description; ?></li>                
            </ul>
        </section>

        <?php  }?>

       
         
    </article>


    <article class="single-sidebar">
            <h3>Delivery Details</h3> <hr id="hr">
            <ul class="delivery-inf0">
                <li><strong>Door Delivery</strong></li>
                <li>Delivery <strong> KSh 50</strong> within Embu Town</li>
                <li id='o-info'></li>
            </ul>
            <h3>Give Location</h3><hr id="hr">
            <form action="">
            <input type="text" name="location" placeholder="Type Delivery Location..." id="location">
            </form>
            
    </article> 

    
</main>
<div class="responsive_view">
    <?php include 'includes/recentlyviewed.php';?> 
</div>




<script>
    const months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("magnify-img");
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
let date = document.getElementById('date');
let orderTimeInfo = document.getElementById('o-info');

let c_date = new Date().getDate();
let c_year = new Date().getFullYear();
let month = months[new Date().getMonth()];
let hours = new Date().getHours() ;
let mins = new Date().getMinutes();

let f_time = new Date(`${month} ${c_date}, ${c_year} 15:30`);
let now = new Date().getTime();
console.log(now);
let timeleft = f_time - now;

let l_hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

var l_minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
var l_seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

orderTimeInfo.innerHTML = `${now <= f_time ? `Ready for Delivery by <b>${c_date} ${month}</b> when you order within the next <b>${l_hours <= 1 ? '' : l_hours} hrs ${l_minutes} mins</b>.` : `Get it Delivered by <b>${c_date + 1} ${month}</b>`}`;



</script>
 

<?php include "includes/footer.php"; ?>
