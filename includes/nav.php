<?php session_start(); ?>
<div class="loader" id="top">
       
    </div>

    <div class="overlay"></div>

    <div class="header">
      <div class="logo">
        <h2> <a href="./">Kimberly</a></h2>
      </div>
      <div class="search-bar">
        <form action="" id="form-search-products">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Search Products" />

          <div class="search-btn">
            <button class="search" type="submit">Search</button>
          </div>
        </form>
      </div>

      <div class="account-info-holder drop-container">
        <i class="fa-regular fa-user" id="user-icon"></i>
        <span class="user-acc-name">Brian</span>
        <i class="fa fa-chevron-down"></i>

        <div id="account-info-holder" class="drop-down-items">
          <ul class="item-drops">
            <li class="item">
              <a href=""
                ><i class="fa-regular fa-user" id="user-icon"></i>My Account</a
              >
            </li>
            <li class="item">
              <a href=""><i class="fas fa-bag-shopping"></i>Orders</a>
            </li>
            <li class="item">
              <a href=""><i class="fa-solid fa-heart"></i>Saved Items</a>
            </li>
          </ul>
          <button id="logout-btn">Logout</button>
        </div>
      </div>

      <div class="app-help drop-container">
        <i class="fa-regular fa-circle-question"></i>
        <span class="app-help-name">Help</span>
        <i class="fa fa-chevron-down"></i>

        <div class="drop-down-items" id="app-help">
          <ul class="item-drops">
            <li class="item"><a href="">Place and Track Order</a></li>
            <li class="item"><a href="">Order Cancellation</a></li>
            <li class="item"><a href="">Payments</a></li>
          </ul>
        </div>
      </div>

      <div class="cart drop-container">
        <a href="cart.php">
        <i class="fa-solid fa-cart-arrow-down"></i>
        <span class="cart-name">Cart</span>
        <span id='cart-counter'>0</span>

        <?php
            // $items = $_SESSION['cart'];
            // $cartitems = explode(",", $items);
            // $items = count($cartitems);
            // echo "<span id='cart-counter'>$items</span>";
          ?>

        <?php 

        // if(isset($_SESSION['cart'])) {
        //   $count = count($_SESSION['cart']);
        //   echo "<span id='cart-counter'>$count</span>";
        // }else {
        //   echo "<span id='cart-counter'>0</span>";
        // }
        
        ?>
        
        </a>
        <!-- <div class="drop-down-items" id="cart">
          <ul class="item-drops">
            <li class="item">
              <a href="">
                <div class="cart-drop-img">
                  <img src="assets/images/grocerys2.jpg" alt="cart-item" />
                </div>

                <div class="description">
                  <p class="item-desc">
                    Lorem ipsum dolor, sit amet consectetur <br />
                    adipisicing elit. Obcaecati, dolores?
                  </p>
                  <p class="price">Price: <span>100ksh</span></p>
                </div>
              </a>
            </li>
            <li class="item">
              <a href="">
                <div class="cart-drop-img">
                  <img src="assets/images/grocerys2.jpg" alt="cart-item" />
                </div>

                <div class="description">
                  <p class="item-desc">
                    Lorem ipsum dolor, sit amet consectetur <br />
                    adipisicing elit. Obcaecati, dolores?
                  </p>
                  <p class="price">Price: <span>100ksh</span></p>
                </div>
              </a>
            </li>
            <li class="item">
              <a href="">
                <div class="cart-drop-img">
                  <img src="assets/images/grocerys2.jpg" alt="cart-item" />
                </div>

                <div class="description">
                  <p class="item-desc">
                    Lorem ipsum dolor, sit amet consectetur <br />
                    adipisicing elit. Obcaecati, dolores?
                  </p>
                  <p class="price">Price: <span>100ksh</span></p>
                </div>
              </a>
            </li>
          </ul>
          <button class="visit-cart-from-dropdown">Visit Cart</button>
        </div> -->
      </div>
    </div>
