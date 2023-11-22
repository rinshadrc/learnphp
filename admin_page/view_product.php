<?php
include('../includes/connect.php');

// Fetch categories for the dropdown
$categoriesQuery = "SELECT * FROM categories";
$categoriesResult = mysqli_query($con, $categoriesQuery);

// Check if the form is submitted
if (isset($_POST['filter_category'])) {
    $selectedCategoryId = $_POST['category'];
    $filterQuery = " AND p.cat_id = $selectedCategoryId";
} else {
    $filterQuery = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
       

       
        form {
            margin-bottom: 20px;
        }

        label {
          margin-right: 930px;
            
        }

        select,
        button {
            padding: 8px;
            margin-right: 10px;
            border: 1px solid #007bff;
            border-radius: 4px;
            color:#04AA6D;
            cursor: pointer;
        }

        button {
            background-color: #04AA6D;
            color:white;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-danger {
            background-color: #dc3545;
        }
    </style>
</head>

<body>



    <h1>OUR PRODUCTS</h1>

    <form method="POST">
        <label for="category"></label>
        <select name="category" id="category">
            <option value="">All Categories</option>
            <?php
            while ($category = mysqli_fetch_assoc($categoriesResult)) {
                echo "<option value='{$category['cat_id']}'>{$category['cat_name']}</option>";
            }
            ?>
        </select>
        <button type="submit" name="filter_category">Apply Filter</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Category</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $query = "SELECT * FROM products p INNER JOIN categories c ON p.cat_id = c.cat_id WHERE 1 $filterQuery";
            $result = mysqli_query($con, $query);
            $count = 1;
            while ($row = mysqli_fetch_assoc($result)) {

                echo "<tr>
                    <th scope='row'>$count</th>
                    <td><img src='./product_images/{$row['p_image']}' class='card-img-top' width=20px height=70px></td>
                    <td>{$row['p_name']}</td>
                    <td>{$row['p_price']}</td>
                    <td>{$row['p_des']}</td>
                    <td>{$row['cat_name']}</td>
                    <td>
                        <a href='edit.php?product_id={$row['p_id']}'><button type='submit' class='btn btn-primary'>Edit</button></a>
                        <a href='delete.php?product_id={$row['p_id']}'><button type='submit' class='btn btn-danger'>Delete</button></a>
                    </td>
                </tr>";

                $count++;
            }
            ?>


        </tbody>
    </table>

</body>

</html>
