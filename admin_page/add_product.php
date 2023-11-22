<?php
include('../includes/connect.php');

if(isset($_POST['add_product'])){

  $p_name = $_POST['p_name'];
  $p_price = $_POST['p_price'];
  $p_des = $_POST['p_des'];
  $p_cat = $_POST['p_cat'];
  $p_status ='true';



  $p_image = $_FILES['p_image']['name'];

  $temp_image = $_FILES['p_image']['tmp_name'];

  move_uploaded_file($temp_image,"./product_images/$p_image");



  $query = "insert into `products` (p_name,p_price,p_des,cat_id,p_image,status) values ('$p_name','$p_price','$p_des',' $p_cat','$p_image','$p_status')";

  $result = mysqli_query($con,$query);

  if($result){
   
   echo"<script>alert('product added successfully')</script>";
 }
}


?>
<h1>ADD PRODUCTS</h1>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">product name</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="name" name="p_name">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">product price</label>
  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="price" name="p_price">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">product description</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="descriuption" name="p_des">
</div>

<select class="form-select" aria-label="Default select example" name="p_cat">
  <option selected>select categories</option>

  <?php
  $cat = "select * from categories";
  $res = mysqli_query($con,$cat);

  while($row = mysqli_fetch_assoc($res)){

  $cat_name = $row['cat_name'];
  $cat_id = $row['cat_id'];



  echo"<option value='$cat_id'>$cat_name</option>";
  }

  ?>

 
</select><br>
<div class="input-group">
  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="p_image">
  
</div><br>

<div class="mb-3">
  <input type="submit" class="form-control bg-success TEXT-WHITE" id="formGroupExampleInput" placeholder="" name="add_product">
</div>

</form>