
<?php include 'includes/db.php';?>
	
<?php


	 
	if(isset($_POST['p_code']) ) {
		
		$id = $_POST['p_id'];
		$name = $_POST['p_name'];
		$price = $_POST['p_price'];
		$initial_price = $_POST['p_init_price'];
		$image = $_POST['p_image'];
		$code = $_POST['p_code'];
		$quantity = 1;
		

		$query = "SELECT product_code FROM cart WHERE product_code = $code"; 
        $select_code = mysqli_query($connection, $query);
	
		$check_code = mysqli_fetch_assoc($select_code);
		

		 
		if(!$check_code) {

			$query = "INSERT INTO cart (product_name, product_price, product_initial_price, quantity, product_total_price, product_image, product_code) ";
    		$query .= " VALUES ('$name', $price, $initial_price, '$quantity', '$price', '$image', $code) ";

    		$add_item_query = mysqli_query($connection, $query);
			
			

			echo "<strong class='alert-success'>Success!! Item Added to Cart</strong>";
		}else {
			echo "<strong class='alert-warning'>Hey! Item Aready in Cart</strong>";
			
		}
	}



	if(isset($_GET['cartItem']) && isset($_GET['cartItem'])=='cart_item') {
		$query = "SELECT * FROM cart";
		$select_cart_rows = mysqli_query($connection, $query);
		$rowcount = mysqli_num_rows($select_cart_rows);

		echo $rowcount;

	}

	// Delete Cart Item
	if(isset($_GET['delete'])) {
		$id = $_GET['delete'];
		$query = "DELETE FROM cart WHERE cart_id = $id";
		$delete_item = mysqli_query($connection, $query);
		$fetch_item = mysqli_fetch_assoc($delete_item);
		header("Location: cart.php");
		echo "<strong class='alert-success'>Hey! Item Aready in Cart</strong>";
	}

	if(isset($_GET['clear'])) {
		$id = $_GET['clear'];
		$query = "DELETE FROM cart";
		$clear_cart = mysqli_query($connection, $query);

		header("Location: cart.php");
	}

	// Updating Item Quantity

	if(isset($_POST['p_quantity'])) {
		$name = $_POST['p_name'];
		$qty = $_POST['p_quantity'];
		$id = $_POST['p_id'];
		$price = $_POST['p_price'];

		$total_price = $qty * $price;
		$query = "UPDATE cart SET quantity = $qty, product_total_price = $total_price WHERE cart_id = $id";
		$update_item = mysqli_query($connection, $query);
		echo "<strong class='alert-success'>Quantity Updated!</strong>";

	}
?>