
<?php include "includes/db.php";?>
<?php include 'includes/header.php'?>
<?php include 'includes/nav.php'?>


<div id="alert-cart-message"></div> <!-- ALERTS CONTAINER -->

<section class="cart_section"> 
    
    <div id="cart_container">
        
                
        <?php 

        $query = "SELECT * FROM cart";
        $select_cart_items = mysqli_query($connection, $query);
        $rowcount = mysqli_num_rows($select_cart_items);
        $subtotal = 0;

       
         // CART COUNT ITEMS
         echo "<div>
         <h3 id='cart_count'>Cart Count <span id='c_cnt'>($rowcount Item/s)</span></h3>
                 
         </div>";
         // CART COUNT ITEMS
         

        if($rowcount <=0) {
           
            echo "<div class='empty_cart_holder'>
                <h3>Your Cart is Empty!</h3>
                <img src='assets/images/empty_cart.png' alt='empty'>
             </div>";
    
            
        }else {
            echo "<a href='cartaction.php?clear=all' id='clear_cart'>Empty Cart</a>";
        }
       
        while($row = mysqli_fetch_assoc($select_cart_items)) {
        $cartId = $row['cart_id'];
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_initial_price = $row['product_initial_price'];
        $quantity = $row['quantity'];
        $product_total_price = $row['product_total_price'];
        $product_image = $row['product_image'];

        
            echo "<div class='cart_items'>
        <div class='cart_image'>
            <img src='assets/images/$product_image' alt=''>
        </div>
        <div class='cart_item_description'>
            <p id='cart_item_name'>$product_name</p>
            <div class='price_operations'>
                <p id='cart_item_price'>Ksh $product_price</p>
                <p id='initial_price'><strike>Ksh $product_initial_price</strike> </p>
                <div class='operations'>
                    <button data-change-quant id='decrease_quant'>-</button>
                    <input type='number' class='form-control item_quantity' id='value_change' value='$quantity' min=1 max=20><div class='small-loader'></div>
                    <input type='hidden' class ='p_id' value='$cartId'>
                    <input type='hidden' class ='p_price' value='$product_price'>
                    <button data-change-quant id='increase_quant'>+</button>
                    <a href='cartaction.php?delete=$cartId' id='delete_cart_item'><i class='fa fa-trash'></i></a>
                   
                   
                </div>
                
            </div>
        </div>
        

</div>  <br><hr id='hr'>";
$subtotal += $product_total_price;
        }

        
        
        

?>

      
    </div>  
    

    <article class="single-sidebar" id="single_sbar_cart">
            <h3>Cart Summary</h3> <hr id="hr">
            <ul class="delivery-inf0">
                <li><strong>Sub Total: </strong><span style="color: green;font-weight:600;"> KSh <?php echo $subtotal;?></span></li>
                <li><strong>Delivery Charges: </strong><small style="color: green;font-weight:600;">No included yet</small></li>
                               
            </ul>
            <form action="">
            <button id="proceed_to_check_out">CheckOut Items</button>
            </form>
            
    </article> 
</section>
<div class="responsive_view">
    <?php include 'includes/recentlyviewed.php';?> 
</div>


<?php include 'includes/footer.php'?>



