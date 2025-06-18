<?php
session_start();
include '../config.php';
include 'config.php';

$order_data = $_SESSION['order_data'];
$grand_total = $order_data['total_price'];

// Format grand total to 2 decimal places
$payment_amount = number_format($grand_total, 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Pay with PayPal</title>

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> 

   <!-- Custom CSS -->
   <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
   

<?php 
$base_url = '..'; // or '../..', depending on depth
include '../header.php'; ?>

<div class="heading">
   <h3>Complete Your Payment</h3>
   <p><a href="../home.php">home</a> / payment</p>
</div>

<!-- Message Box -->
<?php
if (isset($_SESSION['message'])) {
   foreach ($_SESSION['message'] as $message) {
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>';
   }
   unset($_SESSION['message']); // Clear messages after showing
}
?>

<!-- Styled Form Container -->
<div class="form-container">
   <form action="" method="post">
      <h3>Proceed with PayPal</h3>
      <p>Your total amount due is: <strong>₱<?php echo $payment_amount; ?></strong></p>

      <!-- PayPal Button -->
      <div id="paypal-button-container" style="margin-top: 15px;"></div>

      <p style="margin-top: 20px;">
         <small>You'll be redirected to PayPal to complete the payment.</small>
      </p>
   </form>
</div>

<?php include '../footer.php'; ?>
<script src="../../js/script.js"></script>

<!-- PayPal SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_CLIENT_ID; ?>&currency=PHP"></script>

<script>
   paypal.Buttons({
      style: {
         color: 'gold',
         shape: 'pill'
      },
      createOrder: function(data, actions) {
         return actions.order.create({
            purchase_units: [{
               amount: {
                  value: '<?php echo $payment_amount; ?>' // Must be string with 2 decimals
               }
            }]
         });
      },
      onApprove: function(data, actions) {
         return actions.order.capture().then(function(details) {
            window.location.href = 'payment_success.php';
         });
      },
      onError: function(err) {
         alert("An error occurred during payment.");
         window.location.href = 'payment_failed.php';
      }
   }).render('#paypal-button-container'); 
</script>

</body>
</html>