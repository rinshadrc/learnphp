<?php
// Assume you have a database connection established
include('../includes/connect.php');


// Fetch orders from the database
$ordersQuery = "SELECT * FROM orders o INNER JOIN customers c ON o.c_email=c.c_email";
$ordersResult = mysqli_query($con, $ordersQuery);

if ($ordersResult) {
    if (mysqli_num_rows($ordersResult) > 0) {
        // Display orders and their items in a table
        echo "<table class='table' border='2'>
        <thead class='thead-dark'>
            <tr>
                <th>Order ID</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>Address</th>
                <th>Pincode</th>
                <th>Order Date</th>
                <th>Products</th>
                <th>Price X Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>";

        $count=1;

while ($order = mysqli_fetch_assoc($ordersResult)) {
    echo "<tr>
            <td> $count</td>
            <td>{$order['c_name']}</td>
            <td>{$order['c_email']}</td>
            <td>{$order['address']}</td>
            <td>{$order['pincode']}</td>
            <td>{$order['order_date']}</td>";

    $orderItemsQuery = "SELECT * FROM order_item oi INNER JOIN products p ON oi.p_id=p.p_id WHERE order_id = {$order['order_id']}";
    $orderItemsResult = mysqli_query($con, $orderItemsQuery);

    if ($orderItemsResult) {
        echo "<td><ul>";
        

        while ($item = mysqli_fetch_assoc($orderItemsResult)) {
            echo "<li>{$item['p_name']}</li>";
        }

        echo "</ul></td><td><ul style='list-style-type: none;'>";

        // Reset the pointer to the beginning of the result set
        mysqli_data_seek($orderItemsResult, 0);

        while ($item = mysqli_fetch_assoc($orderItemsResult)) {
            echo "<li><i class='bi bi-currency-rupee'></i>{$item['p_price']} X {$item['quantity']} = <i class='bi bi-currency-rupee'></i>{$item['tprice_orderitem']}</li>";
        }

        echo "</ul></td>";
    } else {
        echo "Error fetching order items: " . mysqli_error($con);
    }

    echo "<td class='fw-bold'><i class='bi bi-currency-rupee'>{$order['total_price']}</i></td>
          </tr>";


          $count++;
}

echo "</tbody></table>";

    }
}
?>
