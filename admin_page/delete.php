<?php

include('../includes/connect.php');

if(isset($_GET['product_id'])){

    $product_id = $_GET['product_id'];

    $query  = "delete from products where p_id=$product_id";
    $result = mysqli_query($con,$query);

    if ($result) {
        echo "<script>alert('Deleted successfully');</script>";
        echo "<script>window.location.href = 'index.php?view_product';</script>";
        
      } else {
          echo "<script>alert('Error deleting product');</script>";
      }
  }



?>