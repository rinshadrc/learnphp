<?php
session_start();
include('includes/connect.php');
include('authenticate.php');


if(isset($_GET['product_id']) && isset($_SESSION['user'])){

    $product_id = $_GET['product_id'];
    $user_email = $_SESSION['user']['email'];

  
      // Check if the product is already in the cart for the specific user
      $checkQuery = "SELECT * FROM cart WHERE p_id = $product_id AND c_email = '$user_email'";
      $checkResult = mysqli_query($con, $checkQuery);
  
      if (mysqli_num_rows($checkResult) > 0) {
          // If the product is already in the cart, update the quantity
          $updateQuery = "UPDATE cart SET qty = qty + 1 WHERE p_id = $product_id AND c_email = '$user_email'";
          $updateResult = mysqli_query($con, $updateQuery);
  
          if ($updateResult) {
              echo "<script>alert('Product quantity updated in the cart.');</script>";
              header("Location: cart.php");
              exit();
          } else {
              echo "<script>alert('Failed to update product quantity in the cart.');</script>";
          }
      } else {
          // If the product is not in the cart, insert a new record
          $insertQuery = "INSERT INTO cart (p_id, c_email, qty) VALUES ($product_id, '$user_email', 1)";
          $insertResult = mysqli_query($con, $insertQuery);
  
          if ($insertResult) {
              echo "<script>alert('Product added to the cart.');</script>";
              header("Location: cart.php");
              exit();
          } else {
              echo "<script>alert('Failed to add product to the cart.');</script>";
          }
      }
  }



?>