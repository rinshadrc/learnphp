
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>estore</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    .separator-list li {
    border-bottom: 1px solid #ccc; /* Add a horizontal line separator */
    padding: 5px 0; /* Adjust padding for spacing */
    list-style-type: none; /* Remove default list bullet */
    
}

.separator-list li :hover{
  color: green;
  background-color: #ffffff;
}


  </style>
</head>

<body>
  <!-- NAVBAR -->

  <nav class="navbar navbar-expand-lg navbar-light bg-success ">
    <div class="container-fluid">
      <a class="navbar-brand text-white fw-bold ms-4" href="#">MY STORE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
          <li class="nav-item">
            <a class="nav-link active  text-white" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="registration.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="login.php">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="#">Cart</a>
          </li> 
          <li class="nav-item">

          <?php session_start();
          $name = $_SESSION['user'];
        
            echo"<span class=text-white'>$name</span>";
            
            ?>
          </li>


        </ul>


        <form class="d-flex" method="GET">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <input class="btn btn-outline-light" type="submit" name="search_product" value="Search">
        </form>

      


      </div>
    </div>
  </nav>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>