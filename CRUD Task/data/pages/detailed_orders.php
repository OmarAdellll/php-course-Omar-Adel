<?php
include_once '../../env/database.php';
$count = 1;

$d_orders = "SELECT * FROM detailed_orders";
$allOrders = mysqli_query($conn,$d_orders);

?>




<?php include_once '../../shared/head.php' ?> 
<?php include_once '../../shared/navbar.php' ?>
<h2 class="text-center mt-5 text-primary">Detailed Orders</h2>
    <div class="container mt-4 col-7">
        <div class="card-body">
            <table class="table table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Order Amount</th>
                    

                </tr>
                <?php foreach ($allOrders as $item): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $item['customer_name'] ?></td>
                        <td><?= $item['gender'] ?></td>
                        <td><?= $item['phone'] ?></td>
                        <td><?= $item['product_name'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['category_name'] ?></td>
                        <td><?= $item['description'] ?></td>
                        <td><?= $item['order_amount'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


<?php include_once '../../shared/script.php' ?>