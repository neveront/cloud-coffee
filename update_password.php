<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
   header('location:login.php');
}

if (isset($_POST['change_password'])) {

   $old_pass = mysqli_real_escape_string($conn, md5($_POST['old_password']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_password']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_password']));

   $user_id = $_SESSION['user_id'];

   // Check if old password matches
   $select_old_pass = mysqli_query($conn, "SELECT password FROM `users` WHERE id = '$user_id'") or die('query failed');

   if (mysqli_num_rows($select_old_pass) > 0) {
      $fetch_pass = mysqli_fetch_assoc($select_old_pass);
      $stored_pass = $fetch_pass['password'];

      if ($old_pass != $stored_pass) {
         $_SESSION['message'][] = 'Old password not matched!';
         header("Location: change_password.php");
         exit();
      } elseif ($new_pass != $confirm_pass) {
         $_SESSION['message'][] = 'Confirm password not matched!';
         header("Location: change_password.php");
         exit();
      } else {
         // Update password in DB
         mysqli_query($conn, "UPDATE `users` SET password = '$new_pass' WHERE id = '$user_id'") or die('query failed');
         $_SESSION['message'][] = 'Password changed successfully!';
         header("Location: change_password.php");
         exit();
      }
   }
}
?>