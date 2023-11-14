<?php 
include('../includes/connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">




    <?php

$product_id = $_GET['product_id'];

$values  ="select * from products where p_id=$product_id";
$value_res = mysqli_query($con,$values);

$data = mysqli_fetch_array($value_res);

if (isset($_POST['edit_product'])) {
  

    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_des = $_POST['p_des'];
    $p_cat = $_POST['p_cat'];
    $p_status = 'true';

    $p_image = $_FILES['p_image']['name'];
    $temp_image = $_FILES['p_image']['tmp_name'];

    // Check if a new image is uploaded
    if (!empty($p_image)) {
        // Remove the old image
        $old_image = $data['p_image'];
        unlink("./product_images/$old_image");

        // Move the new image to the product_images folder
        move_uploaded_file($temp_image, "./product_images/$p_image");
    } else {
        // If no new image is uploaded, use the existing image name
        $p_image = $data['p_image'];
    }

    // Update the product information in the database
    $query = "UPDATE `products` SET p_name='$p_name', p_price='$p_price', p_des='$p_des', p_image='$p_image', status='$p_status', cat_id='$p_cat' WHERE p_id=$product_id";
    $result = mysqli_query($con, $query);

    if ($result) {
      echo "<script>alert('Edited successfully');</script>";
      echo "<script>window.location.href = 'index.php?view_product';</script>";
       
    } else {
        echo "<script>alert('Error editing product');</script>";
    }
}

    ?>
    <div class="container" style="margin: 50px;">
<form method="POST" enctype="multipart/form-data">

<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">product name</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="name" name="p_name" value="<?php echo $data['p_name'] ?>">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">product price</label>
  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="price" name="p_price" value="<?php echo $data['p_price'] ?>">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">product description</label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="descriuption" name="p_des" value="<?php echo $data['p_des'] ?>">
</div>

<select class="form-select" aria-label="Default select example" name="p_cat" value="<?php echo $data['cat_id'] ?>">
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
  <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="p_image" ><br><br>
</div><br>
<img src="<?php echo './product_images/'.$data['p_image'] ?>" alt="image" height="120px"><br>


<div class="mb-3 mt-2">
  <input type="submit" class="form-control bg-success TEXT-WHITE" id="formGroupExampleInput" placeholder="" name="edit_product">
</div>

</form>

</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>