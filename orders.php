<?php
include('includes/connect.php');
include('header.php');



?>
<table class="table  table-bordered m-2" >
  <thead class="table-dark">
  <tr>
      <th scope="row">Order N0.</th>
      <th>Order Date</th>

      <th>Product Name</th>
      <th>Product Price</th>
      <th>Quantity</th>
      <th>Total Price</th>



    </tr>
    
  </thead>
  <tbody>
   
   
  
<?php


if(isset($_SESSION['user'])){
    $user_email = $_SESSION['user']['email'];

}
    $query  = "select * from orders where c_email = '$user_email'";
    $result = mysqli_query($con,$query);

    if($result){

        $count = 1;

        while($order = mysqli_fetch_assoc($result)){
            $order_id=$order['order_id'];
            $total_price=$order['total_price'];
            $order_date=$order['order_date'];

            $itemquery = "select * from order_item oi inner join products p on oi.p_id=p.p_id where order_id =$order_id";
            $itemresult = mysqli_query($con,$itemquery);

            if($itemresult){


                echo"<tr>
                <th scope='row' class='text-success'>$count</th></tr>
                ";

                while($row= mysqli_fetch_assoc($itemresult)){
                    echo" <tr>
                    <td></td>

                    
                    <td>$order_date</td>

                    <td>{$row['p_name']}</td>
                    <td>{$row['p_price']}</td>
                    <td>{$row['quantity']} nos</td>
                    <td><i class='bi bi-currency-rupee'></i>{$row['tprice_orderitem']}</td>
                    


                  </tr>";
                }
                echo "<tr>
                <td colspan='4'></td>
                <td class='fw-bold text-success'>Purchased Amount:</td>
                <td class='fw-bold text-success'><i class='bi bi-currency-rupee'>$total_price</i></td>
                
               
                
            </tr>";
            }

            $count++;
            
        }
       
    }

?>
</tbody>
</table>


