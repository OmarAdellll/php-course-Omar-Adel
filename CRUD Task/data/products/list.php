<?php 
include_once '../../env/database.php';
$count = 1;

// Read Products with categories
$selectProducts = "SELECT * FROM products_with_categories ORDER BY id DESC";
$allProducts = mysqli_query($conn, $selectProducts);


// Delete One item
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = "DELETE FROM products WHERE id = $id";
    $deleteOp = mysqli_query($conn, $delete);
    $allProducts = mysqli_query($conn, $selectProducts);
}

// Read One Item By ID
if (isset($_GET['view'])) {
    $id = $_GET['view'];
    $selectOneItem = "SELECT * FROM products_with_categories WHERE id = $id";
    $oneItem = mysqli_query($conn, $selectOneItem);
    $myItem = mysqli_fetch_assoc($oneItem);
}


?>

<?php include_once '../../shared/head.php' ?>
<?php include_once '../../shared/navbar.php' ?>

<h2 class="text-center mt-5 text-primary">All Products</h2>
    <div class="container mt-4 col-7">
        <div class="card-body">
            <table class="table table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th colspan="3">Action</th>

                </tr>
                <?php foreach ($allProducts as $item): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $item['product_name'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['category_name'] ?></td>
                        <td><?= $item['description'] ?></td>
                        <td><a href="/PHP-Course/CRUD Task/data/products/list.php?view=<?= $item['id'] ?>"><i class="fa-solid fa-eye text-primary"></i></a></td>
                        <td><a href="/PHP-Course/CRUD Task/data/products/add.php?edit=<?= $item['id'] ?>"><i class="fa-solid fa-pen text-dark"></i></a></td>
                        <td><a href="/PHP-Course/CRUD Task/data/products/list.php?delete=<?= $item['id'] ?>"><i class="fa-solid fa-trash text-danger"></i></a></td>

                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <?php if (isset($_GET['view'])): ?>
        <div class="myModel">
            <div class="myContent">
                <div class="card p-4">
                    <h6>List The Product
                        <a class="float-end" href="/PHP-Course/CRUD Task/data/products/list.php"><i class="fa-solid fa-square-xmark"></i></a>
                    </h6>
                    <hr>
                    <div class="card-body p-3">
                        <h6>Product Name: <?= $myItem['product_name'] ?></h6>
                        <hr>
                        <h6>Price: <?= $myItem['price'] ?></h6>
                        <hr>
                        <h6>Category Name: <?= $myItem['category_name'] ?></h6>
                        <hr>
                        <h6>Description: <?= $myItem['description'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

 <?php include_once '../../shared/script.php' ?>
