<?php
session_start();
include '../config.php';
include 'config.php';

// Optional: Clear session data after successful payment
unset($_SESSION['order_data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Payment Successful</title>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 

   <!-- Custom CSS -->
   <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
   
<?php include '../header.php'; ?>

<div class="heading">
   <h3>Payment Successful</h3>
   <p><a href="../home.php">home</a> / payment successful</p>
</div>

<section class="success-message">
   <div class="heading">
      <h1>Thank you for your order!</h1>
      <p>Your payment has been successfully processed via PayPal.</p>
      <p>We’ve received your order and will prepare it right away.</p>
      <a href="../home.php" class="btn">Back to Home</a>
   </div>
</section>

<?php include '../footer.php'; ?>
<!-- custom js file link -->
<script src="../js/script.js"></script>

</body>
</html>