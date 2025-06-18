<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
   header('location:login.php');
}

if (isset($_POST['update_profile'])) {

   $user_id = $_SESSION['user_id'];
   $name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $email = mysqli_real_escape_string($conn, $_POST['update_email']);
   $address = mysqli_real_escape_string($conn, $_POST['update_address']);
   $number = mysqli_real_escape_string($conn, $_POST['update_number']);
   $zipcode = mysqli_real_escape_string($conn, $_POST['update_zipcode']);
   $city = mysqli_real_escape_string($conn, $_POST['update_city']);

   // Run the update query
   $update_query = "UPDATE `users` SET 
                     name = '$name', 
                     email = '$email', 
                     address = '$address', 
                     number = '$number', 
                     zipcode = '$zipcode', 
                     city = '$city' 
                     WHERE id = '$user_id'";

   if (mysqli_query($conn, $update_query)) {
      // Update session data
      $_SESSION['user_name'] = $name;
      $_SESSION['user_email'] = $email;
      $_SESSION['user_address'] = $address;
      $_SESSION['user_number'] = $number;
      $_SESSION['user_zipcode'] = $zipcode;
      $_SESSION['user_city'] = $city;

      // Success message
      $_SESSION['message'] = ['Profile updated successfully!'];
   } else {
      $_SESSION['message'] = ['Database error: Failed to update profile'];
   }

   header("Location: edit_profile.php");
   exit();
}
?>