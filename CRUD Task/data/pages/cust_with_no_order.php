


<?php 
include_once '../../env/database.php';
$count = 1;

// Read Customers
$selectCustomers = "SELECT customers.id , customers.name , customers.gender , customers.phone 
FROM customers LEFT JOIN orders
ON customers.id = orders.customer_id WHERE orders.id is null;";
$allCustomers = mysqli_query($conn, $selectCustomers);

?>


<?php include_once '../../shared/head.php' ?>
<?php include_once '../../shared/navbar.php' ?>

<h2 class="text-center mt-5 text-primary">Customers Without Orders</h2>
    <div class="container mt-4 col-7">
        <div class="card-body">
            <table class="table table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                </tr>
                <?php foreach ($allCustomers as $item): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['gender'] ?></td>
                        <td><?= $item['phone'] ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
 <?php include_once '../../shared/script.php' ?>
