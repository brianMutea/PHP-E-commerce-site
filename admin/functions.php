<?php


function insertCategories() {
    global $connection;
    if(isset($_POST['submit'])){
        $category_name = $_POST['category_name'];

        if($category_name == "" || empty($category_name)) {
            echo "Category can't be Empty";
        }else {

            $query = "INSERT INTO product_categories(category_name) VALUE('$category_name')";
            
            $create_category = mysqli_query($connection, $query);

            if(!$create_category) {
                die('Category not Added' . mysqli_error($connection));
            }

        }

    }
}


function queryAllCategories() {
    global $connection;
    $query = "SELECT * FROM product_categories";
            $select_all_categories = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_all_categories)) {
                $category_id = $row['category_id'];
                $category_name = $row['category_name'];
                echo "<tr>";
                echo "<td>{$category_id}</td>";
                echo "<td>{$category_name}</td>";
                echo "<td><a href = 'categories.php?delete={$category_id}'><button class='btn btn-danger'>Delete</button></a></td>";
                echo "<td><a href ='categories.php?edit={$category_id}'><button class='btn btn-success'>Edit</button></a></td>";
                echo "</tr>";
            }
}

function deleteCategory() {
    global $connection;

    if(isset($_GET['delete'])) {
        $fetched_category_id = $_GET['delete'];

        $query = "DELETE FROM product_categories WHERE category_id = {$fetched_category_id}";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function confirmQuery($result) {
    global $connection;
    if(!$result) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}


function populateProducts($category_id) {
    global $connection;
    
        $query = "SELECT * FROM products WHERE product_category_id = '$category_id' LIMIT 6";
        $select_all_products = mysqli_query($connection, $query);
       

          while($row = mysqli_fetch_assoc($select_all_products)) {
            $product_id = $row['product_id'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_initial_price = $row['product_initial_price'];
            $product_image = $row['product_image'];
          
            
            ?>
        <?php
     
        
        ?> 
           
            <div class="feat-item"><a href="single.php?&prod_id=<?php echo $product_id;?>">
            <div class="item-img">
              <img src="assets/images/<?php  echo $product_image;?>" alt="" />
            </div>
            <div class="description">
              <p id="item-title"><?php  echo $product_name;?> </p>
             <p id="item-price">Ksh <?php  echo $product_price;?></p>
              <small id="discouted-price"><strike>Ksh <?php  echo $product_initial_price;?></strike></small>
            </div></a>

            <form class ='form-submit'> 
                  <input type="hidden" value="<?php echo $product_id;?>" class='p_id'>
                  <input type="hidden" value="<?php echo $product_name;?>" class='p_name'>
                  <input type="hidden" value="<?php echo $product_price;?>" class='p_price'>
                  <input type="hidden" value="<?php echo $product_initial_price;?>" class='p_init_price'>
                  <input type="hidden" value="<?php echo $product_image;?>" class='p_image'>
                  <input type="hidden" value="<?php echo $product_id;?>" class='p_code'>
                  <button name ='add-to-cart' id="add-to-cart" data-add-to-cart><i class="fas fa-shopping-cart"></i></button>
            </form>
                
    
            
          </div>
        
         <?php  }
         

}
// function cartElement($product_name,$product_price, $product_image) {
//     $element = "


//     <form action='>
//        <div class='cart_items'>
//                 <div class='cart_image'>
//                     <img src='assets/images/$product_image' alt='>
//                 </div>
//                 <div class='cart_item_description'>
//                     <p id='cart_item_name'>$product_name</p>
//                     <div class='price_operations'>
//                         <p id='cart_item_price'>Ksh $product_price</p>
//                         <p id='initial_price'><strike>Ksh $product_initial_price</strike> </p>
//                         <div class='operations'>
//                             <button data-change-quant id='decrease_quant'>-</button>
//                             <span id='value_change'>1</span>
//                             <button data-change-quant id='increase_quant'>+</button>
//                         </div>
                        
//                     </div>
//                 </div>
//                 <button id='delete_cart_item'>Delete</button>

//         </div>
//     </form>
//         <br>
    
     
    
    
    
    
    
//  }   ";
    

    

?>


