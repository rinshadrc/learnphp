<?php
include('includes/connect.php');

include('header.php');

if(isset($_POST['login'])){

    $c_email = $_POST['c_email'];
    $c_password = $_POST['c_password'];

    $query = "SELECT * FROM `customers` WHERE c_email='$c_email' AND c_password ='$c_password' ";
    echo $query;

    $results = mysqli_query($con,$query);
    print_r($results);
    if ($results) {
        if (mysqli_num_rows($results) > 0) {
     



        $_SESSION['user'] =$c_email ;
   
        echo"<script>
        alert('login successfully');
        window.location.href='index.php';
       
        </script>";
        
      }
      else{

        echo"<script>alert('password or email is incorrect')</script>";

      }

}
}

?>

<div class="container">
<div class="row"><h2 class="TEXT-CENTER">USER LOGIN</h2></div>

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">

  


<form method="POST">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="c_email">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="c_password">
  </div>
  
  <button type="submit" class="btn btn-success" name="login" >Login</button>
</form>

</div>


<div class="col-md-2"></div>

</div>
</div>
