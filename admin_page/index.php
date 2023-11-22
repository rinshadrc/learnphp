<?php 
include('../includes/connect.php');





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mystore Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>/* The side navigation menu */
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}

/* Active/current link */
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}   

</style>

<style>
    .info-container {
        display: flex;
        justify-content: space-around;
        padding: 20px;
        background-color: #f4f4f4;
        margin-top: 30px;
       
    }

    .info-box {
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        width: 350px;
    }

    .info-box:hover {
        transform: scale(1.05);
    }

    h2 {
        color:black;
    }

    h1 {
        color: #04AA6D;
    }
</style>
</head>
<body>
<div class="sidebar">
  <a class="active" href="index.php">Home</a>
  <a href="index.php?insert_category">Add categories</a> 
  <a href="index.php?insert_product">Add product</a>
  <a href="index.php?view_customers">View customers</a>
  <a href="index.php?view_product">View product</a>
  <a href="index.php?view_orders">View Orders</a>

  
</div>

<!-- Page content -->
<div class="content">


   

<?php
if (!isset($_GET['insert_category']) && !isset($_GET['insert_product']) && !isset($_GET['view_product']) && !isset($_GET['view_customers']) && !isset($_GET['view_orders'])) {
    // Fetch product count
    $productCountQuery = "SELECT COUNT(*) AS product_count FROM products";
    $productCountResult = mysqli_query($con, $productCountQuery);
    $productCount = mysqli_fetch_assoc($productCountResult)['product_count'];

    // Fetch customer count
    $customerCountQuery = "SELECT COUNT(*) AS customer_count FROM customers";
    $customerCountResult = mysqli_query($con, $customerCountQuery);
    $customerCount = mysqli_fetch_assoc($customerCountResult)['customer_count'];

    $orderCountQuery = "SELECT COUNT(*) AS order_count FROM orders";
    $orderCountResult = mysqli_query($con, $orderCountQuery);
    $orderCount = mysqli_fetch_assoc($orderCountResult)['order_count'];


    echo "
    <h1>Welcome to the Admin Panel</h1>
    <div class='info-container'>
        <div class='info-box'>
            <h2>Products</h2>
            <p><h1>$productCount</h1></p>
        </div>

        <div class='info-box'>
            <h2>Customers</h2>
            <p><h1>$customerCount</h1></p>
        </div>
        <div class='info-box'>
            <h2>Orders</h2>
            <p><h1>$orderCount</h1></p>
        </div>
    </div>";
}

if (isset($_GET['insert_category'])) {
    include('categories.php');
}
if (isset($_GET['insert_product'])) {
    include('add_product.php');
}
if (isset($_GET['view_product'])) {
    include('view_product.php');
}
if (isset($_GET['view_customers'])) {
    include('view_customers.php');
}
if (isset($_GET['view_orders'])) {
    include('view_order.php');
}
?>


  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>