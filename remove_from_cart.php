<?php
session_start();
include('includes/connect.php');

if(isset($_GET['cart_id']) ){

    $cart_id = $_GET['cart_id'];

    
    $query = "delete from `cart` where cart_id=$cart_id";
    $result = mysqli_query($con,$query);

    if($result){
        // echo"<script>alert('item removed from cart);</script>";
        echo"<script>window.location.href='cart.php';</script>";

    }



}