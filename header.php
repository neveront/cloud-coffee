<!-- <?php 
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?> -->

<header class="header">

   <div class="header-2">
      <div class="flex">
         
         <a href="home.php" class="logo">
         
            Cloud Coffee</a>
            <img class="logopic" src="<?php echo BASE_URL ?>/images/logoko2.png">

         <nav class="navbar">
            <a href="<?php echo BASE_URL ?>/home.php">Home</a>
            <a href="<?php echo BASE_URL ?>/about.php">About</a>
            <a href="<?php echo BASE_URL ?>/shop.php">Shop</a>
            <a href="<?php echo BASE_URL ?>/contact.php">Contact</a>
            <a href="<?php echo BASE_URL ?>/orders.php">Orders</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
               if (isset($_SESSION['user_id'])) {
                  $user_id = $_SESSION['user_id'];
                  
                  // Only query the cart if user is logged in
                  $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                  $cart_rows = mysqli_num_rows($select_cart_number);
                  echo '(' . $cart_rows . ')';
               } else {
                  // Show 0 if user is not logged in
                  echo '(0)';
               }
               $cart_rows_number = mysqli_num_rows($select_cart_number); 
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            <p><strong>Username:</strong> <span><?php echo $_SESSION['user_name']; ?></span></p>
            <p><strong>Email:</strong> <span><?php echo $_SESSION['user_email']; ?></span></p>
            <p><strong>Password:</strong> <span>••••••••</span> <a href="change_password.php">Change</a></p>
            <p><strong>Address:</strong> <span><?php echo $_SESSION['user_address'] ?? 'Not set'; ?></span></p>
            <p><strong>Contact Number:</strong> <span><?php echo $_SESSION['user_number'] ?? 'Not set'; ?></span></p>
            <p><strong>ZIP Code:</strong> <span><?php echo $_SESSION['user_zipcode'] ?? 'Not set'; ?></span></p>
            <p><strong>City:</strong> <span><?php echo $_SESSION['user_city'] ?? 'Not set'; ?></span></p>

            <a href="logout.php" class="delete-btn">Logout</a>
            <a href="edit_profile.php" class="option-btn">Edit Profile</a>
         </div>
      </div>
   </div>

</header>