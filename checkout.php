<?php
include('includes/connect.php');
include('header.php');



if(isset($_POST['place_order'])){

  

if(isset($_SESSION['tprice'])){

    $tprice =$_SESSION['tprice'];

    $user_email = $_SESSION['user']['email'];

    $orderDate = date("Y-m-d H:i:s");

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $address = $_POST['address'];
        $pincode = $_POST['pincode'];

        $query = "insert into `orders` (c_email,address,pincode,order_date,total_price) values('$user_email','$address','$pincode','$orderDate','$tprice')"; 
        $result = mysqli_query($con,$query);

        if($result){
            // echo$query;

            $order_id = mysqli_insert_id($con);

            // Get cart items from the database

            $cartItemsQuery = "SELECT * FROM cart WHERE c_email = '$user_email'";
            $cartItemsResult = mysqli_query($con, $cartItemsQuery);

            // Loop through the cart items and insert into order_items
            while ($cart_item = mysqli_fetch_assoc($cartItemsResult)) {
                $cart_id = $cart_item['cart_id'];
                $product_id = $cart_item['p_id'];
                $quantity = $cart_item['qty'];

                // Fetch product details including price
                $productQuery = "SELECT * FROM products WHERE p_id = $product_id";
                $productResult = mysqli_query($con, $productQuery);

                $productDetails = mysqli_fetch_assoc($productResult);

                // Calculate total price for the order item
                $price = $productDetails['p_price'] * $quantity;

                // Insert into order_items table
                $insertOrderItemQuery = "INSERT INTO `order_item`(order_id, cart_id, p_id,tprice_orderitem,quantity) 
                                        VALUES ('$order_id','$cart_id','$product_id','$price','$quantity')";
                $orderItemResult = mysqli_query($con, $insertOrderItemQuery);

                
                if (!$orderItemResult) {
                    echo"data not inserted into order item table";
                }
            }

            // Remove cart items after order placement
            $deleteCartQuery = "DELETE FROM cart WHERE c_email = '$user_email'";
            $deleteCartResult = mysqli_query($con, $deleteCartQuery);

          

            // Order and order items insertion successful, you may want to clear the session variables
            unset($_SESSION['total_price']);

            // ... additional code ...

            echo "<script>alert('Order placed successfully');</script>";
            header("Location: index.php");
            exit();

        } else {
            echo "Error placing the order: " . mysqli_error($con);
        }

    }
} else {
    // Redirect to cart.php or handle the case where total_price is not set
    header("Location: cart.php");
    exit();
}
}



?>
<div class="container">
    <div class="row">
        <div class="col-md-8">

                <form class="row g-3" method="POST">
                   
                    <div class="col-md-10">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Enter your address" name="address">
                    </div>
                    
                    <div class="col-md-10">
                        <label for="inputZip" class="form-label">Pin code</label>
                        <input type="text" class="form-control" id="inputZip" name="pincode">
                    </div>
                   
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" name="place_order">Place Order </button>
                    </div>
                    </form>
        </div>
        <div class="col-md-2"></div>
        <?php
        
        if(isset($_SESSION['tprice'])){
            $tprice = $_SESSION['tprice'];
        }

        echo"

        <div class='col-md-2'>
            <h1>Total Price :$tprice </h1>
        </div>
        ";
        ?>

    </div>
</div>