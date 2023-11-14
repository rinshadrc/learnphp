<?php
include('includes/connect.php');

include('header.php');

if(isset($_POST['register'])){

    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_password = $_POST['c_password'];

    $existance ="select * from `customers` where c_email='$c_email'";
    $result_re = mysqli_query($con,$existance);
    $number = mysqli_num_rows($result_re);
    if ($number>0){
        echo"<script>alert('This email already exist')</script>";
    }
    else{

    
    $query = "INSERT INTO `customers`(c_name,c_email,c_password) VALUES ('$c_name','$c_email','$c_password')";
    $result = mysqli_query($con,$query);

    if($result){
   
        echo"<script>alert('registered successfully')</script>";
      }
      
      
    }

}
?>

<div class="container">
    <div class="row"><h2 class="TEXT-CENTER">USER REGISTRATION</h2></div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">

  


<form method="POST">
<div class="mb-3">
    <label  class="form-label">Your Name</label>
    <input type="text" class="form-control" placeholder=" name" aria-label="First name" name="c_name">

  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="c_email">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="c_password">
  </div>
  
  <button type="submit" class="btn btn-success" name="register" >Register</button>
</form>

</div>


<div class="col-md-2"></div>

</div>
</div>
