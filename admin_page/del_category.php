<?php 
include('../includes/connect.php');



if(isset($_GET['catid'])){
    $cat_id = $_GET['catid'];

    $del_product = "delete from products where cat_id= $cat_id";
    $p_result= mysqli_query($con,$del_product);

    $del_category = "delete from categories where cat_id = $cat_id";
    $c_result= mysqli_query($con,$del_category);

    echo"<script>alert('category deleted')</script>";
    echo"<script>window.location.href='index.php?insert_category'</script>";

}

?>