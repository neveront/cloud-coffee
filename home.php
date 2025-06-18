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
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">



</head>
<body>
   
<?php include 'header.php'; ?>

<section class="home">
      <div class="top-content">
         <div class="content">
            <h3>Fresh in the <br> Morning</h3>
            <a href="shop.php" class="white-btn">Order now</a>
         </div>
         
         <div class="content1">
            <!-- Only one image in content1 -->
            <img src="images/hotkape.png" id="selectedImage">
         </div>
      </div>

      <div class="below-content-content1">
         <img src="images/hotkape.png" >
         <img src="images/hotkape2.png" >
         <img src="images/hotkape1.png" >
      </div>
   </section>



<section class="about">

   <div class="flex">

         <div class="imagepro">
            <img src="images/product14.jpg">
         </div>

         <div class="content">
            <h3>Matcha Blossom Latte</h3>
            <p>Taste the flavor of love with our Matcha Blossom Latte,</br> infused with strawberry milk that you'll love!</p>
         </div>

      </div>
      <div class="flex">

         <div class="content">
            <h3>Tropical Specials</h3>
            <p>Cool down with our new Tropical Specials </br> that will bring you a taste of island life to you!</p>
         </div>

         <div class="imagepro">
            <img src="images/product13.jpg">
         </div>

      </div>
      <div class="flex">

         <div class="imagepro">
            <img src="images/product12.jpg">
         </div>

         <div class="content">
            <h3>Rainy day Special</h3>
            <p>Now that the rainy season is started,</br> our drinks is the perfect time to sip a latte!</p>
         </div>

      </div>
      <div class="flex">

         <div class="content">
            <h3>All-day breakfast</h3>
            <p>Fuel your day with our irresistable all day</br> breakfast and mouthwatering burgers!</p>
         </div>

         <div class="imagepro">
            <img src="images/product11.jpg">
         </div>

   </div>

</section>

<section class="home-contact">

   <div class="content">
      <h3>have any questions?</h3>
      <p>If you have general questions or concerns about Cloud Coffee, please contact our Customer Contact Center </br>cloud_coffee@gmail.com</br>or</p>
      <a href="contact.php" class="white-btn">directly message us</a>
   </div>

</section>





<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>
      document.addEventListener("DOMContentLoaded", function() {
         const belowContentImages = document.querySelectorAll('.below-content-content1 img');
         const topContentImage = document.querySelector('.content1 img');

         belowContentImages.forEach(img => {
            img.addEventListener('click', function() {
               // Set the source of the single image in top content to the clicked image source
               topContentImage.src = this.src;

               // Remove the 'active' class from all images
               belowContentImages.forEach(image => image.classList.remove('active'));

               // Add the 'active' class to the clicked image
               this.classList.add('active');

               // Apply transition styles directly
               topContentImage.style.transition = 'opacity 0.5s ease-in-out, transform 0.5s ease-in-out';
               topContentImage.style.opacity = '100';
               topContentImage.style.transform = 'translateY(0)';
            });
         });
      });
   </script>
</body>
</html>