<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      $message[] = 'product added to cart!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>shop</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>our shop</h3>
   <p> <a href="home.php">home</a> / shop </p>
</div>

<section class="products">

   <h1 class="title">latest products</h1>
   <div class="title">
      <form method="GET" action="" class="filter-form">
         <!-- categories_dropdown.php -->
      <select name="category" id="category" onchange="this.form.submit()">
         <option value="">All Products</option>
         <option value="Coffee"<?php if(isset($_GET['category']) && $_GET['category'] == 'Coffee') echo ' selected'; ?>>Coffee</option>
         <option value="Tea"<?php if(isset($_GET['category']) && $_GET['category'] == 'Tea') echo ' selected'; ?>>Tea</option>
         <option value="Fruit Tea"<?php if(isset($_GET['category']) && $_GET['category'] == 'Fruit Tea') echo ' selected'; ?>>Fruit Tea</option>
         <option value="Americano"<?php if(isset($_GET['category']) && $_GET['category'] == 'Americano') echo ' selected'; ?>>Americano</option>
         <option value="Cappuccino"<?php if(isset($_GET['category']) && $_GET['category'] == 'Cappuccino') echo ' selected'; ?>>Cappuccino</option>
         <option value="Latte"<?php if(isset($_GET['category']) && $_GET['category'] == 'Latte') echo ' selected'; ?>>Latte</option>
         <option value="Mocha"<?php if(isset($_GET['category']) && $_GET['category'] == 'Mocha') echo ' selected'; ?>>Mocha</option>
         <option value="Espresso"<?php if(isset($_GET['category']) && $_GET['category'] == 'Espresso') echo ' selected'; ?>>Espresso</option>
         <option value="Frappe"<?php if(isset($_GET['category']) && $_GET['category'] == 'Frappe') echo ' selected'; ?>>Frappe</option>
         <option value="Iced Coffee"<?php if(isset($_GET['category']) && $_GET['category'] == 'Iced Coffee') echo ' selected'; ?>>Iced Coffee</option>
         <option value="Meals"<?php if(isset($_GET['category']) && $_GET['category'] == 'Meals') echo ' selected'; ?>>Meals</option>
      </select>
      <?php include 'price_filter.php'; ?>
      </form>
   </div>

   <div class="box-container">

      <?php  
// Get selected filters
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';
$price_range = isset($_GET['price_range']) ? $_GET['price_range'] : '';

// Base query
$query = "SELECT * FROM `products` WHERE 1=1";

// Apply category filter
if (!empty($category_filter)) {
    $query .= " AND category = '$category_filter'";
}

// Apply price filter
if (!empty($price_range)) {
    switch ($price_range) {
        case '0-100':
            $query .= " AND price BETWEEN 0 AND 100";
            break;
        case '100-200':
            $query .= " AND price BETWEEN 100 AND 200";
            break;
        case '200-500':
            $query .= " AND price BETWEEN 200 AND 500";
            break;
        case '500-1000':
            $query .= " AND price BETWEEN 500 AND 1000";
            break;
        case '1000+':
            $query .= " AND price > 1000";
            break;
    }
}

// Run query
$select_products = mysqli_query($conn, $query) or die('query failed');

// Display products
if(mysqli_num_rows($select_products) > 0){
   while($fetch_products = mysqli_fetch_assoc($select_products)){
?>
<form action="" method="post" class="box">
   <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
   <div class="name"><?php echo $fetch_products['name']; ?></div>
   <div class="price">₱<?php echo $fetch_products['price']; ?></div>
   <input type="number" min="1" name="product_quantity" value="1" class="qty">
   <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
   <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
   <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
   <input type="submit" value="add to cart" name="add_to_cart" class="btn">
</form>
<?php
   }
}else{
   echo '<p class="empty">no products found!</p>';
}
?>
   </div>

</section>








<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>