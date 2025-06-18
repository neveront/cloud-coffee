<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
   header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Change Password</title>

   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">    

   <!-- custom css file link -->
   <link rel="stylesheet" href="css/styles.css">
</head>
<body>
   
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Change Password</h3>
   <p><a href="home.php">home</a> / change password</p>
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

<!-- Change Password Form -->
<div class="form-container">
   <form action="update_password.php" method="post">
      <h3>change password</h3>

      <input type="password" name="old_password" required placeholder="Enter your old password" class="box">
      
      <input type="password" name="new_password" required placeholder="Enter your new password" class="box">
      
      <input type="password" name="confirm_password" required placeholder="Confirm your new password" class="box">

      <input type="submit" value="Update Password" name="change_password" class="btn">
      <p><a href="edit_profile.php">Back to Profile</a></p>
   </form>
</div>

<?php include 'footer.php'; ?>
<!-- custom js file link -->
<script src="js/script.js"></script>
</body>
</html>