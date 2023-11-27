<?php

include('../includes/connect.php');
if (isset($_POST['add_cat'])) {
  $cat_name = $_POST['cat_name'];


  $existance = "select * from `categories` where cat_name='$cat_name'";
  $result_re = mysqli_query($con, $existance);
  $number = mysqli_num_rows($result_re);
  if ($number > 0) {
    echo "<script>alert('This category already exist')</script>";
  } else {

    $query = "insert into `categories`(cat_name) values('$cat_name')";

    $result = mysqli_query($con, $query);

    if ($result) {

      echo "<script>alert('category added successfully')</script>";
    }
  }
}


?>
<div class="container">
  <div class="row">
    <div class="col">
      <h1>ADD CATEGORIES</h1>

      <form action="" method="POST">


        <div class="input-group mb-3 mt-5">
          <input type="text" class="form-control" placeholder="Add categories" aria-label="Recipient's username" aria-describedby="button-addon2" name="cat_name">
          <input class="btn btn-outline-success " type="submit" id="button-addon2" name="add_cat">
        </div>
      </form>

    </div>

  </div>
  <div class="row md-5"></div>

  <!-- for showing all categories -->

  <div class="row mt-5">
    <div class="col">

    
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Category Name</th>

                <th scope="col">Products </th>
                <th scope="col">Actions </th>

                
            </tr>
        </thead>
        <tbody>

            <?php
            $query = "SELECT * FROM categories ";
            $result = mysqli_query($con, $query);
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>
                    <th scope='row'>$count</th>
                    <td>{$row['cat_name']}</td>
                    
                    <td><ul>";

                    $cat_id=$row['cat_id'];
                    $products= "select * from products where cat_id=$cat_id";
                    $presult=mysqli_query($con,$products);

                    if(mysqli_num_rows($presult)>0){

                      while($prow = mysqli_fetch_assoc($presult)){
                        echo"<li>{$prow['p_name']}</li>";
                     
                        }

                    }else{
                      echo"<li class='text-danger list-unstyled'>No products in this category</li>";
                    }

                   



                    echo"</ul></td>
                    <td>
                        
                        <a href='del_category.php?catid=$cat_id'><button type='submit' class='btn btn-danger'>Delete</button></a>
                    </td>
                </tr>";

                $count++;
            }
            ?>


        </tbody>
    </table>


    </div>
  </div>
</div>