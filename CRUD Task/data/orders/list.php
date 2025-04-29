<?php 
include_once '../../env/database.php';
$count = 1;

// Read Orders
$selectOrders = "SELECT * FROM customers_with_products";
$allOrders = mysqli_query($conn, $selectOrders);



// Delete One item
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM orders WHERE id = $id";
    $deleteOp = mysqli_query($conn, $delete);
    $allOrders = mysqli_query($conn, $selectOrders);
}

// Read One Item By ID
if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $selectOneItem = "SELECT * FROM customers_with_products WHERE id = $id";
    $oneItem = mysqli_query($conn, $selectOneItem);
    $myItem = mysqli_fetch_assoc($oneItem);
}


?>

<?php include_once '../../shared/head.php' ?>
<?php include_once '../../shared/navbar.php' ?>

<h2 class="text-center mt-5 text-primary">All Orders</h2>
    <div class="container mt-4 col-7">
        <div class="card-body">
            <table class="table table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Product Name</th>
                    <th>Order Amount</th>
                    <th colspan="3">Action</th>

                </tr>
                <?php foreach ($allOrders as $item): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $item['customer'] ?></td>
                        <td><?= $item['product'] ?></td>
                        <td><?= $item['order_amount'] ?></td>
                        <td><a href="/PHP-Course/CRUD Task/data/orders/list.php?view=<?= $item['id'] ?>"><i class="fa-solid fa-eye text-primary"></i></a></td>
                        <td><a href="/PHP-Course/CRUD Task/data/orders/add.php?edit=<?= $item['id'] ?>"><i class="fa-solid fa-pen text-dark"></i></a></td>
                        <td><a href="/PHP-Course/CRUD Task/data/orders/list.php?delete=<?= $item['id'] ?>"><i class="fa-solid fa-trash text-danger"></i></a></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <?php if (isset($_GET['view'])): ?>
        <div class="myModel">
            <div class="myContent">
                <div class="card p-4">
                    <h6>List The Order
                        <a class="float-end" href="/PHP-Course/CRUD Task/data/orders/list.php"><i class="fa-solid fa-square-xmark"></i></a>
                    </h6>
                    <hr>
                    <div class="card-body p-3">
                        <h6>Customer Name: <?= $myItem['customer'] ?></h6>
                        <hr>
                        <h6>Product Name: <?= $myItem['product'] ?></h6>
                        <hr>
                        <h6>Amount: <?= $myItem['order_amount'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

 <?php include_once '../../shared/script.php' ?>
