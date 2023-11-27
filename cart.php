<?php
include('includes/connect.php');
include('header.php');
include('authenticate.php');




?>
<table class="table table-success m-5 me-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Image</th>

      <th scope="col">Product Name</th>
      <th scope="col">Product Price</th>
      <th scope="col">Product Quantity</th>
      <th scope="col">Total Price</th>


      <th scope="col">Options</th>



    </tr>
  </thead>
 
  <tbody>

    <?php

    $user = $_SESSION['user']['email'];

    $query = "SELECT * FROM cart c INNER JOIN products p ON c.p_id = p.p_id where c_email='$user'";
    $result = mysqli_query($con, $query);
    $sub_total = 0;
    $count = 1;
    while ($row = mysqli_fetch_assoc($result)) {

      $total = $row['qty'] * $row['p_price'];
      $sub_total += $total;


      echo "<tr>
      <th scope='row'>$count</th>
      <td><img src='admin_page/product_images/{$row['p_image']}' class='card-img-top' height=100px width=70px></td>
      <td>{$row['p_name']}</td>
      <td class='price' data-cartid='{$row['cart_id']}'>{$row['p_price']}</td>
      <td><input type='number' value='{$row['qty']}' class='quantity-input' data-cart-id='{$row['cart_id']}'></td>
     

      <td class='total' data-cart-id='{$row['cart_id']}'>$total</td>
      <td><a href='remove_from_cart.php?cart_id={$row['cart_id']}'><button type='submit' class='btn btn-danger'>Remove</button></a></td>
      
      </tr>";

      $count++;
    }
    echo "<tr>
    <td colspan='4'></td>
    <td class='fw-bold'>Total:</td>
    <td class='fw-bold stotal'><i class='bi bi-currency-rupee'></i>$sub_total</td>
    <td></td>
    
</tr></tbody></table>";

$_SESSION['tprice'] = $sub_total;



?>
    
  

    <div class='text-center'>
      <a href='checkout.php' class='btn btn-warning'>Check out Order</a>
    </div> 
    <a href="checkout.php">sgerg</a> 
    

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>

  $(document).ready(function(){
    $(".quantity-input").change(function(){

      var newqty = $(this).val();
      var cartid = $(this).data("cart-id");
      

    
              
        $.ajax({
            url: "update_qty.php",
            method: "POST",
            data: {
                "newqty": newqty,
                "cartid": cartid
            },
            success: function (response) {
              updateTotalPrice(cartid);

                // alert(response);
            },
            error: function () {
                alert("Error updating quantity");
            }
        });

    });
    function updateTotalPrice(cartid) {
            var qty = parseInt($(".quantity-input[data-cart-id='" + cartid + "']").val());
            var price = parseFloat($(".price[data-cartid='" + cartid + "']").text());
            var newTotal = qty * price;
            $(".total[data-cart-id='" + cartid + "']").text(newTotal);
            updateSubTotalPrice();

        };
        function updateSubTotalPrice() {

          var new_subtotal = 0;

            $(".total").each(function () {
                new_subtotal += parseFloat($(this).text());
            });

            $(".stotal").text(new_subtotal);
        }
               
  });
  
</script>
