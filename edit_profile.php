<?php
include 'config.php';
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
   header('location:login.php');
}

$user_id = $_SESSION['user_id'];

// Fetch user data
$select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');

if (mysqli_num_rows($select_user) > 0) {
   $fetch_user = mysqli_fetch_assoc($select_user);
} else {
   header('location:login.php'); // Redirect if no user found
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit Profile</title>

   <!-- font awesome cdn link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">    

   <!-- custom css file link -->
   <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php
if (isset($_SESSION['message'])) {
   foreach ($_SESSION['message'] as $message) {
      echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>';
   }
   unset($_SESSION['message']); // Clear message after showing
}
?>
<?php include 'header.php'; ?>

<div class="heading">
   <h3>Edit Profile</h3>
   <p><a href="home.php">home</a> / edit profile</p>
</div>

<!-- Message Box (optional but recommended) -->
<?php
// if(isset($message)){
//    foreach($message as $message){
//       echo '
//       <div class="message">
//          <span>'.$message.'</span>
//          <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
//       </div>
//       ';
//    }
// }
// ?>

<!-- Form Container Like Register Page -->
<div class="form-container">
   <form action="update_profile.php" method="post">="post">
    <h3>Edit Profile</h3>
    <label for="update_name">NAME:</label>
    <input type="text" name="update_name" placeholder="enter your name" required class="box" value="<?php echo $fetch_user['name']; ?>">
    <label for="update_name">EMAIL:</label>
    <input type="email" name="update_email" placeholder="enter your email" required class="box" value="<?php echo $fetch_user['email']; ?>">
    <label for="update_name">NUMBER:</label>
    <input type="text" name="update_number" placeholder="contact number" class="box" value="<?php echo $fetch_user['number']; ?>">
    <label for="update_name">ADDRESS:</label>
    <input type="text" name="update_address" placeholder="address" class="box" value="<?php echo $fetch_user['address']; ?>">
    <label for="update_name">ZIPCODE:</label>
    <input type="text" name="update_zipcode" placeholder="zip code" class="box" value="<?php echo $fetch_user['zipcode']; ?>">
    <label for="update_name">CITY:</label>
    <input type="text" name="update_city" placeholder="city" class="box" value="<?php echo $fetch_user['city']; ?>">
    
    <input type="submit" value="Update Profile" name="update_profile" class="btn">
    <p>back to profile? <a href="profile.php">view</a></p>
   </form>
</div>

<?php include 'footer.php'; ?>
<!-- custom js file link -->
<script src="js/script.js"></script>
</body>
</html>