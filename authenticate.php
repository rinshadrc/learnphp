<?php


if(!isset($_SESSION['user'])){


    header("location:login.php");

    $message="You need to login first";

    $_SESSION['message']=$message;
  

}


?>