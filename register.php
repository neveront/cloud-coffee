<?php

include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = $_POST['user_type'];
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $zipcode = mysqli_real_escape_string($conn, $_POST['zipcode']);
   $city = mysqli_real_escape_string($conn, $_POST['city']);

   // ✅ First, check if email already exists
   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {
      $message[] = 'User already exists!';
   } else {
      if ($pass != $cpass) {
         $message[] = 'Confirm password not matched!';
      } else {
         // ✅ Only insert if all checks pass
         $insert_query = "INSERT INTO `users`(name, email, password, address, number, zipcode, city, user_type)
                          VALUES ('$name', '$email', '$cpass', '$address', '$number', '$zipcode', '$city', '$user_type')";

         if (mysqli_query($conn, $insert_query)) {
            $message[] = 'Registered successfully!';
            header('location:login.php');
            exit();
         } else {
            $message[] = 'Registration failed!';
         }
      }
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/styles.css">

</head>
<body>



<?php
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
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="name" placeholder="enter your name" required class="box">
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="password" placeholder="enter your password" required class="box">
      <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
      <input type="text" name="address" placeholder="Address" required class="box">
      <input type="text" name="number" placeholder="Contact Number" required class="box">
      <input type="text" name="zipcode" placeholder="ZIP Code" class="box">
      <input type="text" name="city" placeholder="City" required class="box">
      <select name="user_type" class="box">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>