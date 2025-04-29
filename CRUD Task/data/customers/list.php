<?php 
include_once '../../env/database.php';
$count = 1;

// Read Customers
$selectCustomers = "SELECT * FROM customers ORDER BY id DESC";
$allCustomers = mysqli_query($conn, $selectCustomers);


// Delete One item
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM customers WHERE id = $id";
    $deleteOp = mysqli_query($conn, $delete);
    $allCustomers = mysqli_query($conn, $selectCustomers);
}

// Read One Item By ID
if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $selectOneCustomer = "SELECT * FROM customers WHERE id = $id";
    $oneCustomer = mysqli_query($conn, $selectOneCustomer);
    $myItem = mysqli_fetch_assoc($oneCustomer);
}


?>

<?php include_once '../../shared/head.php' ?>
<?php include_once '../../shared/navbar.php' ?>

<h2 class="text-center mt-5 text-primary">All Customers</h2>
    <div class="container mt-4 col-7">
        <div class="card-body">
            <table class="table table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th colspan="3">Action</th>

                </tr>
                <?php foreach ($allCustomers as $item): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['gender'] ?></td>
                        <td><?= $item['phone'] ?></td>
                        <td><a href="/PHP-Course/CRUD Task/data/customers/list.php?view=<?= $item['id'] ?>"><i class="fa-solid fa-eye text-primary"></i></a></td>
                        <td><a href="/PHP-Course/CRUD Task/data/customers/add.php?edit=<?= $item['id'] ?>"><i class="fa-solid fa-pen text-dark"></i></a></td>
                        <td><a href="/PHP-Course/CRUD Task/data/customers/list.php?delete=<?= $item['id'] ?>"><i class="fa-solid fa-trash text-danger"></i></a></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <?php if (isset($_GET['view'])): ?>
        <div class="myModel">
            <div class="myContent">
                <div class="card p-4">
                    <h6>List The Customer
                        <a class="float-end" href="/PHP-Course/CRUD Task/data/customers/list.php"><i class="fa-solid fa-square-xmark"></i></a>
                    </h6>
                    <hr>
                    <div class="card-body p-3">
                        <h6>Customer Name: <?= $myItem['name'] ?></h6>
                        <hr>
                        <h6>Gender: <?= $myItem['gender'] ?></h6>
                        <hr>
                        <h6>Phone: <?= $myItem['phone'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

 <?php include_once '../../shared/script.php' ?>
