<?php

include('./includes/connect.php');

function getproduct()
{

  global $con;

  if (!isset($_GET['category']) or (!isset($_GET['search_product']))) {

    $query = "select * from `products`";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {

      echo "<div class='col-md-4 my-4'>

            <div class='card' style='width: 18rem; height:25rem'>
              <img src='./admin_page/product_images/{$row['p_image']}' class='card-img-top' height=222px>
              <div class='card-body'>
                <h5 class='card-title text-uppercase'>{$row['p_name']}</h5>
                <p class='card-text text-danger'><i class='bi bi-currency-rupee'>{$row['p_price']}</i></p>

                <p class='card-text fst-italic'>{$row['p_des']}</p>
                <a href='add_to_cart.php?product_id={$row['p_id']}' class='btn btn-dark'>Add to cart</a>
              </div>
            </div>
        </div>";
    }
  }
}


function unique_categories()
{

  global $con;
  if (isset($_GET['category'])) {
    $category_id = $_GET['category'];

    $query = "select * from `products` where cat_id=$category_id";
    $result = mysqli_query($con, $query);

    $numofrows = mysqli_num_rows($result);
    if ($numofrows == 0) {
      echo "<h1>there is no product in this categories</h1>";
    } else {
      while ($row = mysqli_fetch_assoc($result)) {

        echo "<div class='col-md-4'>
      
              <div class='card' style='width: 18rem; height:25rem'>
                <img src='./admin_page/product_images/{$row['p_image']}' class='card-img-top' height=222px>
                <div class='card-body'>
                  <h5 class='card-title text-uppercase'>{$row['p_name']}</h5>
                  <p class='card-text text-danger'>{$row['p_price']}</p>
      
                  <p class='card-text fst-italic'>{$row['p_des']}</p>
                  <a href='#' class='btn btn-success'>Add to cart</a>
                  </div>
              </div>
            </div>";
      }
    }
  }
}

function searchproduct()
{

  global $con;

  if (isset($_GET['search_product'])) {

    $search_data = $_GET['search_data'];

    $query = "SELECT * FROM `products` WHERE p_name OR p_des LIKE '%$search_data%'";

    $result = mysqli_query($con, $query);

    $numofrows = mysqli_num_rows($result);

    if ($numofrows == 0) {
      echo "<h1>No products found with this name `$search_data`</h1>";
    } else {
      while ($row = mysqli_fetch_assoc($result)) {

        echo "<div class='col-md-4'>
      
              <div class='card' style='width: 18rem; height:25rem'>
                <img src='./admin_page/product_images/{$row['p_image']}' class='card-img-top' height=222px>
                <div class='card-body'>
                  <h5 class='card-title text-uppercase'>{$row['p_name']}</h5>
                  <p class='card-text text-danger'><i class='bi bi-currency-rupee'>{$row['p_price']}</i></p>
      
                  <p class='card-text fst-italic'>{$row['p_des']}</p>
                  <a href='#' class='btn btn-success'>Add to cart</a>
                  </div>
              </div>
            </div>";
      }
    }
  }
}
