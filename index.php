<?php
include('includes/connect.php');
include('functions/common_functions.php');
include('header.php');



?>


  <div class="container">
    <div class="row">
      <div class="col-md-10 mt-2">

        <div class="row px-2 py-3 ">

        <?php  
        if(isset($_GET['category'])){
          unique_categories();
        }
        else if(isset($_GET['search_product'])){
                  searchproduct();
                 }
               
                else{
                    getproduct();   
                  }
          

             ?>
        

        
      

        </div>

      </div>
      <div class="col-md-2 text-center bg-success">
        <ul class="navbar-nav me-auto text_center mt-5 separator-list">
          <li class="nav-item bg-success text-white mb-5">CATEGORIES</li>
          <li class="nav-item bg-success text-white mb-5"><a href="index.php" class="text-light nav-link"><H4>ALL CATEGORIES</H4></a></li>

          <?php
          $cat = "select * from categories";
          $res = mysqli_query($con,$cat);
        
          while($row = mysqli_fetch_assoc($res)){
        
          $cat_name = $row['cat_name'];
          $cat_id = $row['cat_id'];

        
        
          echo"<li class='nav-item bg-success text-white text-uppercase'><a href='index.php?category=$cat_id' class='text-light nav-link'><H4>$cat_name</H4></a></li>";
          }
          ?>
          
        </ul>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>