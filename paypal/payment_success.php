<?php
session_start();
include '../config.php';

if (!isset($_SESSION['user_id'])) {
   header('location:../login.php');
}

$order_data = $_SESSION['order_data'];

$user_id = $_SESSION['user_id'];
$name = $order_data['name'];
$email = $order_data['email'];
$number = $order_data['number'];
$method = 'paypal';
$address = $order_data['address'];
$total_products = $order_data['total_products'];
$total_price = $order_data['total_price'];
$placed_on = $order_data['placed_on'];

// Insert into orders table
mysqli_query($conn, "INSERT INTO `orders`(user_id, name, number, email, method, address, total_products, total_price, placed_on)
                     VALUES ('$user_id', '$name', '$number', '$email', '$method', '$address', '$total_products', '$total_price', '$placed_on')") or die('query failed');

// Clear cart
mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'");

unset($_SESSION['order_data']);

header("Location: order_complete.php");
exit();