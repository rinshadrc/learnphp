<?php
if(isset($_POST['add_cat'])){
     $cat_name = $_POST['cat_name'];


     $query = "insert into `categories`(cat_name) values($cat_name)";

     $result = mysqli_query($con,$query);

     if($result){
      
      echo"<script>alert('category added successfully')</script>";
    }
}


?>



<form action="" method="POST">


<div class="input-group mb-3 mt-5">
  <input type="text" class="form-control" placeholder="Add categories" aria-label="Recipient's username" aria-describedby="button-addon2" name="cat_name">
  <input class="btn btn-outline-success " type="submit" id="button-addon2" name="add_cat">
</div>
</form>