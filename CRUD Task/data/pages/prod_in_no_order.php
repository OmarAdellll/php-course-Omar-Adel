<?php 
include_once '../../env/database.php';
$count = 1;

// Read Products with categories
$selectProducts = "SELECT products.id , products.name product_name , products.price , categories.name category_name , categories.description FROM products
JOIN categories ON products.category_id = categories.id
LEFT JOIN orders ON products.id = orders.product_id WHERE orders.id is null;";
$allProducts = mysqli_query($conn, $selectProducts);

?>

<?php include_once '../../shared/head.php' ?>
<?php include_once '../../shared/navbar.php' ?>

<h2 class="text-center mt-5 text-primary">Products in no Orders</h2>
    <div class="container mt-4 col-7">
        <div class="card-body">
            <table class="table table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Category Name</th>
                    <th>Description</th>

                </tr>
                <?php foreach ($allProducts as $item): ?>
                    <tr>
                        <td><?= $count++ ?></td>
                        <td><?= $item['product_name'] ?></td>
                        <td><?= $item['price'] ?></td>
                        <td><?= $item['category_name'] ?></td>
                        <td><?= $item['description'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


 <?php include_once '../../shared/script.php' ?>
