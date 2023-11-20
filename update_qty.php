<?php
include('includes/connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if 'cartid' and 'newqty' keys are set in $_POST
    if (isset($_POST['cartid'], $_POST['newqty'])) {
        $cartid = $_POST['cartid'];
        $newqty = $_POST['newqty'];

       

        $query = "UPDATE `cart` SET qty=$newqty WHERE cart_id= $cartid";
        $result = mysqli_query($con,$query);



        if ($result) {
            echo "Quantity updated successfully";
        } else {
            echo "Error updating quantity: " . mysqli_error($con);
        }

     
    } else {
        echo "Invalid data received";
    }
} else {
    echo "Invalid request method";
}
?>





